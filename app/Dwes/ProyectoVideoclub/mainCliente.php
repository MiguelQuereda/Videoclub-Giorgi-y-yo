<?php
namespace Dwes\ProyectoVideoclub;
use Dwes\ProyectoVideoclub\Util\VideoclubException;
include_once("../../../autoload.php");
if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION["usuario"]) && !isset($_SESSION["password"])){
    $error= "No has entrado con sesion";
    include_once("index.php");
}

if (!isset($_SESSION['usuario'])) {
    die("<br />Error - debe identificarse correctamente <a href='index.php'> Ir al inicio </a>.");
 }

 $usuario = $_SESSION["usuario"];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>

<body>
    <h2> Bienvenido <?= $usuario ?></h2>
    <?php
        
    ?>
    <a href="logout.php"><i>Cerrar sesión</i></a>
</body>

</html>