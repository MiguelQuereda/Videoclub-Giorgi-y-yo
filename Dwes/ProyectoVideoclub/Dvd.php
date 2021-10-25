<?php
namespace Dwes\ProyectoVideoclub;
include_once "Soporte.php";

class DVD extends Soporte
{
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
