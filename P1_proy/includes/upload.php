<?php
function upload(){

    $datos = $_REQUEST;
    if (count($_REQUEST) < 1) {
        $data["error"] = "No has rellenado el formulario correctamente";
        return;
    }
    $file = $_REQUEST['tmp_file'];
    $target_dir = "img/";
    $target_file = $target_dir.basename($_FILES["upload"]["name"]);
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
}
?>