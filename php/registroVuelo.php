<script src="js/jquery-3.6.0.js" type="text/javascript"></script>
    <!--AGREGAMOS EL SCRIPT CON EL QUE VA A TRABAJAR ESTE ARCHIVO PHP--->
    <script src="js/registroVuelo.js" type="text/javascript"></script>
<div id="wrapper"><br>
    
        <form id="basic-form" action="" method="post">
            <fieldset>
                <legend>Reservar Vuelo</legend>
                <div>
                    <input type="text" id="nombreCli"name="name" placeholder="Nombre(s)" required/>
                    
                </div>
                <div>
                    <input type="text" id="apellidoCli"name="last_name" placeholder="Apellido(s)" required/>
                </div>
                <div>
                    <input type="text" id="telefonoCli" name="first_name" placeholder="Telefono" required/>
                </div>
                <div>
                    <input type="text" id="emailCli" name="email" placeholder="Email" required/>
                </div>

                <div>
                 <?php
                 include "conexion.php";
                 $conn=conexion();
                 $sql=mysqli_query($conn,"select origen from ciudades");
                 ?>
                  <th>Origen: </th>
                 <select name="origen" id="origen">
                        <?php
                            while($datos = mysqli_fetch_array($sql)){
                        ?>
                    <option value="<?php echo $datos['origen']?>"><?php echo $datos['origen']?></option>
                    <?php
                            }
                    ?>
                 </select>
                
                 <?php
                
                 $sql=mysqli_query($conn,"select destino from ciudades");
                 ?>
                  <th>Destino: </th>
                 <select name="destino" id="destino">
                        <?php
                            while($datos = mysqli_fetch_array($sql)){
                        ?>
                    <option value="<?php echo $datos['destino']?>"><?php echo $datos['destino']?></option>
                    <?php
                            }
                    ?>
                 </select>
                </div><br>

                <div>
                <th>Fecha</th>
                    <input type="date" id="fecha" required/>
                </div>
                <input type="submit" id="enviarRegisVuelo" name="submit" value="Enviar"/>
                <button type="button" id="btnNuevoVuelo" >Nuevo</button>
            </fieldset>    
        </form>
      
    </div>
 <script>
    $(document).ready(function() {
    $("#basic-form").validate();
    });
 </script>
