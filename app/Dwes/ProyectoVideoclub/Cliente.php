<?php
declare( strict_types = 1 );
namespace Dwes\ProyectoVideoclub;
include_once("autoload.php");
//include_once "Soporte.php";

class Cliente
{
    private array $soportesAlquilados;
    private int $numSoportesAlquilados;

    public function __construct(
        public string $nombre,
        private int $numero,
        private int $maxAlquilerConcurrente = 3
    ) {
        $this->soportesAlquilados=[];
    }


    //SETTER
    public function setNumero(int $num) : Cliente
    {
        $this->numero = $num;
        return $this;
    }


    //GETTER
    public function getNumero(): int
    {
        return $this->numero;
    }

    public function getNumSoporteAlquilados(): int
    {
        return count($this->soportesAlquilados);
    }

    //MÉTODOS

    public function tieneAlquilado(Soporte $s): bool
    {
      return isset($this->soportesAlquilados[$s->getNumero()]);
      // isset devuelve true or false
    }

    public function alquilar(Soporte $s)
    {
        if ($this->tieneAlquilado($s) == false && $this->getNumSoporteAlquilados() < $this->maxAlquilerConcurrente) {
            
            $this->soportesAlquilados[$s->getNumero()]= $s;
            //array_push($this->soportesAlquilados,$s);
            // Lo que hacemos es buscar por posición, es más eficiente.
            // 
            echo "<br>";
            echo "<b>Alquilado soporte a :</b> ".$this->nombre;
            //return true;

        }
        //return false;
        return $this;

    }

    public function devolver(int $numSoporte):bool{
        echo "<br>";
        if($this->numSoportesAlquilados != 0){
            unset($this->soportesAlquilados[$numSoporte]);
            echo "- El soporte en la posición ".$numSoporte." ha sido devuelta -";
            return true;
        }{
            echo "- Este cliente no tiene alquilado ningún elemento -";
            return false;
        }
        return $this;
    }

    public function listaAlquileres(): void{
        echo "<br>";
        echo"El usuario tiene: ".$this->getNumSoporteAlquilados()." alquilados";
        echo "<br>";
        foreach($this->soportesAlquilados as $s){
            echo $s->muestraResumen();
            echo "<br>";
        }

    }
    public function muestraResumen() 
    {
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Número de alquileres: " . $this->getNumSoporteAlquilados() . "<br>";
    }
}
