<?php

include_once "Soporte.php";
class Juego extends Soporte
{
    const IVA = 1.21;

    //CONSTRUCTOR
    public function __construct(
        string $titulo,
        int $numero,
        float $precio,
        public string $consola,
        private int $minNumJugadores,
        private int $maxNumJugadores
    ) {
        parent::__construct($titulo, $numero, $precio);
    }

    //GETTERS
    public function getConsola(): string
    {
        return $this->consola;
    }
    public function getMinNumJugadores(): int
    {
        return $this->minNumJugadores;
    }
    public function getMaxJugadores(): int
    {
        return $this->maxNumJugadores;
    }


    //MÉTODOS
    public function muestraJugadoresPosibles(): string
    {
        $min = $this->minNumJugadores;
        $max = $this->maxNumJugadores;
        $frase = "";
        if ($min == $max) {
            if ($min > 1) {
                $frase = "Juego para " . $min . "jugadores";
            } else {
                $frase = "Para un jugador";
            }
        }else{
            $frase = "Para ".$min." a ".$max." jugadores";
        }

        return $frase;
    }
    public function muestraResumen()
    {
        echo "<br>" . "Película en DVD: " . "<br>";
        echo parent::muestraResumen();
        echo $this->muestraJugadoresPosibles()."<br>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DVD</title>
</head>

<body>

</body>

</html>