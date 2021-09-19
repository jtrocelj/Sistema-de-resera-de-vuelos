<?php
include "conexion.php";
//Esta función es para verificar inicios de sesión
session_start();
// Verificamos si la variable usr tiene algún valor, si no tiene significa que no hay inicio de sesión
if(!isset($_SESSION['usr'])){
    // almacenando los valores introducidos por el usuario en variables
    $usuario=$_POST['usr'];
    $clave=$_POST['clave'];
    $con=conexion();
    try {
        // Preparando consulta a la BD
        $sql="select usuario,clave from usuarios where usuario='$usuario' and estado=1;";
        $result=mysqli_query($con,$sql);
        // Verificando que se ejecute la consulta
        if(!$row=mysqli_fetch_row($result)){
            echo "Error de consulta";
        }
        else{

            $result=mysqli_query($con,$sql);
            $row=mysqli_fetch_object($result);
            // Desencriptando la contraaseña y comparando $clave tiene lo que introdujo el usuario
            // $row->clave contiene la contraseña guardada en la BD
            if(password_verify($clave,$row->clave)){
                // Si la contraseña coincide, entonces se credenciales que se necesita como el usuario
                session_start();
                $_SESSION['usr']=$usuario;
                $_SESSION['nombre']=$row->nombre;
                // Se redirige al index.php mandando la variable log como true para que se muestre el menu
                header("Location: ../menu.php?log=true");
            }
            else{
                // se redirige a index.php con log=false para no mostrar menú
                header("Location: ../menu.php?log=false");
            }
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>

