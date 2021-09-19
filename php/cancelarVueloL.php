<?php
    include "conexion.php";
    $opc=isset($_POST['Accion']);
    if($opc!=0){
        switch ($_POST['Accion']) {
            case 1:{
                cargarDatos();
                break;
            }
            case 2:{
                modificarDatos();
                break;
            }
            case 3:{
                eliminarDatos();
                break;
            }
            default:
                # code...
                break;
        }
    }

   
    function eliminarDatos(){

        // Conectando a la BD
        $conn=conexion();

        // Recibiendo variables que envía la petición AJAX
        $ape=$_POST['ape'];
       
        try {
        
            $sql="delete from cliente where apellidos='$ape';";
            if(mysqli_query($conn,$sql)){
                printf("<script type='text/javascript'>alert('VUELO CANCELADO'); </script>");
            }
            else{
                echo mysqli_error($conn);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        
    }
?>