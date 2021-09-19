<?php
include "conexion.php";
$opc=isset($_POST['Accion']);
if($opc!=0){
    switch ($_POST['Accion']) {
        case 1:
           salir();
            break;
        
        default:
            break;
    }
}

function salir(){
    session_start();
    session_destroy();
    $fila_array[]=array("resp"=>"ok");
    $resp=json_encode($fila_array);
    echo $resp;
}

?>