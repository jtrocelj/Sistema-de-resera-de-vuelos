<?php
$medidaTicket = 800;
$conexion=mysqli_connect('localhost','root','','bdd_aeropuerto');
?>
<!DOCTYPE html>
<html>
        <head>
            <style>
                * {
                    font-size: 15px;
                    font-family: 'DejaVu Sans', serif;
                }
                h1 {
                    font-size: 18px;
                }
                .ticket {
                    margin: 2px;
                }
                td,
                th,
                tr,
                table {
                    border-top: 1px solid black;
                    border-collapse: collapse;
                    margin: 0 auto;
                    width: 120px;
                    text-align: center;
                }
                th {
                    text-align: center;
                    color: #696969;
                }
                .centrado {
                    text-align: center;
                    align-content: center;
                }
                .ticket {
                    width: <?php echo $medidaTicket ?>px;
                    max-width: <?php echo $medidaTicket ?>px;
                }

                img {
                    max-width: inherit;
                    width: inherit;
                }
                * {
                    margin: 0;
                    padding: 0;
                }
                .ticket {
                    margin: 0;
                    padding: 0;
                }
                body {
                    text-align: center;
                }
            </style>
        </head>
        <body>
            <div class="ticket centrado">
                <h1>AIRLINE</h1>
                <h2>Ticket de Pasaje</h2>
                <h2>2021</h2>
                <table>
                    <thead>
                        <tr class="centrado">
                            <th class="nombre">NOMBRE</th>
                            <th class="apellido">APELLIDOS</th>
                            <th class="hora">HORA</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $ape = $_POST['apellidoCli'];
                    $sql = "select * from cliente where apellidos LIKE '$ape';";
                    $result=mysqli_query($conexion,$sql);
                    while($mostrar = mysqli_fetch_array($result)){
                    ?> 
                    <tr>
                        <td class="nombre"><?php echo $mostrar['nombres'] ?></td>
                        <td class="apellido"><?php echo  $mostrar['apellidos']?></td>
                        <td class="hora"><?php echo  $mostrar['hora']?></td>
                    </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
                <table>
                    <thead>   
                        <tr class="centrado">
                            <th class="fecha">FECHA</th>
                            <th class="origen">ORIGEN</th>
                            <th class="destino">DESTINO</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $ape = $_POST['apellidoCli'];
                    $sql = "select * from cliente where apellidos LIKE '$ape';";
                    $result=mysqli_query($conexion,$sql);
                    while($mostrar = mysqli_fetch_array($result)){
                    ?> 
                    <tr>
                        <td class="fecha"><?php echo $mostrar['fecha'] ?></td>
                        <td class="origen"><?php echo  $mostrar['origen']?></td>
                        <td class="destino"><?php echo  $mostrar['destino'] ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
                <table>
                        <thead>   
                            <tr >
                                <th class="asientos">ASIENTO</th>
                                <th class="equipajes">EQUIPAJE</th>
                                <th class="peso_equipaje">PESO EQUIPAJE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $ape = $_POST['apellidoCli'];
                            $sql = "select * from cliente where apellidos LIKE '$ape';";
                            $result=mysqli_query($conexion,$sql);
                            while($mostrar = mysqli_fetch_array($result)){
                            ?> 
                            <tr>
                                <td class="asientos"><?php echo $mostrar['asiento'] ?></td>
                                <td class="equipajes"><?php echo  $mostrar['equipaje']?></td>
                                <td class="peso_equipaje"><?php echo  $mostrar['peso_equipaje'] ?></td>
                            </tr>
                            <?php
                            }
                            ?>
                       </tbody>
                </table>
                <br>
                <p class="centrado">¡LA PAZ - BOLIVIA!
                    <br>2021</p>
            </div>
        </body>
</html>
<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$filename = "reportes/ticket.pdf";
file_put_contents($filename, $pdf);
$dompdf->stream($filename);
$dompdf->setPaper('A4', 'landscape');
?>