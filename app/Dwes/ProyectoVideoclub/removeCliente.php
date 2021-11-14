<?php

$usuario = $_POST["usuario"];

//Comprobamos que es el admin el que accede a la página
if ($_SESSION['usuario'] == "admin" && $_SESSION['password'] == "admin") {
    session_start();
    echo "Usuarios: ";
    print_r($_SESSION["usuario"]);
    echo "<br>";
    include "removeClie.php";

    //Si el cliente esta dentro de sesión, lo borramos
    if (in_array([$usuario], $_SESSION["usuario"])) {

        $vc = $_SESSION["videoclub"];
        $u = $vc->socios[$this->usuario = $usuario];
        unset($u);
        unset($_SESSION[$usuario]);
    } else {
        echo "Ha ingresado mal el nombre del cliente, vuelva a ingresar el nombre";
        include "removeClie.php";
    }
} else {
    $error = "Debes ser admin para poder borrar clientes!";
    include "index.php";
}
