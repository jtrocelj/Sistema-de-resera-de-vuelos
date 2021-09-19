<?php
include "conexion.php";
// LA FUNCION ISSET VERIFICA SI EXISTE O NO UNA VARIABLE
// EN ESTE CASO VERIFICA SI EXISTE LA VARIABLE ACCION
$opc=isset($_POST['Accion']);
//AL VERIFICAR QUE EXISTE, SE EVAULA SU VALOR CON UN SWITCH CASE
// SI ES 1, SE DIRECCIONA HACIA UNA FUNCION
if($opc!=0){
    switch($opc){
        case 1:{
            registrarVuelo();
            break;
        }
        case 2:{
            //si es otra funcion
            break;
        }
        default:{
            break;
        }
    }
}
function registrarVuelo(){
    // RECIBIMOS CADA VALOR ENVIADO DESDE JQUERY CON EL METODO POST
    $nom=$_POST['nom'];
    $ape=$_POST['ape'];
    $tel=$_POST['tel'];
    $email=$_POST['email'];
    $or=$_POST['or'];
    $des=$_POST['des'];
    $fecha=$_POST['fecha'];
    // GENERAMOS UN CODIGO
    
    try {

        $con=conexion();
       
            $sql="insert into cliente(nombres,apellidos,telefono,email,origen,destino,fecha)values('$nom','$ape','$tel','$email','$or','$des','$fecha');";
            if(mysqli_query($con,$sql)){
                printf("<script type='text/javascript'>alert('RESERVA EXITOSA'); </script>");
                //$fila_array[]=array('res'=>'REGISTRO EXITOSO');
            }else{
                echo mysqli_error($con);
            }
        
    }catch (Exception $e){
        echo $e->getMessage();
    }
}


?>