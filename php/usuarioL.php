<?php
include "conexion.php";
$opc=isset($_POST['Accion']);
if($opc!=0){
    switch ($_POST['Accion']) {
        case 1:
            registrarUsuario();
            break;
        
        default:
            break;
    }
}

function registrarUsuario(){
    $con=conexion();
    $nombre=$_POST["nombre"];
    $paterno=$_POST["paterno"];
    $materno=$_POST["materno"];
    $ci=$_POST["ci"];
    try {
        //Creando usuario para poder loguearse
        $usr=substr($nombre,0,1).$paterno;
        // Creando clave, por defecto será el CI
        // Se utiliza la función password_hash para encriptar la contraseña, pasandole PASSWORD_DEFAULT para el algoritmo de encriptación
        $clave=password_hash($ci,PASSWORD_DEFAULT);
        // al hacer la consulta SQL, el primer campo lo configuramos como auto incrementable
        // por eso pasamos un cero para que Mysql automáticamente genere su número
        // El último capo es el estado (habilitado, inhabilitado), 1=habilitado
        $sql="insert into usuarios values(0,'$nombre','$paterno','$materno',$ci,'$usr','$clave',1)";
        if(mysqli_query($con,$sql)){
            $fila_array[]=array("resp"=>"Usuario creado");
        }
        else{
            $fila_array[]=array("resp"=>mysqli_error($con));
        }
    } catch (Exception $e) {
        $fila_array[]=array("resp"=>$e->getMessage());
    }
    $resp=json_encode($fila_array);
    echo $resp;
}
?>

