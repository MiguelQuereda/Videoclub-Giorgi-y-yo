<?php
spl_autoload_register(function ($nombreClase) {
    $ruta= "app\\" . $nombreClase . '.php';
    // Sustituimos las ramas
    $ruta = str_replace("\\","/",$ruta);
    include_once ($ruta);
});


// El "app/" es porque es el nombre de la carpeta raiz