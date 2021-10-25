<?php
spl_autoload_register(function ($nombreClase) {
    include_once "app/" . $nombreClase . '.php';
});


// El "app/" es porque es el nombre de la carpeta raiz