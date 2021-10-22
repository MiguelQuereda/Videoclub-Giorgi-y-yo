<?php

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

    public function getNumSoporteAlquilados(): int{
        return count($this->soportesAlquilados);
     }

    //MÉTODOS

    

    public function muestraResumen()
    {
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Número de alquileres: " . $this->getNumSoporteAlquilados() . "<br>";
    }
}
