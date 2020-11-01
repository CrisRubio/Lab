<?php

function autentificar_usuario($table)
{
    global $pdo;

    $datos = $_REQUEST;
    if (count($_REQUEST) < 2) {
        $data["error"] = "No has rellenado el formulario correctamente";
        return;
    }

    $query = "SELECT * FROM  $table;";

    try {

        $rows = $pdo->query($query)->fetchAll(\PDO::FETCH_ASSOC);
        $count = 0;
        
        if (is_array($rows)) {
            foreach ($rows as $row) {
                foreach ($row as $key => $val) {
                    if($key == "nombre" && $_REQUEST['nombre']==$val){
                        $count = 1;
                    } 
                    
                    if ($key == "clave" && $_REQUEST['clave']==$val){
                        $count = 2;
                    }
                }
            }
        }

        if($count==2){
            $_SESSION["usuario"] = "normal";
            header("Location: portal.php");
        } else {
            echo "<h1> No se ha iniciado sesión correctamente </h1>";
        }

    } catch (PDOExeption $e) {
        echo ($e->getMessage());
    }
}

?>