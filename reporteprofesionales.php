<?php
    $conexion=mysqli_connect('localhost','root','','bdd_aeropuerto')
?>

 <br>  
 <link rel="shortcut icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTgOSmqvZ4mKXzUT9ok_wYiAfagJFAAGn9ohsg5ItGyJAyDigtH" />
<link rel="stylesheet" href="css/font-awesome.min.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="css/styles.css">
<head>
        <style>
            /** 
                Set the margins of the page to 0, so the footer and the header
                can be of the full height and width !
             **/
            @page {
                margin: 0cm 0cm;
            }

            /** Define now the real margins of every page in the PDF **/
            body {
                margin-top: 3cm;
                margin-left: 1cm;
                margin-right: 1cm;
                margin-bottom: 2cm;
            }

            /** Define the header rules **/
            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 3cm;
            }

            /** Define the footer rules **/
            footer {
                position: fixed; 
                bottom: 0cm; 
                left: 0cm; 
                right: 0cm;
                height: 2cm;
            }
        </style>
</head>

<header>
    <img src="imagenes/9442.jpg" width="100%" height="200%"/>
</header>
<main>
    <h2>Reporte de Pasajeros</h2>
    <table border="3" id="tabla">
            <tr class="bg-info"align="center" >
                <td>Apellidos</td>
                <td>Nombres</td>
                <td>Telefono</td>
                <td>Origen</td>
                <td>Destino</td>
                <td>Fecha</td>
                <td>Hora</td>
                <td>Asiento</td>
                <td>Equipaje</td>
                <td>Peso Equipaje</td>
            </tr>
            <?php
            $sql = "select * from cliente";
            $result=mysqli_query($conexion,$sql);
            while($mostrar = mysqli_fetch_array($result)){
            ?> 

            <tr align="center">
                <td><?php echo $mostrar['apellidos'] ?></td>
                <td><?php echo $mostrar['nombres'] ?></td>
                <td><?php echo $mostrar['telefono'] ?></td>
                <td><?php echo $mostrar['origen'] ?></td>
                <td><?php echo $mostrar['destino'] ?></td>
                <td><?php echo $mostrar['fecha'] ?></td>
                <td><?php echo $mostrar['hora'] ?></td>
                <td><?php echo $mostrar['asiento'] ?></td>
                <td><?php echo $mostrar['equipaje'] ?></td>
                <td><?php echo $mostrar['peso_equipaje'] ?></td>
            </tr>
            <?php
            }
            ?>
    </table>
</main>
<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$filename = "reportes/pasajeros.pdf";
file_put_contents($filename, $pdf);
$dompdf->stream($filename);
?>
