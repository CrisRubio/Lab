<?php

function registrar_producto($table)
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
        $a = $consult->execute(array($_REQUEST['product_id'], $_REQUEST['nombre'],$_REQUEST['imagen']));

        if (1>$a) echo "<h1> Inserción incorrecta </h1>";
        else {         
            header("Location: portal.php");
        }
    
    } catch (PDOExeption $e) {
        echo ($e->getMessage());
    }
}

?>