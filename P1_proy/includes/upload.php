<?php

function upload(){

    $target_dir = "img/";
    $target_file = $target_dir.basename($_FILES["tmp_file"]["name"]);
    $upload = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    //Comprobar si es una imagen real
    if(isset($_POST["sumbit"])){
        $check = getimagesize($_FILES["tmp_file"]["tmp_name"]);
        if($check !== false){
            echo "El archivo es una imagen real";
            $upload = 1;
        }else{
            echo "El archivo subido no es una imagen";
            $upload = 0;
        }
    }
    
    //Comprobar si el fichero ya existe
    if(file_exists($target_file)){
        echo "El fichero ya existe.";
        $upload = 0;
    }
    
    //Comprobar el tamaño del fichero
    if($_FILES["tmp_file"]["size"] > 200000){
        echo "El fichero es demasiado grande";
        $upload = 0;
    }
    
    //Aceptar formatos
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "jpeg"){
        echo "Dicho fichero no está permitido.";
        $upload = 0;
    }
    
    //Comprobar $upload
    if ($upload == 0){
        echo "El archivo no se ha subido.";
    } else { // Si todo es correcto, intenta subirlo.
        if (move_uploaded_file($_FILES["tmp_file"]["tmp_name"],$target_file)){
            echo "El fichero se ha subido correctamente.";
            
        }else{
            echo "Ha ocurrido un error.";
        }
    }
}
?>