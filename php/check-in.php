<script type="text/javascript" src="js/check-in.js"></script>
<div id="wrapper"><br>
    
        <form action="" method="post">
            <fieldset>
                <legend>Check-in Online</legend>

                <div>
                    <input type="text" id="apellidoCli"name="last_name" placeholder="Apellido(s)"/>
                    <span class="info">Ingresa el apellido tal como aparece en la reserva</span>
            </div>
            <div>
                    <input type="text" id="nombreCli"name="first_name" placeholder="Nombre(s)"/>
                </div>
            
                <div>
                    <input type="text" id="telefonoCli" name="first_name" placeholder="Telefono"/>
                </div>
                <div>
                    <input type="text" id="emailCli" name="email" placeholder="Email"/>
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
                    <input type="date" id="fecha" name="email" />
              
                <th>Hora</th>
                    <input type="time" id="hora" name="email" required/>
                </div><br>
                <div>
                    <input type="text" id="asiento" name="email" placeholder="Numero de asiento" required/>
                </div>
                <div>
                    <input type="text" id="equipaje" name="first_name" placeholder="Equipaje" required/>
                </div>
                <div>
                    <input type="text" id="peso" name="first_name" placeholder="Peso Equipaje" required/>
                </div>
                <input type="submit" name="submit" id= "enviarCheckin" value="Enviar"/>
                <button type="button" id="btnNuevoCheck">Nuevo</button>
            </fieldset>    
        </form>
      
    </div>
    
    <script>
    $(document).ready(function() {
    $("#basic-form").validate();
    });
 </script>
