<?php
/**
 * * Descripción: Ejemplo de proyecto
 * *
 * * @author  Cristina Rubio
 * * @copyright 2020 Cristina R.
 * * @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
 * * @version 1

 * */
session_start();

include(dirname(__FILE__)."/includes/ejecutarSQL.php");
$central = "";
include(dirname(__FILE__)."/partials/header.php");
include(dirname(__FILE__)."/partials/menu.php");
include(dirname(__FILE__)."/includes/conector_BD.php");
include(dirname(__FILE__)."/includes/table2html.php");
include(dirname(__FILE__)."/includes/registrar_usuario.php");
include(dirname(__FILE__)."/includes/registrar_producto.php");
include(dirname(__FILE__)."/includes/autentificar_usuario.php");
include(dirname(__FILE__)."/includes/upload.php");

if (isset($_REQUEST['action'])) $action = $_REQUEST["action"];
else $action = "home";

switch ($action) {
    case "home":
        $central = "/partials/centro.php";
        break;
    case "sobre_nosotros":
        $central = "/partials/nosotros.php";
    break;
    case "upload":
        alert();
        upload(); //insertar imagen
        break;
    case "login": 
        $central = "/partials/login.php"; //formulario login 
        break;
    case "do_login":
        $central = autentificar_usuario("usuarios"); //fijar $_SESSION["usuario"]
        break;
    case "registrar_usuario":
        $central = "/partials/registro_usuario.php"; //formulario usuarios
        break;
    case "insertar_usuario":
        $central = registrar_usuario("usuarios"); //tabla usuarios
        break;
    case "listar_productos":
        $central = "/partials/listarProductos.php";
        //$central = table2html("productos"); //tabla productos
        break;
    case "registrar_producto":
        $central = "/partials/registro_producto.php"; //formulario producto
        break;
    case "insertar_producto":
        $central = registrar_producto("productos"); //tabla productos
        break;
    case "ver_cesta":
        $central = "/partials/cesta.php";
        break;
    case "encestar":
        $central = "<p>Todavía no puedo añadir a la cesta</p>"; //tabla compras
        break;
    case "realizar_compra":
        $central = "<p>Todavía no puedo añadir a la cesta</p>"; //cesta en $_SESSION["cesta"]
        break;
    case "movil":
        $central = "/partials/movil.php";
        break;
    case "cerrar_sesion":
        session_destroy();
        header("Location: portal.php");
        break;
    default:
        $data["error"] = "Accion No permitida";
        $central = "/partials/centro.php";
}

if ($central <> "") include(dirname(__FILE__).$central);
include(dirname(__FILE__)."/partials/footer.php");
?>