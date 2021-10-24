<?php
include_once "Soporte.php";

class Cliente
{
    private array $soportesAlquilados;
    private int $numSoportesAlquilados;

    function __construct(
        public string $nombre,
        private int $numero,
        private int $maxAlquilerConcurrente = 3
    ) {
        $this->soportesAlquilados=[];
    }


    //SETTER
    public function setNumero(int $num)
    {
        return $this->numero = $num;
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
        if (in_array($s,$this->soportesAlquilados)==true) {
            return true;
        } else {
            return false;
        }
    }

    public function alquilar(Soporte $s): bool
    {
        if ($this->tieneAlquilado($s) == false && $this->getNumSoporteAlquilados() < $this->maxAlquilerConcurrente) {
            array_push($this->soportesAlquilados,$s);
            echo "<br>";
            echo "<b>Alquilado soporte a :</b> ".$this->nombre;
            return true;
        }
        return false;
    }

    public function devolver(int $numSoporte):bool{
        echo "<br>";
        if(sizeof($this->soportesAlquilados) >= $numSoporte){
            echo "- El soporte en la posición ".$numSoporte." ha sido devuelta -";
            unset($this->soportesAlquilados[$numSoporte]);
            return true;
        }{
            echo "- Este cliente no tiene alquilado ningún elemento -";
            return false;
        }
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
