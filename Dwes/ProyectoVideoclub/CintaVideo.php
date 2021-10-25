<?php
namespace Dwes\ProyectoVideoclub;
include_once "Soporte.php";

class CintaVideo extends Soporte
{
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
    public function muestraResumen()
    {
        
        echo "<br>"."Película en VHS: "."<br>";
        echo parent::muestraResumen();
        echo "Duración:".$this->duracion." minutos ";

    }

}
