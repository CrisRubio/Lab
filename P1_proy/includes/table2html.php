<?php

function table2html($table)
{
    global $pdo;

    $query = "SELECT * FROM  $table;";
    
    $rows = $pdo->query($query)->fetchAll(\PDO::FETCH_ASSOC);

    print "<p class='productos'>PRODUCTOS</p><br>";
    
   print "<div class='visor'>";
 
    if (is_array($rows)) { /* Creamos un listado como una tabla HTML*/
        foreach ($rows as $row) {
            foreach($row as $key => $value){
                if($key == "product_id"){
                    $product_id=$value;
                }
                if($key == "nombre"){
                    $nombre = $value;
                }
                elseif ($key == "imagen") {
                    $url = $value;
                }
                elseif ($key == "precio") {
                    $precio = $value;
                }
            }

            print "<div id='$product_id' class='item'>
                <img src=$url class='imgVisor'>
                <p>$nombre : $precio €</p>
                <button>Comprar</button>
                </div>";
         
            if (isset($_SESSION['usuario']) and $_SESSION['usuario'] != 'admin'){
                print "<a class='linkProducto' href='?action=ver_cesta'>Añadir a la cesta</a>";
            } 
        }
        print "</div>";
        
        if (isset($_SESSION['usuario']) and $_SESSION['usuario'] != 'admin'){
            print "<a class='linkProducto' href='?action=ver_cesta'>Añadir a la cesta</a>";
        }

        print "</p>";
        print "<hr/>";
    } 
    else
        print "<h1> No hay resultados </h1>";
}

?>