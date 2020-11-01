<?php

function registrar_usuario($table)
{
    global $pdo;

    $datos = $_REQUEST;
    if (count($_REQUEST) < 3) {
        $data["error"] = "No has rellenado el formulario correctamente";
        return;
    }
    $query = "INSERT INTO $table VALUES (?,?,?);";
    try { 
        $consult = $pdo -> prepare($query);
        $a = $consult->execute(array($_REQUEST['nombre'], $_REQUEST['email'],$_REQUEST['clave']  ));

        if (1>$a) echo "<h1> Inserción incorrecta </h1>";
        else echo "<h1> Usuario registrado! </h1><button href='?action=login'>Iniciar Sesión</button>";

        $_SESSION["usuario"] = "normal";
    
    } catch (PDOExeption $e) {
        echo ($e->getMessage());
    }
}

?>