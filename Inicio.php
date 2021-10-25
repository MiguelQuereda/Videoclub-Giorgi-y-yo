<?php
declare( strict_types = 1 );
include_once("autoload.php");
use \Dwes\ProyectoVideoclub\Soporte;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinta Video</title>
</head>

<body>
    <?php
    $miCinta = new CintaVideo("Los cazafantasmas", 23, 3.5, 107);
    echo "<strong>" . $miCinta->titulo . "</strong>";
    echo "<br>Precio: " . $miCinta->getPrecio() . " euros";
    echo "<br>Precio IVA incluido: " . $miCinta->getPrecioConIva() . " euros";
    $miCinta->muestraResumen();


    echo "<br>";
    echo "<br>";


    $miJuego = new Juego("The Last of Us Part II", 26, 49.99, "PS4", 1, 1);
    echo "<strong>" . $miJuego->titulo . "</strong>";
    echo "<br>Precio: " . $miJuego->getPrecio() . " euros";
    echo "<br>Precio IVA incluido: " . $miJuego->getPrecioConIva() . " euros";
    $miJuego->muestraResumen();

    ?>
</body>

</html>