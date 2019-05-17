<?php

namespace App\Http\Controllers;

use App\Login;
use Illuminate\Http\Request;
use App\License;
use App\Company;
use App\Contacts;
use App\User;
use App\Storage;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    # LA SIGUIENTE FUNCION SOLO MUESTRA LAS SIGUIENTES FUCNIONES SIEMPRE Y CUANDO EL USUARIO NO HAYA INICIADO SESSION #
    public function __construct()
    {
        $this->middleware('guest');
    }

    #FUNCIÓN PARA LA VISTA PRINCIPAL LOGIN EN LA CARPETA PLANTILLAS->VISTA INDEX
    public function index(){
        return view('plantillas.index');
    }

    # FUNCION PARA MOSTRAR EL WIZARD (EMPRESA, CONTACTO, ADMINISTRADOR, LICENCIA) #
    public function addCompany(){
        return view('add_company');
    }

    # FUNCION PARA GUARDAR EL WIZARD (EMPRESA, CONTACTO, ADMINISTRADOR, LICENCIA) #
    public function addCompanyPost(Request $request){
        $license = new License;
        $license->modelo = $request->modelo;
        $license->tipo = $request->tipo;
        $license->tiempo =$request->tiempo;
        $license->status = 1;
        # Obtener el dia, mes y año desde PHP #
        $fecha_actual = date("dm-Y");
        $license->fecha_inicio = date("Y-m-d H:i:s");;
        # Fecha vencimiento #
        $tiempo_licencia = $request->tiempo; 
        if($tiempo_licencia == "15 days")
            $fecha_vencimiento=date("Y-m-d H:i:s",strtotime(date("Y-m-d H:i:s")."+ 15 days"));
        else
            $fecha_vencimiento=date("Y-m-d H:i:s",strtotime(date("Y-m-d H:i:s")."+ $tiempo_licencia"));
        $license->fecha_fin = $fecha_vencimiento;
        $license->tamano_total = $request->tamanio;
        $license->licencia_total = $request->usuarios;
        $license->tamano_restante = $request->tamanio;
        $license->licencia_restante = $request->usuarios;
        # Generar los caracteres aletoriamente #
        $caracteres = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longitud_caracteres = strlen($caracteres);
        $valor_random = '';
        for ($i = 0; $i < $length = 4; $i++) {
            $valor_random .= $caracteres[rand(0, $longitud_caracteres - 1)];
        }
        # Serial #
        $serial= "WDST-$fecha_actual-$valor_random";
        $license->serial = $serial;
        $company = new Company;
        $company->nombre = $request->nombre_compania;
        $company->alias = $request->alias;
        $company->rfc = $request->rfc;
        $company->direccion = $request->direccion;
        $company->logo = $request->file('logotipo')->store('public');
        $contact = new Contacts;
        $contact->nombre = $request->nombre_contacto;
        $contact->apellidos = $request->apellidos_contacto;
        $contact->email = $request->email_contacto;
        $contact->telefono = $request->telefono_contacto;
        $contact->ocupacion = $request->puesto;
        $user = new User;
        $user->name = $request->nombre_administrador;
        $user->apellidos = $request->apellidos_administrador;
        $user->email = $request->email_administrador;
        $user->tamano = "5";
        $user->tipo_usuario = "ADMIN";
        $user->password = bcrypt($request->contrasenia);
        $storage = new Storage;
        $storage->tamano = "5";
        $name_folder= $request->nombre_administrador . "_" . $request->apellidos_administrador; 
        $storage->ruta_local = $name_folder;
        $alias = $request->alias;
        $storage->ruta_servidor = "/var/www/html/wstorage/public/wstorage/$alias/$name_folder";
        # Guardar #
        $license->save();
        $license->company()->save($company);
        $company->contacts()->save($contact);
        $company->users()->save($user);
        $user->storages()->save($storage);
        # Resta de espacio #
        $resta_espacio = $request->tamanio - 5;
        # Resta de licencia #
        $resta_licencia = $request->usuarios -1;
        $obtener_id = DB::select("SELECT license_id 
            FROM companies 
            WHERE rfc ='$request->rfc'"
        );
        foreach ($obtener_id as $id_company) {
            foreach ($id_company as $id) {
                $actualizar_licencia = DB::select("UPDATE licenses SET tamano_restante = '$resta_espacio', licencia_restante = '$resta_licencia'
                    WHERE id = '$id'"
                );
            }
        }   
        mkdir("/var/www/html/wstorage/public/wstorage/$alias/$name_folder", 0777, true);     
        return redirect()->route('index');
    }

    #FUNCIÓN PARA DASHBOARD SUPERUASUARIO
    public function superuser()
    {
        return view('plantillas.superuser');
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
}
