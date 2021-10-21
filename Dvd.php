<?php

include_once "Soporte.php";
class DVD extends Soporte
{
 const IVA=1.21;

    //CONSTRUCTOR
    public function __construct(
        string $titulo,
        int $numero,
        float $precio,
        public string $idiomas,
        private string $formaPantalla
    ){
        parent::__construct($titulo, $numero, $precio);
    }

    //GETTERS
    public function getIdiomas(): string 
    {
        return $this->idiomas;
    }
    public function getFormaPantalla(): string 
    {
        return $this->formaPantalla;
    }

    
    //MÉTODOS
    public function muestraResumen()
    {
        echo "<br>"."Película en DVD: "."<br>";
        echo parent::muestraResumen();
        echo "Idiomas:".$this->idiomas."<br>";
        echo "Formato de Pantalla:".$this->formaPantalla."<br>";


    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DVD</title>
</head>
<body>
    
</body>
</html>