<?php  
	if($_FILES){
        	$upload_directory = "prueba/";
        	$upload_file_copy = $upload_directory . basename($_FILES['file']['name']);
        	if(move_uploaded_file($_FILES['file']['tmp_name'], $upload_file_copy)){
        		echo "El archivo fue subido correctamente";
        	}
        	else{
        		echo "El archivo no fue subido";
        	}
        }
?>