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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soporte</title>
</head>
<body>
<?php
$soporte1 = new Soporte("Tenet", 22, 3); 
echo "<strong>" . $soporte1->titulo . "</strong>"; 
echo "<br>Precio: " . $soporte1->getPrecio() . " euros"; 
echo "<br>Precio IVA incluido: " . $soporte1->getPrecioConIVA() . " euros";
echo "<br>";
echo $soporte1->muestraResumen();


echo "<br>";
echo "<br>";


$miCinta = new CintaVideo("Los cazafantasmas", 23, 3.5, 107); 
echo "<strong>" . $miCinta->titulo . "</strong>"; 
echo "<br>Precio: " . $miCinta->getPrecio() . " euros"; 
echo "<br>Precio IVA incluido: " . $miCinta->getPrecioConIva() . " euros";
$miCinta->muestraResumen();

?>
</body>
</html>