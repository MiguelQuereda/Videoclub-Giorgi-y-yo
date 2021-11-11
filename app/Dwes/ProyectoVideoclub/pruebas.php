<?php 
$arrayUsuarios = [["Jorge" => "Ponze"], ["Juan" => "Palomo"]];
$usuario = "Jorge";
$contrasenya = "Ponze";
//print_r($arrayUsuarios[0][$usuario]);

if (isset($arrayUsuarios,$usuario)){
    $posicion = array_search($usuario,$arrayUsuarios);
    echo "Ha encontrado el usuario <br>";
    $password = $arrayUsuarios[$posicion][$usuario];
    if ( $password == $contrasenya) {
        echo "Todo bien";
    }else { echo "No ha asociado bien el usuario y la contraseña";}
}else { echo "No ha asociado bien el usuario";}


?>