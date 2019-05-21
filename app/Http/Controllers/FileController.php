<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Users;
use Illuminate\Support\Facades\DB;
use Redirect;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showFiles()
    {
        $company_id= \Auth::user()->company_id;
        $alias_company = $this->alias_company($company_id);
        $license= DB::select("SELECT l.tamano_total, l.tamano_restante, l.licencia_total, l.licencia_restante
            FROM users AS u, licenses AS l, companies AS c
            WHERE u.company_id = c.id
            AND c.license_id = l.id
            AND u.company_id = ? GROUP BY l.id;", [$company_id]
        );
        $folder= DB::select("SELECT s.* 
            FROM companies AS c, storages AS s, users AS u
            WHERE u.company_id = c.id
            AND s.user_id = u.id
            AND c.id = ? ORDER BY s.id", [$company_id]
        );
        return view('plantillas.folder_users', compact('license','folder'));
    }

    public function showFilesFolder($ruta_local)
    {
        $company_id= \Auth::user()->company_id;
        $alias_company = $this->alias_company($company_id);
        $space_user = $this->space_user($ruta_local);
        $dictionary= DB::select("SELECT nombre FROM dictionary WHERE company_id = ?", [$company_id]);
        $path = "/var/www/html/wstorage/public/wstorage/$alias_company/$ruta_local";
        $path2 = "/var/www/html/wstorage/public/wstorage/$alias_company/$ruta_local";
        echo $this->Fsize($path);
        die();
        $space = exec("du -ch $path|cut -b 1-5");
        $space2= exec("du -ch $path|cut -b 1-5");
        $space3= exec("du -ch $path|cut -b 1-3");
        $type=substr($space2,-1);
        if($type == "K"){
            $type_mb = $space3 * 0.00097656;
            $type_gb = $type_mb * 0.00097656;
            $total = $space_user - $type_gb;
            $new_total = substr($total,0,-9);
        }
        if($type == "M"){
            $type_gb = $space3 * 0.00097656;
            $total = $space_user - $type_gb;
            $new_total = substr($total,0,-7);
        }
        if($type == "G"){
            $new_total = $space_user - $space3;
        }
        if (is_dir($path)){
            $gestor = opendir($path);
            $gestor2 = opendir($path2);
            return view('plantillas.list_files',compact('ruta_local','gestor','path','gestor2','path2','dictionary','space','new_total','space_user'));
        }
    }

    public function Fsize($dir)
    {
        if (is_dir($dir)) {
            if ($gd = opendir($dir)){
                $cont = 0;
                while (($archivo = readdir($gd)) !== false) {
                    if ($archivo != "." && $archivo != ".." ){
                        if (is_dir($archivo)){
                            $cont += Fsize($dir."/".$archivo); 
                        }
                        else{
                            $cont += filesize($dir."/".$archivo);
                            echo  "archivo : " . $dir."/".$archivo . "&nbsp;&nbsp;" . filesize($dir."/".$archivo)."<br />";
                        }
                    }
                }
            closedir($gd);
        }
    }
    return $cont;
 }


    public function store(Request $request)
    {
        $name = $request->ruta_local;
        $company_id= \Auth::user()->company_id;
        $alias_company = $this->alias_company($company_id);
        if($_FILES){
        	$upload_directory = "wstorage/$alias_company/$name/";
        	$upload_file_copy = $upload_directory . basename($_FILES['file']['name']);
        	if(move_uploaded_file($_FILES['file']['tmp_name'], $upload_file_copy)){
        		echo "El archivo fue subido correctamente";
                exit;
        	}
        	else{
        		echo "El archivo no fue subido";
                exit;
        	}
        }
    }

    public function downloadFile(Request $request)
    {
        $company_id= \Auth::user()->company_id;
        $alias_company = $this->alias_company($company_id);
        $folder = $request->ruta_local;
        $archivo = $request->archivo;
        $file ="/var/www/html/wstorage/public/wstorage/$alias_company/$folder/$archivo"; 
        $filename = $archivo; // el nombre con el que se descargara, puede ser diferente al original 
        header("Content-type: application/octet-stream"); 
        header("Content-Type: application/force-download"); 
        header("Content-Disposition: attachment; filename=\"$filename\"\n"); readfile($file);
        die();
    }

    public function deleteFile(Request $request)
    {
        $company_id= \Auth::user()->company_id;
        $alias_company = $this->alias_company($company_id);
        $folder = $request->ruta_local;
        $archivo = $request->archivo;
        $path = "/var/www/html/wstorage/public/wstorage/$alias_company/$folder/$archivo";
        //$delete_folder = exec("rm -rf $path");
        unlink($path);
        return Redirect::back()->with('success','File successfully deleted.');
    }

    private function alias_company($id)
    {
        $alias_company= DB::select("SELECT c.alias
            FROM companies AS c, users AS u
            WHERE c.id = u.company_id
            AND u.company_id = ? GROUP BY c.id", [$id]
        );
        foreach ($alias_company as $company_alias) {
            foreach ($company_alias as $available) {
                $available;
            }
        }
        return $available;
    }

    public function downloadFolder(Request $request)
    {
        $company_id= \Auth::user()->company_id;
        $alias_company = $this->alias_company($company_id);
        $folder = $request->ruta_local;
        $file ="wstorage/$alias_company/$folder/";
        //creamos una instancia de ZipArchive
        $zip = new \ZipArchive();
        /*directorio a comprimir
         * la barra inclinada al final es importante
         * la ruta debe ser relativa no absoluta
        */
        //$dir = 'fuente/';
        //ruta donde guardar los archivos zip, ya debe existir
        $rutaFinal = "/var/www/html/wstorage/public/wstorage/archivos_zip";
        if(!file_exists($rutaFinal)){
            mkdir($rutaFinal);
        }
        $archivoZip = "$folder.zip";
        if ($zip->open($archivoZip, \ZIPARCHIVE::CREATE) === true) {
            $this->agregar_zip($file, $zip);
            $zip->close();
            //Muevo el archivo a una ruta
            //donde no se mezcle los zip con los demas archivos
            rename($archivoZip, "$rutaFinal/$archivoZip");
            //Hasta aqui el archivo zip ya esta creado
            //Verifico si el archivo ha sido creado
            if (file_exists($rutaFinal. "/" . $archivoZip)) {
                //echo "Proceso Finalizado!! <br/><br/>
                //Descargar: <a href='$rutaFinal/$archivoZip'>$archivoZip</a>";
                //set_time_limit(18000);
                $file_zip ="$rutaFinal/$archivoZip";
                $filename = $archivoZip; // el nombre con el que se descargara, puede ser diferente al original 
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename=' . $filename);
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file_zip));
                ob_clean();
                flush();
                readfile($file_zip);
                $delete_folder = exec("rm -rf $file_zip");
                die();
            } 
            else {
                echo "Error, archivo zip no ha sido creado!!";
                die();
            }
        }
        die();
    }

    public function agregar_zip($dir, $zip) 
    {
        //verificamos si $dir es un directorio
        if (is_dir($dir)) {
            //abrimos el directorio y lo asignamos a $da
            if ($da = opendir($dir)) {
                //leemos del directorio hasta que termine
                while (($archivo = readdir($da)) !== false) {
                    /*Si es un directorio imprimimos la ruta
                     * y llamamos recursivamente esta función
                     * para que verifique dentro del nuevo directorio
                     * por mas directorios o archivos
                    */
                    if (is_dir($dir . $archivo) && $archivo != "." && $archivo != "..") {
                        echo "<strong>Creando directorio: $dir$archivo</strong><br/>";
                        $this->agregar_zip($dir . $archivo . "/", $zip);
                        /*si encuentra un archivo imprimimos la ruta donde se encuentra
                         * y agregamos el archivo al zip junto con su ruta 
                        */
                    }
                    elseif (is_file($dir . $archivo) && $archivo != "." && $archivo != "..") {
                        echo "Agregando archivo: $dir$archivo <br/>";
                        $zip->addFile($dir . $archivo, $dir . $archivo);
                    }
                }
                //cerramos el directorio abierto en el momento
                closedir($da);
            }
        }
    }

    public function downloadSubFolder(Request $request)
    {
        $company_id= \Auth::user()->company_id;
        $alias_company = $this->alias_company($company_id);
        $ruta_local = $request->ruta_local;
        $carpeta = $request->carpeta;
        $file ="wstorage/$alias_company/$ruta_local/$carpeta/";
        //creamos una instancia de ZipArchive
        $zip = new \ZipArchive();
        /*directorio a comprimir
         * la barra inclinada al final es importante
         * la ruta debe ser relativa no absoluta
        */
        //$dir = 'fuente/';
        //ruta donde guardar los archivos zip, ya debe existir
        $rutaFinal = "/var/www/html/wstorage/public/wstorage/archivos_zip";
        if(!file_exists($rutaFinal)){
            mkdir($rutaFinal);
        }
        $archivoZip = "$carpeta.zip";
        if ($zip->open($archivoZip, \ZIPARCHIVE::CREATE) === true) {
            $this->agregar_zip($file, $zip);
            $zip->close();
            //Muevo el archivo a una ruta
            //donde no se mezcle los zip con los demas archivos
            rename($archivoZip, "$rutaFinal/$archivoZip");
            //Hasta aqui el archivo zip ya esta creado
            //Verifico si el archivo ha sido creado
            if (file_exists($rutaFinal. "/" . $archivoZip)) {
                //echo "Proceso Finalizado!! <br/><br/>
                //Descargar: <a href='$rutaFinal/$archivoZip'>$archivoZip</a>";
                //set_time_limit(18000);
                $file_zip ="$rutaFinal/$archivoZip";
                $filename = $archivoZip; // el nombre con el que se descargara, puede ser diferente al original 
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename=' . $filename);
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file_zip));
                ob_clean();
                flush();
                readfile($file_zip);
                $delete_folder = exec("rm -rf $file_zip");
                die();
            } 
            else {
                echo "Error, archivo zip no ha sido creado!!";
                die();
            }
        }
        die();
    }

    public function showFilesSubFolder($ruta_local, $carpeta )
    {
        $dictionary = ".pdf, .png";
        $company_id= \Auth::user()->company_id;
        $alias_company = $this->alias_company($company_id);
        $path = "/var/www/html/wstorage/public/wstorage/$alias_company/$ruta_local/$carpeta";
        $path2 = "/var/www/html/wstorage/public/wstorage/$alias_company/$ruta_local/$carpeta";
        if (is_dir($path)){
            $gestor = opendir($path);
            $gestor2 = opendir($path2);
            return view('plantillas.list_files_subfolder',compact('ruta_local','gestor','path','gestor2','path2','dictionary','carpeta'));
        }
    }

    public function storeSubFolder(Request $request)
    {
        $name = $request->ruta_local;
        $sub_folder = $request->sub_folder;
        $company_id= \Auth::user()->company_id;
        $alias_company = $this->alias_company($company_id);
        if($_FILES){
            $upload_directory = "wstorage/$alias_company/$name/$sub_folder/";
            $upload_file_copy = $upload_directory . basename($_FILES['file']['name']);
            if(move_uploaded_file($_FILES['file']['tmp_name'], $upload_file_copy)){
                echo "El archivo fue subido correctamente";
                exit;
            }
            else{
                echo "El archivo no fue subido";
                exit;
            }
        }
    }

    public function downloadFileSubFolder(Request $request)
    {
        $company_id= \Auth::user()->company_id;
        $alias_company = $this->alias_company($company_id);
        $sub_folder = $request->sub_folder;
        $folder = $request->ruta_local;
        $archivo = $request->archivo;
        $file ="/var/www/html/wstorage/public/wstorage/$alias_company/$folder/$sub_folder/$archivo"; 
        $filename = $archivo; // el nombre con el que se descargara, puede ser diferente al original 
        header("Content-type: application/octet-stream"); 
        header("Content-Type: application/force-download"); 
        header("Content-Disposition: attachment; filename=\"$filename\"\n"); readfile($file);
        die();
    }

    public function deleteFileSubFolder(Request $request)
    {
        $company_id= \Auth::user()->company_id;
        $alias_company = $this->alias_company($company_id);
        $folder = $request->ruta_local;
        $archivo = $request->archivo;
        $sub_folder = $request->sub_folder;
        $path = "/var/www/html/wstorage/public/wstorage/$alias_company/$folder/$sub_folder/$archivo";
        //echo $path;die();
        //$delete_folder = exec("rm -rf $path");
        unlink($path);
        return Redirect::back()->with('success','File successfully deleted.');
    }

    private function space_user($ruta_local)
    {
        $space_user= DB::select("SELECT tamano FROM storages WHERE ruta_local = ?", [$ruta_local]
        );
        foreach ($space_user as $user_space) {
            foreach ($user_space as $available) {
                $available;
            }
        }
        return $available;
    }

    private function dictionary($company_id)
    {
        $dictionary= DB::select("SELECT nombre FROM dictionary WHERE company_id = ?", [$company_id]
        );
        foreach ($dictionary as $dictionary_company) {
            foreach ($dictionary_company as $dic) {
                $dic;
            }
        }
        return $dic;
    }
}
