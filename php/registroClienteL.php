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
            cargarDatos2();
            break;
        }
        case 3:{
            registrarCliente();
            break;
        }
        case 4:{
            modificarDatos();
            break;
        }
        case 5:{
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
        //$fila_array[]=array("apellidos"=>'No existe',"nombres"=>'No existe',"telefono"=>'No existe',"email"=>'No existe',"origen"=>'No existe',"destino"=>'No existe',"fecha"=>'No existe',"equipaje"=>'No existe',"peso_equipaje"=>'No existe',"hora"=>'No existe',"asiento"=>'No existe');
        while($fila=mysqli_fetch_object($result)){
            $fila_array[]=array("apellidos"=>$fila->apellidos,"nombres"=>$fila->nombres,"telefono"=>$fila->telefono,"email"=>$fila->email,"origen"=>$fila->origen,"destino"=>$fila->destino,"fecha"=>$fila->fecha,"equipaje"=>$fila->equipaje,"peso_equipaje"=>$fila->peso_equipaje,"hora"=>$fila->hora,"asiento"=>$fila->asiento);
        }
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

function cargarDatos2(){
    $conn=conexion();
    $numDoc=$_POST['numDoc'];

    // Consulta a ejecutar en la BD
    $sql="select * from registrocli where numero_documento='$numDoc';";

    // El resultado de la consulta lo almacenamos en la variable $result
    $result=mysqli_query($conn,$sql);

    if(mysqli_fetch_row($result)!=true){
        // No existen registros
        //$fila_array[]=array("numero_documento"=>'No existe',"tipo_documento"=>'No existe',"nombres"=>'No existe',"apellidos"=>'No existe',"telefono"=>'No existe',"email"=>'No existe',"fecha_nacimiento"=>'No existe',"nacionalidad"=>'No existe',"estado_civil"=>'No existe',"genero"=>'No existe',"foto"=>'No existe');
        $result=mysqli_query($conn,$sql);
        while($fila=mysqli_fetch_object($result)){
            $fila_array[]=array("numero_documento"=>$fila->numero_documento,"tipo_documento"=>$fila->tipo_documento,"nombres"=>$fila->nombres,"apellidos"=>$fila->apellidos,"telefono"=>$fila->telefono,"email"=>$fila->email,"fecha_nacimiento"=>$fila->fecha_nacimiento,"nacionalidad"=>$fila->nacionalidad,"estado_civil"=>$fila->estado_civil,"genero"=>$fila->genero,"foto"=>$fila->foto);
        }
    }
    else{
        $result=mysqli_query($conn,$sql);
        while($fila=mysqli_fetch_object($result)){
            $fila_array[]=array("numero_documento"=>$fila->numero_documento,"tipo_documento"=>$fila->tipo_documento,"nombres"=>$fila->nombres,"apellidos"=>$fila->apellidos,"telefono"=>$fila->telefono,"email"=>$fila->email,"fecha_nacimiento"=>$fila->fecha_nacimiento,"nacionalidad"=>$fila->nacionalidad,"estado_civil"=>$fila->estado_civil,"genero"=>$fila->genero,"foto"=>$fila->foto);
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
    $tipDoc=$_POST['tipDoc'];
    $numDoc=$_POST['numDoc'];
    $fecNac=$_POST['fecNac'];
    $nacCli=$_POST['nacCli'];
    $estCiv=$_POST['estCiv'];
    $gen=$_POST['gen'];
    $fotoOriginal=$_POST['fotoOriginal'];

    $codigo=substr($nom,0,1).substr($ape,0,1).$numDoc;
    try {
        if($_POST['textofile']!=""){
            if($fotoOriginal!=""){
                if(!unlink("../".$fotoOriginal)){
                    echo "Archivo no eliminado";
                }
            }
            $sep=explode(".",$_FILES['file']['name']);
            $extension=end($sep);
            if(move_uploaded_file($_FILES['file']['tmp_name'],"../imagenes/".$codigo.".".$extension)){
                $foto="imagenes/".$codigo.".".$extension;
            }
            else{
                echo "Archivo incorrecto o dañado";
            }
        }
        else{
            $sep=explode(".",$fotoOriginal);
            $extension=end($sep);
            rename("../".$fotoOriginal,"../imagenes/".$codigo.".".$extension);
            $foto="imagenes/".$codigo.".".$extension;
        }
        $sql="update registrocli set numero_documento='$numDoc',tipo_documento='$tipDoc',nombres='$nom',estado_civil='$estCiv',genero='$gen',fecha_nacimiento='$fecNac' where numero_documento='$numDoc';";
        if(mysqli_query($conn,$sql)){
           echo "CLIENTE REGISTRADO";
        }
        else{
            echo mysqli_error($conn);
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    
}

function registrarCliente(){
    // RECIBIMOS CADA VALOR ENVIADO DESDE JQUERY CON EL METODO POST
    $nom=$_POST['nom'];
    $ape=$_POST['ape'];
    $tel=$_POST['tel'];
    $email=$_POST['email'];
    $tipDoc=$_POST['tipDoc'];
    $numDoc=$_POST['numDoc'];
    $fecNac=$_POST['fecNac'];
    $nacCli=$_POST['nacCli'];
    $estCiv=$_POST['estCiv'];
    $gen=$_POST['gen'];
    // GENERAMOS UN CODIGO

    $codigo=substr($nom,0,1).substr($ape,0,1).$numDoc;
    try { // significa intentar
        $con=conexion();
        $x=explode(".",$_FILES['file']['name']);
        $extension=end($x);

        if(move_uploaded_file($_FILES["file"]["tmp_name"],"../imagenes/".$codigo.".".$extension)){
            $foto="imagenes/".$codigo.".".$extension;
            $sql="insert into registrocli(nombres,apellidos,telefono,email,tipo_documento,numero_documento,fecha_nacimiento,nacionalidad,estado_civil,genero,foto)values('$nom','$ape','$tel','$email','$tipDoc','$numDoc','$fecNac','$nacCli','$estCiv','$gen','$foto');";
            if(mysqli_query($con,$sql)){
                printf("<script type='text/javascript'>alert('REGISTRO EXITOSO'); </script>");
                //$fila_array[]=array('res'=>'REGISTRO EXITOSO');
            }else{
                echo mysqli_error($con);
            }
        }else{
            echo "Archivo incorrecto";
        }
        
    }catch (Exception $e){
        echo $e->getMessage();
    }
}


function eliminarDatos(){

    // Conectando a la BD
    $conn=conexion();

    // Recibiendo variables que envía la petición AJAX
    $numDoc=$_POST['numDoc'];
    $foto=$_POST['foto'];
    try {
        if($foto!=""){
            if(!unlink("../".$foto)){
                echo "Archivo no eliminado";
            }
        }
        $sql="delete from registrocli where numero_documento='$numDoc';";
        if(mysqli_query($conn,$sql)){
            echo 0;
        }
        else{
            echo "Registro no eliminado";
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    
}

?>