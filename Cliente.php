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
        if (array_count_values($this->soportesAlquilados, $s)) {
            return true;
        } else {
            return false;
        }
    }

    public function alquilar(Soporte $s): bool
    {
        if ($this->tieneAlquilado($s) == false && $this->getNumSoporteAlquilados() < $this->maxAlquilerConcurrente) {
            $this->getNumSoporteAlquilados++;
            echo "El soporte ha sido alquilado a : ".$this->nombre;
            return true;
        }
        return false;
    }

    public function devolver(int $numSoporte):bool{
        if(array_count_values($this->soportesAlquilados, $numSoporte)){
            echo "El soporte con el código ".$numSoporte." ha sido devuelta";
            $this->getNumSoporteAlquilados--;
            return true;
        }{
            echo "No hay ningún soporte con ese número inscrito en la lista";
            return false;
        }
    }

    public function listaAlquileres(): void{

        echo"El usuario tiene: ".$this->getNumSoporteAlquilados()." alquilados";
        foreach($this->soportesAlquilados as $s){
            echo $s->mostrarResumen();
        }

    }
    public function muestraResumen()
    {
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Número de alquileres: " . $this->getNumSoporteAlquilados() . "<br>";
    }
}
