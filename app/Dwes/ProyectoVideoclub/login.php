<?php

namespace Dwes\ProyectoVideoclub;

use Dwes\ProyectoVideoclub\Util\VideoclubException;

include_once("../../../autoload.php");

$arrayUsuarios = [["Jorge" => "usuario"], ["Juan" => "usuario"]];

try {
    $vc = new Videoclub("Severo");

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
    $vc->incluirSocio("Jorge");
    $vc->incluirSocio("Juan");

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
} catch (VideoclubException $e) {
    echo "Se ha producido un error: " . $e->getMessage();
}
// Comprobamos si ya se ha enviado el formulario
if (isset($_POST['enviar'])) {
    $usuario = $_POST['inputUsuario'];
    $password = $_POST['inputPassword'];

    // validamos que recibimos ambos parámetros
    if (empty($usuario) || empty($password)) {
        $error = "Debes introducir un usuario y contraseña";
        include "index.php";
    } else {
        if (array_search($usuario, $arrayUsuarios) == false) {
            $error = "Debes introducir un usuario válido";
            include "index.php";
        } elseif (isset($arrayUsuarios, $usuario)) {
            $posicion = array_search($usuario, $arrayUsuarios);
            $contrasenya = $arrayUsuarios[$posicion][$usuario];
            if ($password == $contrasenya) {
                session_start();
                $_SESSION['usuario'] = $usuario;
                $_SESSION["password"] = $password;
                // cargamos la página principal
                include "mainCliente.php";
            }
        } elseif ($usuario == "admin" && $password == "admin") {
            // almacenamos el usuario en la sesión
            session_start();
            $_SESSION['usuario'] = $usuario;
            $_SESSION["password"] = $password;
            // cargamos la página principal
            include "mainAdmin.php";
        } else {
            // Si las credenciales no son válidas, se vuelven a pedir
            $error = "Usuario o contraseña no válidos!";
            include "index.php";
        }
    }
}
