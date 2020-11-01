<?php

function table2html($table)
{
    global $pdo;

    $query = "SELECT * FROM  $table;";
    
    $rows = $pdo->query($query)->fetchAll(\PDO::FETCH_ASSOC);

    print "<p class='productos'>PRODUCTOS</p><br>";

    if (is_array($rows)) {/* Creamos un listado como una tabla HTML*/
        print "<br>";
        foreach ($rows as $row) {
            print "<p class='pProducto'>";
            foreach($row as $key => $value){
                if($key == "nombre"){
                    print "<b>$value :</b>";
                }
                elseif ($key == "imagen") {
                    print "<img class='imgProducto' src=$value>";
                }
                
            }

            if (isset($_SESSION['usuario'])){
                print "<a class='linkProducto' href='?action=ver_cesta'>Añadir a la cesta</a>";
            }

            print "</p>";
            print "<hr/>";

        }
    } 
    else
        print "<h1> No hay resultados </h1>"; 
}

?>