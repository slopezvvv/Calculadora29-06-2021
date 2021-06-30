<?php 
session_start(); // resume sesion creada, o crea una nueva , PRIMERA LINEA DE CÓDIGO SIEMPRE SI SE USAN SESIONES
include("DTO/Constantes.php");
include("Modelo/Conexion.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Calculadora 1.0v</title>
        <style>
            *{margin:0;padding:0;}
            .boton_calc{
                width:50px;
                height:50px;
                cursor:pointer;
            }
            .outputs{
                text-align:right;
                border:solid 2px #cccccc;
                width:25%;
            }
        </style>
    </head>
    <body>
        <p id="output_1" class="outputs">-</p>
        <p id="output_2" class="outputs">0<p/>
       <?php
       $conexion = new Conexion();
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       //include('DTO/Aritmetica.php');
       function printAlert($a){
           echo("<script>alert('".$a."');</script>");
       }
       
       if(isset($_SESSION[KEY_ERROR])){
           switch($_SESSION[KEY_ERROR]){
               case -1:
                   printAlert(MESSAGE_ERROR_0);
                   break;
               default:
                   break;
           }
           $_SESSION[KEY_ERROR] = null;
       }
       else if(isset($_SESSION[KEY_OUT])){
           echo('<script>output_1.innerHTML='.$_SESSION[KEY_OUT].';</script>');//printAlert($_GET['out']);
           $_SESSION[KEY_OUT] = null;
       }
       ?>
        
        <form action="DTO/Aritmetica.php" method="POST">
            <!-- TEST -->
            <input type="hidden" name="op" value="3"/>
            <input type="submit" class="boton_calc" value="=" />
        </form>
        
        <?php
        $array_botones=[];
        //function llenarBotones(&$array_botones){
            for($i=9;$i >= 0;$i--) array_push($array_botones, $i); // botones números
            for($ii=0;$ii < 4;$ii++) {
                $simbolo="+";
                switch($ii){
                    case 1:
                        $simbolo="-";
                        break;
                    case 2:
                        $simbolo="/";
                        break;
                    case 3:
                        $simbolo="X";
                        break;
                    default:
                        break;
                }
                array_push($array_botones, $simbolo); // botones aritméticos
            }
        //}
        //function imprimirBotonesHTML(){
            $indice_quiebre=0;
            $indice_numeros=0;
            foreach ($array_botones as $botones => $valor) {
               $indice_quiebre++;
               $indice_numeros++;
               $indice_quiebre %= 3;
               //echo($indice_quiebre);
               ?>
                <button class="boton_calc"><?php echo($valor); ?></button>
                <?php
                if($indice_quiebre == 0 && $indice_numeros < 10){
                    ?>
                    <br>
                    <?php
                }
            }
        //}
        //llenarBotones($array_botones);
        //imprimirBotonesHTML();
        ?>
    </body>
</html>
