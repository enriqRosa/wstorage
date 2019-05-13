<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showFiles()
    {
        /*$listar = null;
        $folder = null;
        $directorio=opendir("wstorage/");
        while ($elemento = readdir($directorio))
        {
            if ($elemento != '.' && $elemento != '..')
            {
                if (is_dir("wstorage/".$elemento))
                {
                    $listar .=$elemento;
                }
                else
                {
                    $folder .=$elemento;
                }
            }
        }*/
        return view('plantillas.list_files', compact('listar', 'folder'));
    }

    public function listar_archivos(){
        if(is_dir("wstorage")){
            if($dir = opendir($carpeta)){
                while(($archivo = readdir($dir)) !== false){
                    if($archivo != '.' && $archivo != '..' && $archivo != '.htaccess'){
                        echo '<li><a target="_blank" href="'.$carpeta.'/'.$archivo.'">'.$archivo.'</a></li>';
                    }
                }
                closedir($dir);
            }
        }
    }

	# FUNCION PARA MOSTRAR LA INTERFAZ DE CARGAR ARCHIVOS #
	//public function index()
    /*{
    	if($_FILES){
        	$upload_directory = store('public');
        	$upload_file_copy = $upload_directory . basename($_FILES['file']['name']);
        	if(move_uploaded_file($_FILES['file']['tmp_name'], $upload_file_copy)){
        		echo "El archivo fue subido correctamente";
        	}
        	else{
        		echo "El archivo no fue subido";
        	}
        }*/
        //return view('plantillas.files');
    //}*/

    public function store(Request $request)
    {
        # Opcion 1 #
        #$upload_directory = $request->file('file')->store('public');
        # Opcion 2 #
        if($_FILES){
        	$upload_directory = "wstorage/";
        	$upload_file_copy = $upload_directory . basename($_FILES['file']['name']);
        	if(move_uploaded_file($_FILES['file']['tmp_name'], $upload_file_copy)){
        		echo "El archivo fue subido correctamente";
        	}
        	else{
        		echo "El archivo no fue subido";
        	}
        }
        # Opcion 3 #
       	/*$file = $request->file('file');
        $nombre = $file->getClientOriginalName();
       	if(Storage::disk('public')->put($nombre, \File::get($file)))
       		echo $res = "bien";
       	else
       		echo $res = "mal";*/
       	/*$file = $request->file('file');
        $nombre = $file->getClientOriginalName();
       	$disk = Storage::disk('local');
		$disk->put($nombre, fopen($file, 'r+'));*/
    }
/*
    public function cargar(Request $request)
    {
        if($_FILES){
        	$upload_directory = "wstorage/";
        	$upload_file_copy = $upload_directory . basename($_FILES['file']['name']);
        	if(move_uploaded_file($_FILES['file']['tmp_name'], $upload_file_copy)){
        		echo "El archivo fue subido correctamente";
        	}
        	else{
        		echo "El archivo no fue subido";
        	}
        }
        //die();
        /*$file = $request->file('file');
        $nombre = $file->getClientOriginalName();
        $disk = Storage::disk('local');
        $disk->put($nombre, fopen($file, 'r+'));*/
        /*$file = $request->file('file');
        $nombre = $file->getClientOriginalName();
        if(Storage::disk('public')->put($nombre, \File::get($file)))
            echo $res = "bien";
        else
            echo $res = "mal";*/
        //Storage::putFile($request->file('file'), new File($request->file('file')));
    //}
}
