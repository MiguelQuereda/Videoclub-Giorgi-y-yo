<?php

namespace Dwes\ProyectoVideoclub;

use Dwes\ProyectoVideoclub\Util\VideoclubException;

include_once("../../../autoload.php");


if (!isset($error)) {
    $error = "";
}
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usuario'])) {
    die("Error - debe <a href='index.php'>identificarse</a>");
}
if ($_SESSION["usuario"] != "admin" && $_SESSION["password"] != "admin") {
    echo "No has entrado con sesion";
    header("Location: index.php");
}

$usuario = $_SESSION["usuario"];
if ((!isset($_POST["nombre"]) || empty($_POST["nombre"])) && 
    (!isset($_POST["user"]) || empty($_POST["user"])) && 
    (!isset($_POST["pass"]) || empty($_POST["pass"]))) {
    $error = "No has rellenado todos los campos";
    include_once("formCreateClient.php");
} else {
    $id= $_POST["id"];
    $usuario = $_SESSION["usuario"];
    $vc = $_SESSION["videoclub"];
    $nomb = $_POST["nombre"];
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    $u = $vc->getSocios()[$id];
    $u ->setNombre($nomb);
    $u ->setUsuario($user);
    $u ->setPassword($pass);
    $_SESSION["usuario"] = $user;
    $_SESSION["password"] = $pass;
    $_SESSION["nomCliente"] = $nomb;
     

    echo "El usuario ha sido actualizado con exito. ¿ Que deseas hacer ?  <br>";
    if ($usuario == "admin") {
        echo "<a href='mainAdmin.php'>Volver a la página. </a><br>";
    } else{
        echo "<a href='mainCliente.php'>Volver a la página. </a><br>";
    }
    echo "<a href='logout.php'>Desconectarse. </a><br>";
}
