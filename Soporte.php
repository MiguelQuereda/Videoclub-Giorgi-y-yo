<?php
include "CintaVideo.php";
class Soporte
{
 const IVA=1.21;

    //CONSTRUCTOR
    public function __construct(
        public string $titulo,
        protected int $numero,
        private float $precio
    ){

    }

    //GETTERS
    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }


    //MÉTODOS
    public function getPrecioConIva(): float
    {
        return $this->precio*self::IVA;
    }

    public function muestraResumen()
    {
        
        echo "<i>".$this->titulo."</i><br>";
        echo $this->precio." (IVA no incluido)<br>";
    }

}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soporte</title>
</head>
<body>

</body>
</html>