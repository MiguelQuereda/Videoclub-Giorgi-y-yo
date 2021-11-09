<?php

namespace Dwes\ProyectoVideoclub;

$arrayUsuarios = [["usuario" => "Jorge", "contrasenya" => "Ponze"], ["usuario" => "Juan", "contrasenya" => "Palomo"]];
$arrayAdmin = [];
// Comprobamos si ya se ha enviado el formulario
if (isset($_POST['enviar'])) {
    $usuario = $_POST['inputUsuario'];
    $password = $_POST['inputPassword'];

    // validamos que recibimos ambos parámetros
    if (empty($usuario) || empty($password)) {
        $error = "Debes introducir un usuario y contraseña";
        include "index.php";
    } else {
        if (isset($arrayUsuarios[$usuario])) {
            if ($arrayUsuarios[$usuario]["contrasenya"] == $password) {
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
