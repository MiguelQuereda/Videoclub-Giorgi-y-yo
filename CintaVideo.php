<?php

include_once "Soporte.php";
class CintaVideo extends Soporte
{
 const IVA=1.21;

    //CONSTRUCTOR
    public function __construct(
        string $titulo,
        int $numero,
        float $precio,
        private int $duracion
    ){
        parent::__construct($titulo, $numero, $precio);
    }

    //GETTERS
    public function getDuracion(): int 
    {
        return $this->duracion;
    }

    
    //MÉTODOS
    public function muestraResumen(): string
    {
        $salida = parent::muestraResumen();
        $salida .= "<p>Duración: ".$this->duracion." minutos.</p>";
        return $salida;
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>