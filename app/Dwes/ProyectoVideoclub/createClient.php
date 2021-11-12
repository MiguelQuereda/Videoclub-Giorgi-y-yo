<?php

if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_POST["usuario"])){
    $error= "No has entrado con sesion";
    include_once("formCreateClient.php");
}
// Y comprobamos que el usuario se haya autentificado
/*if (!isset($_SESSION['usuario'])) {
   die("Error - debe <a href='410index.php'>identificarse</a>.<br />");
}*/// De estas forma, aparece el mensaje por duplicado, pero no redirecciona
if (!isset($_SESSION['usuario'])) {
    die("<br />Error - debe identificarse correctamente <a href='410index.php'> Ir al inicio </a>.");
 }
