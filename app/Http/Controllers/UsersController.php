<?php
namespace App\Http\Controllers;

use App\Users;
use App\User;
use App\Company;
use App\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
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
            AND c.id = ?", [$id]
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
        $user->password = bcrypt($request->pass_usuario);
        $user->company_id = $request->company_id;
        $storage = new Storage;
        $storage->tamano = $request->space;
        $free_space = $this->free_space($request->company_id);
        $new_space = $free_space - $request->space;
        $available_licenses = $this->available_licenses($request->company_id);
        $alias_company = $this->alias_company($request->company_id);
        if(1 <= $available_licenses and $request->space <= $new_space){
            $name_folder= $request->name . "_" . $request->lastname . "_" . $alias_company; 
            $storage->ruta_local = $name_folder;
            $storage->ruta_servidor = "/var/www/html/wstorage/public/wstorage/$alias_company/$name_folder";
            $user->save();
            $user->storages()->save($storage);
            mkdir("/var/www/html/wstorage/public/wstorage/$alias_company/$name_folder", 0777, true);
            $update_license = $this->update_license($request->company_id, $new_space, $available_licenses);
            return redirect('companies');
        }
        else
           echo "<script>alert('Does not have enough space or licenses.');window.history.go(-1);</script>";
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
            'name' => 'required|max:15|alpha_dash:', 
            'lastname' => 'required|max:15|alpha',
            'email' => 'required|max:50|email',
            'space' => 'required|numeric',
        ]);
        $free_space = $this->free_space($request->company_id);
        $space_user = $this->space_user($id);
        $name_folder = $this->name_folder($id);
        $alias_company = $this->alias_company($request->company_id);
        if($space_user === $request->space){
            $name_folder_new= $request->name . "_" . $request->lastname . "_" . $alias_company;
            DB::table('storages')->where('user_id', $id)->update(array(
                'ruta_local' => $name_folder_new, 'ruta_servidor' => "/var/www/html/wstorage/public/wstorage/$alias_company/$name_folder_new"));
            DB::table('users')->where('id', $id)->update(array(
                'name' => $request->name, 'apellidos' => $request->lastname, 'email' => $request->email, 'tipo_usuario' => $request->rol_usuario));
            rename ("/var/www/html/wstorage/public/wstorage/$alias_company/$name_folder", "/var/www/html/wstorage/public/wstorage/$alias_company/$name_folder_new");
            return redirect('companies');
        }
        elseif($space_user < $request->space and $request->space <= $free_space){
            echo "El espacio es mayor";
        }
        else{
            echo "El espacio es menor";
        }
        die();
        return redirect('companies');
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
}