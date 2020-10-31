<?php

function autentificar_usuario($table)
{
    global $pdo;

    $query = "SELECT * FROM  $table;";

    $rows = $pdo->query($query)->fetchAll(\PDO::FETCH_ASSOC);

    if (is_array($rows)) {
        foreach ($rows as $row) {
            foreach ($row as $key => $val) {
                if($key)
                print "<br>";
                echo $val;
            }
        }
    }
    else
        print "<h1> No hay resultados </h1>"; 
    }

    /*
    buscar usuario y passwd en DB y comparar con $_POST
    según el resultado fijar la variable de sesion of mostar error

    $_SESSION["usuario"] = role
    */

?>