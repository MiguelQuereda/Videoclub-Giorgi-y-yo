<?php
declare( strict_types = 1 );
namespace Dwes\ProyectoVideoclub;

use Dwes\ProyectoVideoclub\Util\CupoSuperadoException;
use Dwes\ProyectoVideoclub\Util\SoporteNoEncontradoException;
use Dwes\ProyectoVideoclub\Util\SoporteYaAlquiladoException;
use Dwes\ProyectoVideoclub\Util\VideoclubException;

include_once "Soporte.php";

class Cliente
{
    private array $soportesAlquilados;
    private int $numSoportesAlquilados;

    public function __construct(
        public string $nombre,
        private int $numero,
        private int $maxAlquilerConcurrente = 3,
        private int $usuario = "usuario".$numero,
        private int $contrasenya = "usuario"
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
            $s->alquilado = true;
            //return true;

        }
        else{
            if($this->tieneAlquilado($s) == true && $this->getNumSoporteAlquilados() >= $this->maxAlquilerConcurrente){
                throw new CupoSuperadoException("No puede alquilar, por favor, devuelva algún soporte alquilado.");
                throw new SoporteYaAlquiladoException("Ya tiene alquilado el soporte ".$s);
            }
            else if(count($this->soportesAlquilados) >= $this->maxAlquilerConcurrente){
                throw new CupoSuperadoException("No puede alquilar, por favor, devuelva algún soporte. Num de alquieres: ");
            }
            else if($this->tieneAlquilado($s)){
                throw new SoporteYaAlquiladoException("Ya tiene alquilado el soporte ".$s->titulo);
            }
        }
        return $this;

    }

    public function alquilar2(Soporte $s)
    {
        if(!$this->tieneAlquilado($s)){
            throw new SoporteYaAlquiladoException("El cliente ya tiene alquilado el soporte ".$s->titulo);
        }
        if($this->numSoportesAlquilados >= $this->maxAlquilerConcurrente){
            throw new CupoSuperadoException("Este cliente tiene ".$this->numSoportesAlquilados);
        }

        $this->soportesAlquilados[$s->getNumero()]= $s;
        $this->numSoportesAlquilados++;
        echo"Alquilado soporte a ".$this->nombre;

    }

    public function devolver(int $numSoporte){
        echo "<br>";
        if(!isset($this->soportesAlquilados[$numSoporte])){
            throw new SoporteNoEncontradoException("El soporte ".$numSoporte." no existe");

        }
        if(count($this->soportesAlquilados) != 0){
            unset($this->soportesAlquilados[$numSoporte]);
            echo "- El soporte en la posición ".$numSoporte." ha sido devuelta -";
            //De esta forma, decimos que el Soporte con el num = numSoporte, le alteramos la propiedad alquilar
            $this->soportesAlquilados[$numSoporte]->alquilar = false;
        }
        else{
            throw new SoporteNoEncontradoException("El soporte ".$numSoporte." no existe");
            echo "- Este cliente no tiene alquilado ningún elemento -";
            //return false;
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
