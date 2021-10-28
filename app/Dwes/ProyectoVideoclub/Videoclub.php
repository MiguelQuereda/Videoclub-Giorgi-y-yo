<?php

declare(strict_types=1);

namespace Dwes\ProyectoVideoclub;

use Dwes\ProyectoVideoclub\Util\CupoSuperadoException;
use Dwes\ProyectoVideoclub\Util\SoporteNoEncontradoException;
use Dwes\ProyectoVideoclub\Util\SoporteYaAlquiladoException;

//include_once("autoload.php");

//include_once "Soporte.php";
//include_once "Cliente.php";

class VideoClub
{
    private int $numProductos;
    private int $numSocios;
    private array $productos;
    private array $socios;
    public int $numProductosAlquilados;
    public int $numTotalAlquileres;

    //CONSTRUCTOR
    public function __construct(
        private string $nombre,

    ) {
        $this->productos = [];
        $this->socios = [];
        $this->numProductos = 0;
        $this->numSocios = 0;
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

    public function getNumProductosAlquilados(): int
    {
        return $this->numProductosAlquilados;
    }

    public function getNumTotalAlquileres(): int
    {
        return $this->numTotalAlquileres;
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
        return $this;
    }

    public function incluirDvd($titulo, $precio, $idiomas, $pantalla)
    {
        $d = new DVD($titulo, $this->numProductos, $precio, $idiomas, $pantalla);
        $this->incluirProducto($d);
        return $this;
    }

    public function incluirJuego($titulo, $precio, $consola, $minJ, $maxJ)
    {
        $j = new Juego($titulo, count($this->productos), $precio, $consola, $minJ, $maxJ);
        $this->incluirProducto($j);
        return $this;
    }

    public function incluirSocio($nombre, $maxAlquileresConcurrentes = 3)
    {
        $s = new Cliente($nombre, count($this->socios), $maxAlquileresConcurrentes);
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
            if (!isset($cliente)){
                // Crear esta excepción: throw new ClienteNoEncontradoException("Cliente no enctonrado al realizar el alquiler");

            } else if(!isset($soporte)) {
                // Crear esta excepción: throw new SoporteNoExiste("Cliente no enctonrado al realizar el alquiler");

            }else{
                $cliente->alquilar($soporte);
            }
        } catch (CupoSuperadoException $e) {
            echo "¡Error!" . ($e->getMessage());
        } catch (SoporteYaAlquiladoException $e) {
            echo "¡Error!" . ($e->getMessage());
        }
    }

    public function alquilaSocioProductos(int $numSocio, array $numerosProducto)
    {
        $socio = $this->socios[$numSocio];
        if (!isset($socio)) {
            // throw new SocioNoExiste "Este socio esta muy muerto (no existe el socio)."
        }
        $check = true;
        foreach ($numerosProducto as $n) { // Comprobar si estan alquilados
            $soporte = $this->productos[$n];
            if (isset($soporte)) {
                throw new SoporteNoEncontradoException("El soporte $n no existe");
            }
            if (!$soporte->alquilado == false) {
                $check = false;
            }
        }

        // Todos los soportes están disponibles
        if ($check == true) {
            foreach ($numerosProducto as $n) {// Metemos los elementos en el array
                $soporte = $this->productos[$n];
                    $socio->alquilar($soporte);
                    $soporte->alquilado = true;
            }
        }

        //$soporte = $this->productos[$numeroSoporte];
    }
}
