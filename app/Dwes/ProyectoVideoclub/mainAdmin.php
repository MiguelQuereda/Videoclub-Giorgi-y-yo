<?php
namespace Dwes\ProyectoVideoclub;
use Dwes\ProyectoVideoclub\Util\VideoclubException;
include_once("../../../autoload.php");

// Prueba
try {
    $vc =$_SESSION["videoclub"];
    //voy a incluir unos cuantos soportes de prueba 
    $vc->incluirJuego("God of War", 19.99, "PS4", 1, 1);
    $vc->incluirJuego("The Last of Us Part II", 49.99, "PS4", 1, 1);
    $vc->incluirDvd("Torrente", 4.5, "es", "16:9");
    $vc->incluirDvd("Origen", 4.5, "es,en,fr", "16:9");
    $vc->incluirDvd("El Imperio Contraataca", 3, "es,en", "16:9");
    $vc->incluirCintaVideo("Los cazafantasmas", 3.5, 107);
    $vc->incluirCintaVideo("El nombre de la Rosa", 1.5, 140);
    // Aquí lo que hacemos es hacer 2 acciones en la misma línea. Esto solo funciona si es de la misma clase y todas las funciones devuelven $this;
    $vc->incluirCintaVideo("El nombre de la Rosa", 1.5, 140)->incluirCintaVideo("Los cazafantasmas", 3.5, 107);
    //listo los productos 
    ///$vc->listarProductos();

    //voy a crear algunos socios 
    $vc->incluirSocio("Amancio Ortega");
    $vc->incluirSocio("Pablo Picasso");

    //$vc->alquilaSocioProducto(1, 2);
    //$vc->alquilaSocioProducto(1, 3);
    //alquilo otra vez el soporte 2 al socio 1. 
    // no debe dejarme porque ya lo tiene alquilado 
    //$vc->alquilaSocioProducto(1, 2);
    //alquilo el soporte 6 al socio 1. 
    //no se puede porque el socio 1 tiene 2 alquileres como máximo 
    //$vc->alquilaSocioProducto(1, 6);

    //listo los socios 
    //$vc->listarSocios();
} catch (VideoclubException $e){
    echo"Se ha producido un error: ".$e->getMessage();
}

if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION["usuario"]) && !isset($_SESSION["password"])) {
    $error = "No has entrado con sesion";
    include_once("index.php");
} else if ($_SESSION["usuario"] != "admin" && $_SESSION["password"] != "admin") {
    echo "No has entrado con sesion";
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
    <br>
    <a href="logout.php"><i>Cerrar sesión</i></a>
    <br>
    <h3>Socios:</h3>
    <?php
    $vc->listarSocios();
    ?>
    <h3>Productos:</h3>
      <?php
    $vc->listarProductos();
    ?>

    <h3><a href="formCreteSoporte.php">Crear soporte</a></h3>
    <h3><a href="removeCliente.php">Borrar clientes</a></h3>
    
</body>

</html>