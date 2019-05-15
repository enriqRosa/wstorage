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
    public function createUser($company_id)
    {
        return view('plantillas.add_user',compact('company_id'));
    }

    //Agregar un nuevo usuario
    public function createUserPost(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:15|alpha', 
            'lastname' => 'required|max:15|alpha',
            'email' => 'required|max:50|email|unique:users',
            'space' => 'required|numeric',
            'password' => 'required|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/|confirmed|max:30',
        ]);

        $user = new User;
        $user->nombre = $request->name;
        $user->apellidos = $request->lastname;
        $user->email = $request->email;
        $user->tamano = $request->space;
        $user->tipo_usuario = $request->rol_usuario;
        $user->password = bcrypt($request->pass_usuario);
        $user->company_id = $request->company_id;
        $storage = new Storage;
        $storage->tamano = $request->space;
        $tamano_restante = DB::select("SELECT tamano_restante
            FROM licenses 
            WHERE id ='$request->company_id'"
        );
        $licencia_restante = DB::select("SELECT licencia_restante  
            FROM licenses 
            WHERE id ='$request->company_id'"
        );
        $alias = DB::select("SELECT alias FROM companies WHERE id ='$request->company_id'");
        foreach ($tamano_restante as $tam_restante) {
            foreach ($tam_restante as $restante_espacio_licencia) {
                $resta_espacio =  $restante_espacio_licencia - $request->space;
            }
        }
        foreach ($licencia_restante as $restante_licensia) {
            foreach ($restante_licensia as $res_licensia) {
                $resta_licencia =  $res_licensia - 1;
            }
        }
        foreach ($alias as $alias_company) {
            foreach ($alias_company as $company_alias) {
                $company_alias;
            }
        }
        if(1 <= $res_licensia and $request->space <= $restante_espacio_licencia){
            $nombre_carpeta= $request->name . "_" . $request->lastname . "_" . $company_alias; 
            $storage->ruta_local = $nombre_carpeta;
            $storage->ruta_servidor = "/var/www/html/wstorage/public/wstorage/$company_alias/$nombre_carpeta";
            /*$user->save();
            $user->storages()->save($storage);
            mkdir("/var/www/html/wstorage/public/wstorage/$company_alias/$nombre_carpeta", 0777, true);
            $actualizar_licencia = DB::select("UPDATE licenses SET tamano_restante = '$resta_espacio', licencia_restante = '$resta_licencia'
                WHERE id = '$request->company_id'"
            );
            return redirect('companies');*/
        }
        else
           echo "<script>alert('Does not have enough space or licenses');window.history.go(-1);</script>";
       die();
    }

    public function showUsers($id)
    {
        $company_name = DB::select("SELECT DISTINCT c.nombre, c.id AS company_id
            FROM users AS u, companies AS c
            WHERE u.company_id = c.id
            AND c.id = '$id'"
        );
        $user= DB::select("SELECT c.nombre AS nombre_company, u.id, u.nombre, u.apellidos, u.email, u.tamano, u.tipo_usuario
            FROM companies AS c, users AS u
            WHERE c.id=u.company_id
            AND c.id = '$id'"
        );
        //$user = User::with("company")->get();
        return view('plantillas.users',compact('user','company_name'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        return view('plantillas.edit_user',compact('user'));
    }

    public function updateUserPost(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|max:15|alpha', 
            'lastname' => 'required|max:15|alpha',
            'email' => 'required|max:50|email',
            'space' => 'required|numeric',
        ]);
        $licensia = DB::select("SELECT l.id FROM companies AS c, users AS u, licenses AS l
            WHERE l.id = c.license_id
            AND u.company_id = c.id
            AND u.id = '$id'"
        );
        foreach ($licensia as $license) {
            foreach ($license as $license_id) {
                $license_id;
            }
        }
        $tamano_restante = DB::select("SELECT tamano_restante
            FROM licenses 
            WHERE id ='$license_id'"
        );
        $licencia_restante = DB::select("SELECT licencia_restante  
            FROM licenses 
            WHERE id ='$license_id'"
        );
        $alias = DB::select("SELECT alias FROM companies WHERE id ='$license_id'");
        $nombre_viejo = DB::select("SELECT ruta_local FROM storages WHERE user_id ='$id'");
        foreach ($tamano_restante as $tam_restante) {
            foreach ($tam_restante as $restante_espacio_licencia) {
                $resta_espacio =  $restante_espacio_licencia - $request->space;
            }
        }
        foreach ($licencia_restante as $restante_licensia) {
            foreach ($restante_licensia as $res_licensia) {
                $resta_licencia =  $res_licensia - 1;
            }
        }
        foreach ($alias as $alias_company) {
            foreach ($alias_company as $company_alias) {
                $company_alias;
            }
        }
        foreach ($nombre_viejo as $nombre) {
            foreach ($nombre as $viejo) {
                $viejo;
            }
        }
        if(1 <= $res_licensia and $request->space <= $restante_espacio_licencia){
            $nombre_carpeta= $request->name . "_" . $request->lastname . "_" . $company_alias;
            rename ("/var/www/html/wstorage/public/wstorage/$company_alias/$viejo", "/var/www/html/wstorage/public/wstorage/$company_alias/$nombre_carpeta");
            //mkdir("/var/www/html/wstorage/public/wstorage/$company_alias/$nombre_carpeta", 0777, true);
            /*$actualizar_licencia = DB::select("UPDATE licenses SET tamano_restante = '$resta_espacio', licencia_restante = '$resta_licencia'
                WHERE id = '$request->company_id'"
            );*/
            //return redirect('companies');
        }
        else
           echo "<script>alert('Does not have enough space or licenses');window.history.go(-1);</script>";
        return $nombre_carpeta;
        die();
        return redirect('companies');
    }

    public function destroy(Users $users)
    {
        //
    }
}
