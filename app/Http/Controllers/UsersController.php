<?php
namespace App\Http\Controllers;

use App\Users;
use App\User;
use App\Company;
use App\Storage;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    # MOSTRAR USUARIOS #
    public function showUsers($id)
    {
        $company_name = DB::select("SELECT DISTINCT c.nombre, c.id AS company_id
            FROM users AS u, companies AS c
            WHERE u.company_id = c.id
            AND c.id = ?", [$id]
        );
        $user= DB::select("SELECT c.nombre AS nombre_company, u.id, u.name, u.apellidos, u.email, u.tamano, u.tipo_usuario
            FROM companies AS c, users AS u
            WHERE c.id=u.company_id
            AND c.id = ? ORDER BY u.id", [$id]
        );
        return view('plantillas.users',compact('user','company_name'));
    }

    # FORMULARIO PARA AGREGAR UN NUEVO USUARIO #
    public function createUser($company_id)
    {
        return view('plantillas.add_user',compact('company_id'));
    }

    # GUARDAR LOS DATOS DEL NUEVO USUARIO REGISTRADO #
    public function createUserPost(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:15|alpha_dash|unique:users', 
            'lastname' => 'required|max:15|alpha',
            'email' => 'required|max:50|email|unique:users',
            'space' => 'required|numeric',
            'password' => 'required|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/|confirmed|max:30',
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->apellidos = $request->lastname;
        $user->email = $request->email;
        $user->tamano = $request->space;
        $user->tipo_usuario = $request->rol_usuario;
        $user->password = bcrypt($request->password);
        $user->company_id = $request->company_id;
        $storage = new Storage;
        $storage->tamano = $request->space;
        $free_space = $this->free_space($request->company_id);
        $new_space = $free_space - $request->space;
        $available_licenses = $this->available_licenses($request->company_id);
        $alias_company = $this->alias_company($request->company_id);
        if(1 <= $available_licenses and $request->space <= $new_space){
            $name_folder= $request->name . "_" . $request->lastname; 
            $storage->ruta_local = $name_folder;
            $storage->ruta_servidor = "/var/www/html/wstorage/public/wstorage/$alias_company/$name_folder";
            $user->save();
            $user->storages()->save($storage);
            mkdir("/var/www/html/wstorage/public/wstorage/$alias_company/$name_folder", 0777, true);
            $update_license = $this->update_license($request->company_id, $new_space, $available_licenses);
            return redirect()->route('users', ['id' => $request->company_id])->with('success','Registry created successfully.');
        }
        else
            return Redirect::back()->with('success','Does not have enough space or licenses.');
    }

    # FORMULARIO PARA ACTUALIZAR UN USUARIO #
    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        return view('plantillas.edit_user',compact('user'));
    }

    # ACTUALIZAR LOS DATOS DEL USUARIO #
    public function updateUserPost(Request $request, $id)
    {
        $this->validate($request,[
            'email' => 'required|max:50|email',
            'space' => 'required|numeric',
        ]);
        $free_space = $this->free_space($request->company_id);
        $space_user = $this->space_user($id);
        $id_license = $this->id_license($id);
        if($space_user === $request->space){
            DB::table('users')->where('id', $id)->update(array(
                'email' => $request->email, 'tipo_usuario' => $request->rol_usuario));
            return redirect()->route('users', ['id' => $request->company_id])->with('success','Registry updated successfully.');
        }
        elseif($space_user < $request->space and $request->space <= $free_space){
            DB::table('storages')->where('user_id', $id)->update(array(
                'tamano' => $request->space));
            DB::table('users')->where('id', $id)->update(array(
                'email' => $request->email, 'tamano' => $request->space, 'tipo_usuario' => $request->rol_usuario));
            # Resta para asigar nuevo espacio #
            $new_space = $request->space - $space_user;
            $new_space_license = $free_space - $new_space;
            DB::table('licenses')->where('id', $id_license)->update(array(
                'tamano_restante' => $new_space_license));
            return redirect()->route('users', ['id' => $request->company_id])->with('success','Registry updated successfully.');
        }
        elseif($space_user > $request->space and $request->space <= $free_space){
            DB::table('storages')->where('user_id', $id)->update(array(
                'tamano' => $request->space));
            DB::table('users')->where('id', $id)->update(array(
                'email' => $request->email, 'tamano' => $request->space, 'tipo_usuario' => $request->rol_usuario));
            # suma para asigar nuevo espacio #
            $new_space =  $space_user - $request->space;
            $new_space_license = $free_space + $new_space;
            DB::table('licenses')->where('id', $id_license)->update(array(
                'tamano_restante' => $new_space_license));
            return redirect()->route('users', ['id' => $request->company_id])->with('success','Registry updated successfully.');
        }
        else
            return Redirect::back()->with('success','Does not have enough space.');
    }

    public function deleteUser($id)
    {
        $company_id = $this->company_id($id);
        $alias_company = $this->alias_company($company_id);
        $free_space = $this->free_space($company_id);
        $id_license = $this->id_license($id);
        $space_user = $this->space_user($id);
        $local_route = $this->local_route($id);
        $license_available = $this->license_available($id);
        $new_space_available = $free_space + $space_user;
        $new_license_available = $license_available + 1;
        $folder = "/var/www/html/wstorage/public/wstorage/$alias_company/$local_route";
        $delete_folder = exec("rm -rf $folder");
        $user = User::find($id)->delete();
        DB::table('licenses')->where('id', $id_license)->update(array(
            'tamano_restante' => $new_space_available, 'licencia_restante' => $new_license_available));
        return Redirect::back()->with('success','Registry successfully deleted.');
    }

    # FUNCIONES CONSULTAS BASE DE DATOS #
    private function free_space($id)
    {
        $free_space = DB::table('licenses')->select('tamano_restante')->where('id', '=', $id)->get();
        foreach ($free_space as $space_free) {
            foreach ($space_free as $space) {
                $space;
            }
        }
        return $space;
    }
    private function available_licenses($id)
    {
        $available_licenses = DB::table('licenses')->select('licencia_restante')->where('id', '=', $id)->get();
        foreach ($available_licenses as $licenses_available) {
            foreach ($licenses_available as $licenses) {
                $total_licenses =  $licenses - 1;
            }
        }
        return $total_licenses;
    }
    private function alias_company($id)
    {
        $alias_company = DB::table('companies')->select('alias')->where('id', '=', $id)->get();
        foreach ($alias_company as $company_alias) {
            foreach ($company_alias as $alias) {
                $alias;
            }
        }
        return $alias;
    }
    private function update_license($id, $new_space, $new_total_license)
    {
        $update_license = DB::table('licenses')->where('id', $id)->update(array('tamano_restante' => $new_space, 'licencia_restante' => $new_total_license));
        return $update_license;
    }
    private function space_user($id)
    {
        $space_user = DB::table('users')->select('tamano')->where('id', $id)->get();
        foreach ($space_user as $user_space) {
            foreach ($user_space as $user) {
                $user;
            }
        }
        return $user;
    }
    private function name_folder($id)
    {
        $name_folder = DB::table('storages')->select('ruta_local')->where('user_id', $id)->get();
        foreach ($name_folder as $folder_name) {
            foreach ($folder_name as $name) {
                $name;
            }
        }
        return $name;
    }
    private function id_license($id)
    {
        $id_license= DB::select("SELECT l.id AS license_id
            FROM users AS u, companies AS c, licenses AS l
            WHERE u.company_id = c.id
            AND c.license_id = l.id
            AND u.id = ?", [$id]
        );
        foreach ($id_license as $license_id) {
            foreach ($license_id as $id) {
                $id;
            }
        }
        return $id;
    }
    private function license_available($id)
    {
        $license_available= DB::select("SELECT l.licencia_restante AS licencia_restante
            FROM users AS u, companies AS c, licenses AS l
            WHERE u.company_id = c.id
            AND c.license_id = l.id
            AND u.id = ?", [$id]
        );
        foreach ($license_available as $available_license) {
            foreach ($available_license as $available) {
                $available;
            }
        }
        return $available;
    }
    private function company_id($id)
    {
        $company_id = DB::table('users')->select('company_id')->where('id', '=', $id)->get();
        foreach ($company_id as $id_company) {
            foreach ($id_company as $id) {
                $id;
            }
        }
        return $id;
    }
    private function local_route($id)
    {
        $local_route = DB::table('storages')->select('ruta_local')->where('user_id', '=', $id)->get();
        foreach ($local_route as $route_local) {
            foreach ($route_local as $route) {
                $route;
            }
        }
        return $route;
    }

    public function addUserPlus()
    {
        for ($i=0; $i < 100; $i++) 
        { 
            $nombre = $this->sa(10);
            $apellidos = $this->sa(10);
            $email = $this->sa(15).'@'.'pisos.com';
            $company_id = 2;
            $user = new User;
            $user->name = $nombre;
            $user->apellidos = $apellidos;
            $user->email = $email;
            $user->tamano = "5";
            $user->tipo_usuario = "USER";
            $user->password = bcrypt("1234");
            $user->company_id = $company_id;
            $storage = new Storage;
            $storage->tamano = 5;
            $free_space = $this->free_space($company_id);
            $new_space = $free_space - 5;
            $available_licenses = $this->available_licenses($company_id);
            $alias_company = $this->alias_company($company_id);
            if(1 <= $available_licenses and 5 <= $new_space){
                $name_folder= $nombre . "_" . $apellidos; 
                $storage->ruta_local = $name_folder;
                $storage->ruta_servidor = "/var/www/html/wstorage/public/wstorage/$alias_company/$name_folder";
                $user->save();
                $user->storages()->save($storage);
                mkdir("/var/www/html/wstorage/public/wstorage/$alias_company/$name_folder", 0777, true);
                $update_license = $this->update_license($company_id, $new_space, $available_licenses);
            }

        }
        return redirect()->route('users')->with('success','Registry created successfully.');
    }
    private function sa($long)
    {
        $caracteres = 'asdfghjklqwertyuiopzxcvbnm1234567890ASDFGHJKLQWERTYUIOPZXCVBNM';
        $num_caracteres = strlen($caracteres);
        $string_aletorio = '';
        for ($i=0; $i < $long; $i++) 
        { 
            $string_aletorio .=$caracteres[rand(0, $num_caracteres - 1)];
        }
        return $string_aletorio;
    }
}