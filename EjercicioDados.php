

<?php

/**
 * Cinco dados - cinco-dados.php
 *
 * @author Alberto López
 *
 */
define('NUMDADOS', 5);

// Caracteres UTF8( de dados 1 a 6)
$tcharDados = [
  1 => "&#9856;", 2 => "&#9857;",
  3 => "&#9858;", 4 => "&#9859;",
  5 => "&#9860;",  6 => "&#9861;"
];

/* Funciones auxiliares */

/**
 *  Genera un array con valores de dados 1..6
 * @param int $numdados - tamaño de array generado
 * @return int[] array generado
 */
function generarDados(int $numdados): array
{
  // Cambiar siempre se genera los mismo valores.
  $TablaDados = [];
  while(count ($TablaDados) < 6){
    $variable = random_int(1,6);
    $TablaDados[] = $variable;
  }
  return $TablaDados;
}

/**
 * Calcula el valor de los datos
 * Suma de todos los valores menos el mas alto y el mas bajo
 * @param array $tdados
 * @return int
 */
function calcularPuntos( array $tdados): int {
  $max = $tdados[0];
  $min = $tdados[0];
    for ($i = 0; $i < 6; $i++) {
        $suma = 0;
        if ($tdados[$i] > $max) {
            $max = $tdados[$i];
        } else {
        if ($tdados[$i] < $min) {
            $min = $tdados[$i]; 
    }
}
 }
 $suma = (array_sum($tdados) - ($max + $min) );
 return $suma;
}




/**
 * Gemera um mensaje indicando el jugador ganador o si ha habido empate
 * @param int $puntos1  - puntos del primer jugador
 * @param int $puntos2  - puntos del segundo jugador
 * @return string - Mensaje generado
 */
function generarMensajeGanador(int $puntos1, int $puntos2): string
{
  $msg = "";
  if($puntos1 == $puntos2) {
    $msg = "Empate";
  } else if ($puntos1 > $puntos2) {
    $msg = "jugador uno";
  } else {
    $msg = "jugador dos";
  }
  return "El ganador es: $msg ";
}

// Función que genera un mensaje para múltiples ganadores
// Recibe un lista de parámetros variables
/**
 *   Genera el hmtl con la imagne asociado a el valor del dado
 * @param array $tdados - valores de los dados
 * @return string - cadena html donde se incluye el caracter asociado a valor de cada dado
 */
function generarImagenes( array $tdados): string
{
  $msg = "";
  global $tcharDados;
  for ($i = 0; $i < 6; $i++) {
   $valor = $tdados[$i];
   $msg .= "<span style='font-size:100px;'>" . $tcharDados[ $valor] . "</span>";
   }
  
  return $msg;
}

/* Programa principal */

$dadosJugador1 = generarDados(NUMDADOS);
$dadosJugador2 = generarDados(NUMDADOS);
$puntosJugado1 = calcularPuntos($dadosJugador1);
$puntosJugado2 = calcularPuntos($dadosJugador2);


$msgGanador    = generarMensajeGanador($puntosJugado1, $puntosJugado2);

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>
    Cinco dados.

  </title>

</head>

<body>
  <h1>Cinco dados</h1>