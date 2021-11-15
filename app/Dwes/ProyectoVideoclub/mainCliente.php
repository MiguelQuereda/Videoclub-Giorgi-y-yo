<?php
namespace Dwes\ProyectoVideoclub;
use Dwes\ProyectoVideoclub\Util\VideoclubException;
include_once("Cliente.php");
include_once("../../../autoload.php");

loginUser();

$vc =$_SESSION["videoclub"];

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
  
    $vc=$_SESSION["videoclub"];
    $user = $vc->socios[$this->usuario = $usuario];
    ?>
    <a href="formUpdateCliente.php">Modificar datos de cliente</a>
    <br>
    <a href="logout.php"><i>Cerrar sesión</i></a>
</body>

</html>