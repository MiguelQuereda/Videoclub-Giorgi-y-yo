<?php
// Recuperamos la información de la sesión
session_start();

// Y la vaciamos
session_destroy();
header("Location: index.php");
?>