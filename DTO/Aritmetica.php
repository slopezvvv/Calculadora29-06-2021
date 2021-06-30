<?php
session_start();
include("Constantes.php");
// definición de clase en php
class Aritmetica{
//    function __construct(){}
    function sum($a,$b){
        return $a+$b;
    }
    function dif($a,$b){
        return $a-$b;
    }
    function prod($a,$b){
        return $a*$b;
    }
    function div($a,$b){
        if($b == 0){
            $_SESSION[KEY_ERROR] = -1;
            return 0;
        }
        return $a/$b;
    }
//    function __destruct() {}
}
$aritmetica = new Aritmetica();

$out = 'No existe la operación solicitada ! vuelva a intentar.';
$input = intval($_GET['op']);
$a =  floatval($_GET['factorA']); // ESTO HAY QUE MODIFICARLO AHORA!!
$b = floatval($_GET['factorB']);
switch($input){
    case 0:
        $out = $aritmetica->sum($a, $b);
        break;
    case 1:
        $out = $aritmetica->dif($a, $b);
        break;
    case 2:
        $out = $aritmetica->prod($a, $b);
        break;
    case 3:
        $out = $aritmetica->div($a, $b);
        break;
    default:
        break;
}
header('Location: ../index.php?out='.$out);
//$a = 0; // integer
//$b = 1; // integer
//$c = "Hola mundo, esta es la variable C"; // strings
//$d = true; // booleanos, true o false
//$e = 1e5; // tipo de dato integer, pero con 5 ceros despues del 1, es decir, 100000
//$f = 0.125; // tipo de dato float
//$g = 0.25;  // tipo de dato double
//$h = new Aritmetica(); // tipo de dato complejo
//$output = 'cf,gsd'; // NO HAY CHAR CON COMAS SIMPLES, esto sigue siendo un string


//$array = explode(',',$output); // delimita un string dependiendo del símbolo que se le pase como parámetros.
//for($i = 0; $i < strlen($output); $i++)
//echo();
//$i = 0;
//while(1){
//    if($i > strlen($output)) break;
//    echo($output[$i]."</br>");
//    $i++;
//}