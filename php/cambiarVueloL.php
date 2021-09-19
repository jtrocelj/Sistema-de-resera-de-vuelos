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

    function cargarDatos(){
        $conn=conexion();
        $ape=$_POST['ape'];

        // Consulta a ejecutar en la BD
        $sql="select * from cliente where apellidos ='$ape';";

        // El resultado de la consulta lo almacenamos en la variable $result
        $result=mysqli_query($conn,$sql);

        if(mysqli_fetch_row($result)!=true){
            // No existen registros
            $fila_array[]=array("apellidos"=>'No existe',"nombres"=>'No existe',"telefono"=>'No existe',"email"=>'No existe',"origen"=>'No existe',"destino"=>'No existe',"fecha"=>'No existe',"equipaje"=>'No existe',"peso_equipaje"=>'No existe',"hora"=>'No existe',"asiento"=>'No existe');
        }
        else{
            $result=mysqli_query($conn,$sql);
            while($fila=mysqli_fetch_object($result)){
                $fila_array[]=array("apellidos"=>$fila->apellidos,"nombres"=>$fila->nombres,"telefono"=>$fila->telefono,"email"=>$fila->email,"origen"=>$fila->origen,"destino"=>$fila->destino,"fecha"=>$fila->fecha,"equipaje"=>$fila->equipaje,"peso_equipaje"=>$fila->peso_equipaje,"hora"=>$fila->hora,"asiento"=>$fila->asiento);
            }
        }
        $resp=json_encode($fila_array);
        echo $resp;
    }


    function modificarDatos(){

        // Conectando a la BD
        $conn=conexion();

        // Recibiendo variables que envía la petición AJAX
        $nom=$_POST['nom'];
        $ape=$_POST['ape'];
        $tel=$_POST['tel'];
        $email=$_POST['email'];
        $or=$_POST['or'];
        $des=$_POST['des'];
        $fecha=$_POST['fecha'];
        $equipaje=$_POST['equipaje'];
        $peso=$_POST['peso'];
        $hora=$_POST['hora'];
        $asiento=$_POST['asiento'];
        try {
          
            $sql="update cliente set apellidos='$ape',nombres='$nom', telefono='$tel',email='$email',origen='$or', destino='$des',fecha='$fecha',equipaje='$equipaje',peso_equipaje='$peso',hora='$hora',asiento='$asiento' where apellidos='$ape';";
            if(mysqli_query($conn,$sql)){
                echo "VUELO ACTUALIZADO";
            }
            else{
                echo mysqli_error($conn);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        
    }
    
    
?>