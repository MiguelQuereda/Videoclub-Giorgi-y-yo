<?php

declare(strict_types=1);

namespace Dwes\ProyectoVideoclub;

use CupoSuperadoException;
use Dwes\ProyectoVideoclub\Util\VideoclubException;
use SoporteYaAlqiuladoException;

//include_once("autoload.php");

//include_once "Soporte.php";
//include_once "Cliente.php";

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
        // array_push($this->productos, $s);
        $this->productos[$s->getNumero()] = $s;
        $this->numProductos++; // Nos ha faltado esto

    }

    public function incluirCintaVideo($titulo, $precio, $duracion)
    {
        $v = new CintaVideo($titulo, $this->numProductos, $precio, $duracion);
        $this->incluirProducto($v);
        $this->numProductos++; // Nos ha faltado esto
        return $this;
    }

    public function incluirDvd($titulo, $precio, $idiomas, $pantalla)
    {
        $d = new DVD($titulo, $this->numProductos, $precio, $idiomas, $pantalla);
        $this->incluirProducto($d);
        $this->numProductos++; // Nos ha faltado esto
        return $this;
    }

    public function incluirJuego($titulo, $precio, $consola, $minJ, $maxJ)
    {
        $j = new Juego($titulo, $this->numProductos, $precio, $consola, $minJ, $maxJ);
        $this->incluirProducto($j);
        $this->numProductos++; // Nos ha faltado esto
        return $this;
    }

    public function incluirSocio($nombre, $maxAlquileresConcurrentes = 3)
    {
        $soportesAlquilados = [];
        $numSoportesAlquilados = count($soportesAlquilados);
        $s = new Cliente($nombre, $this->numSocios, $soportesAlquilados[], $numSoportesAlquilados, $maxAlquileresConcurrentes);
        $this->numSocios++; // Nos ha faltado esto
        return $this;
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
        $cliente = $this->socios[$numeroCliente];
        $soporte = $this->productos[$numeroSoporte];
        try {
            if (isset($cliente) && isset($soporte)) {
                $cliente->alquilar($soporte);
            }
        } catch (CupoSuperadoException | SoporteYaAlqiuladoException $e) {
            throw new VideoclubException($e->getMessage());
        }
    }
}
