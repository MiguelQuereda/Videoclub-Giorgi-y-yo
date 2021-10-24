<?php

include_once "Soporte.php";
include_once "Cliente.php";

class VideoClub
{
    private int $numProductos;
    private int $numSocios;
    private array $productos;
    private array $socios;

    //CONSTRUCTOR
    public function __construct(
        private string $nombre
    ) {
        $this->productos = [];
        $this->socios = [];
    }

    //GETTERS
    public function getNumProductos(): int
    {
        return count($this->productos);
    }

    public function getNumSocios(): int
    {
        return count($this->socios);
    }


    //MÉTODOS
    private function incluirProducto(Soporte $s)
    {
        array_push($this->productos, $s);
    }

    public function incluirCintaVideo($titulo, $precio, $duracion)
    {
        $v = new CintaVideo($titulo, $this->numProductos, $precio, $duracion);
        $this->incluirProducto($v);
    }

    public function incluirDvd($titulo, $precio, $idiomas, $pantalla)
    {
        $d = new DVD($titulo, $this->numProductos, $precio, $idiomas, $pantalla);
        $this->incluirProducto($d);
    }

    public function incluirJuego($titulo, $precio, $consola, $minJ, $maxJ)
    {
        $j = new Juego($titulo, $this->numProductos, $precio, $consola, $minJ, $maxJ);
        $this->incluirProducto($j);
    }

    public function incluirSocio($nombre, $maxAlquileresConcurrentes = 3)
    {
        $soportesAlquilados = [];
        $numSoportesAlquilados = count($soportesAlquilados);
        $s = new Cliente($nombre, $this->numSocios, $soportesAlquilados[], $numSoportesAlquilados, $maxAlquileresConcurrentes);
    }

    public function listarProductos()
    {
        foreach ($this->productos as $p) {
            echo $p->muestraResumen();
            echo "<br>";
        }
    }

    public function listarSocios()
    {
        foreach ($this->socios as $s) {
            echo $s->muestraResumen();
            echo "<br>";
        }
    }

    //TODO: Terminar
    public function alquilaSocioProducto($numeroCliente, $numeroSoporte)
    {
        if ($numeroCliente instanceof Cliente) {
            $numeroCliente->alquilar($numeroSoporte);
        } else {
            echo "Este número no está asociado a ningún cliente";
        }
    }
}
