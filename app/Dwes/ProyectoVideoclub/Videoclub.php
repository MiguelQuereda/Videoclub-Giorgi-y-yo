<?php

declare(strict_types=1);

namespace Dwes\ProyectoVideoclub;

use CupoSuperadoException;
use Dwes\ProyectoVideoclub\Util\CupoSuperadoException as UtilCupoSuperadoException;
use Dwes\ProyectoVideoclub\Util\SoporteYaAlquiladoException as UtilSoporteYaAlquiladoException;
use Dwes\ProyectoVideoclub\Util\VideoclubException;

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
        } catch (UtilCupoSuperadoException $e) {
            echo "UtilCupoSuperadoException" . ($e->getMessage());
        } catch (UtilSoporteYaAlquiladoException $e) {
            echo "UtilSoporteYaAlquiladoException" . ($e->getMessage());
        }
    }

    public function alquilaSocioProductos(int $numSocio, array $numerosProducto)
    {
        $socio = $this->socios[$numSocio];
        if(!isset($socio)){
            // throw new exception "Este socio esta muy muerto (no existe el socio)."
        }
        foreach($numerosProducto as $n){// Comprobar si estan alquilados
            $soporte = $this->productos[$n];
            $check = true;
            if(!$soporte->alquilado == false){
                $check = false;
            }
        }
        if($check == true){
        foreach($numerosProducto as $n){
            $soporte = $this->productos[$n];
            if(isset($soporte)){
                $socio->alquilar($soporte);
                $soporte->alquilado = true;
            }
        }
    }

        //$soporte = $this->productos[$numeroSoporte];
    }
}
