<?php

namespace Dwes\ProyectoVideoclub;

use Dwes\ProyectoVideoclub\Util\VideoclubException;

include_once("../../../autoload.php");

loginAdmin();
$usuario = $_SESSION["usuario"];
if (!isset($_POST["nombre"]) || empty($_POST["nombre"])) {
    $error = "No has enviado ningún usuario";
    include_once("formCreateClient.php");
} else {
    $usuario = $_POST["nombre"];
    $vc = $_SESSION["videoclub"];
    $vc->incluirSocio($usuario);
    echo "El usuario ha sido registrado con exito. ¿ Que deseas hacer ?  <br>";
    if ($usuario == "admin") {
        echo "<a href='mainAdmin.php'>Volver a la página. </a><br>";
    } else {
        echo "<a href='mainCliente.php'>Volver a la página. </a><br>";
    }
    echo "<a href='logout.php'>Desconectarse. </a><br>";
}
