<?php
function loginUser()
{
    if (!isset($error)) {
        $error = "";
    }
    if (!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION['usuario'])) {
        die("Error - debe <a href='index.php'>identificarse</a>");
    }
    

    function loginAdmin()
    {
        loginUser();

        if ($_SESSION["usuario"] != "admin" && $_SESSION["password"] != "admin") {
            echo "No has entrado con sesion";
            header("Location: index.php");
        }
    }
}
