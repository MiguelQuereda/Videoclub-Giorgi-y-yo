<?php

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
    public function precioConIva(): float
    {
        return $this->precio*self::IVA;
    }

    public function muestraResumen(): string
    {
        $salida = "<p>".$this->titulo;
        $salida .= $this->precio." (IVA no incluido). </p>";
        $salida .= "<p>Precio IVA incluido: ".$this->precioConIva()." euros.</p>";
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
<?php
$soporte1 = new Soporte("Tenet", 22, 3);
echo $soporte1->muestraResumen(); 


$soporte2 = new CintaVideo("Cazafantasmas", 8, 13, 106);
echo $soporte2->muestraResumen();
?>
</body>
</html>