<?php
declare( strict_types = 1 );
namespace Dwes\ProyectoVideoclub;
//include_once("Resumible.php"); esto va solo en las páginas de pruebas
// En las clases solo incluimoms el name Space, nos ahorra los include y use

abstract class Soporte implements Resumible
{
    const IVA = 1.21;

    //CONSTRUCTOR
    public function __construct(
        public string $titulo,
        protected int $numero,
        private float $precio,
        public bool $alquilado = false
    ) {
    }

    //GETTERS
    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }


    //MÉTODOS
    public function getPrecioConIva(): float
    {
        return $this->precio * self::IVA;
    }

    public function muestraResumen()
    {
        echo "<i>" . $this->titulo . "</i><br>";
       echo $this->precio . " (IVA no incluido)<br>";

    }
}
