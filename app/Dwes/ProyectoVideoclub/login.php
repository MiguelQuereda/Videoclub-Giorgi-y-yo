<?php

namespace Dwes\ProyectoVideoclub;

use Dwes\ProyectoVideoclub\Util\VideoclubException;

include_once("../../../autoload.php");

$arrayUsuarios = [["Jorge" => "usuario"], ["Juan" => "usuario"], ["usuario", "usuario"]];
$nomClientes = ["Jorge","Juan","usuario"];
$_SESSION["nomClientes"] = $nomClientes;
$_SESSION["clientes"] = [["Jorge" => "usuario"], ["Juan" => "usuario"], ["usuario", "usuario"]];
$_SESSION["Soportes"] = "Ninguno";
// Comprobamos si ya se ha enviado el formulario
if (isset($_POST['enviar'])) {
    $usuario = $_POST['inputUsuario'];
    $password = $_POST['inputPassword'];

    // validamos que recibimos ambos parámetros
    if (empty($usuario) || empty($password)) {
        $error = "Debes introducir un usuario y contraseña";
        include "index.php";
    } else {
        
        if ($usuario == "admin" && $password == "admin") {
            // almacenamos el usuario en la sesión
            session_start();
            $_SESSION['usuario'] = $usuario;
            $_SESSION["password"] = $password;
            // cargamos la página principal
            include "mainAdmin.php";
        } else if (in_array([$usuario => $password], $arrayUsuarios)) {
                session_start();
                $_SESSION['usuario'] = $usuario;
                $_SESSION["password"] = $password;
                // cargamos la página principal
                include "mainCliente.php";
        } else {
            // Si las credenciales no son válidas, se vuelven a pedir
            $error = "Usuario o contraseña no válidos!";
            include "index.php";
        }
    }
}
