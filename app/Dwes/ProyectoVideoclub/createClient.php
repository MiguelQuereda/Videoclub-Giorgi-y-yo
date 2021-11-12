<?php
namespace Dwes\ProyectoVideoclub;
use Dwes\ProyectoVideoclub\Util\VideoclubException;
include_once("../../../autoload.php");

if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_POST["usuario"]) || empty($_POST["usuario"])){
    $error= "No has enviado ningún usuario";
    include_once("formCreateClient.php");
}else{
    $videoclub =$_SESSION["videoclub"];
}


