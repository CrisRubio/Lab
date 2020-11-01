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
            
        if (is_array($rows)) {
            foreach ($rows as $row) {
                foreach ($row as $key => $val) {
                    if(($key == "nombre" && $_REQUEST['nombre']==$val) && ($key == "clave" && $_REQUEST['clave']==$val)){
                        echo "<h1> ¡ Bienvenido ! </h1>";
                        $_SESSION["usuario"] = "normal";
                    }
                }
            }
        }

    } catch (PDOExeption $e) {
        echo ($e->getMessage());
    }
}

?>