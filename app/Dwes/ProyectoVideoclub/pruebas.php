<?php 
$arrayUsuarios = [["usuario" => "Jorge", "contrasenya" => "Ponze"], ["usuario" => "Juan", "contrasenya" => "Palomo"]];
$usuario = "Jorge";
$contrasenya = "Ponze";

if (isset($arrayUsuarios,$usuario)){
    echo "Ha encontrado el usuario";
    $a = $arrayUsuarios[$usuario]["contrasenya"];
    echo $a;

    /*if ($arrayUsuarios[$usuario][$contrasenya] == $contrasenya) {
        echo "Todo bien";
    }else { echo "No ha asociado bien el usuario y la contraseña";}*/
}else { echo "No ha asociado bien el usuario";}


?>