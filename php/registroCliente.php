<script src="js/jquery-3.5.1.js" type="text/javascript"></script>
    <!--AGREGAMOS EL SCRIPT CON EL QUE VA A TRABAJAR ESTE ARCHIVO PHP--->
    <script src="js/registroCliente.js" type="text/javascript"></script>

<div class="wrapper2"><br>
    
    <form action="" method="post">
        <fieldset>
            <legend>Registro Cliente</legend>
            <div>
                <input type="text" id="numeroDoc" placeholder="Número de Documento" required/>
            </div>
            <div>
            <th>Tipo de Documento</th>
                <select  id="tipoDoc">
                    <option value="Cedula de Identidad">CI</option>
                    <option value="Pasaporte">Pasaporte</option>
                </select>
            </div><br>
            <div>
                <input type="text" id="apellidoCli"name="last_name" placeholder="Apellido(s)" required/>
            </div>
            <div>
                <input type="text" id="nombreCli"name="first_name" placeholder="Nombre(s)" required/>
            </div>
            <div>
                <input type="text" id="telefonoCli" name="first_name" placeholder="Telefono" required/>
            </div>
            <div>
                <input type="text" id="emailCli" name="email" placeholder="Email" required/>
            </div>
            <div>
            <th>Fecha de Nacimiento</th>
                <input type="date" id="fechaNac" required/>
            </div>
            <div>
                <input type="text" id="nacionalidadCli" placeholder="Nacionalidad" required/>
            </div>
            <div>
            <th>Estado Civil</th>
                <select  id="estadoCivil" required>
                    <option value="Casad@">Casad@</option>
                    <option value="Solter@">Solter@</option>
                    <option value="Divorciad@">Divorciad@</option>
                    <option value="Viud@">Viud@</option>
                </select>
            </div><br>
            <div>
            <th>Genero</th>
                <select  id="genero" required>
                    <option value="masculino">masculino</option>
                    <option value="femenino">femenino</option>
                </select>
            </div><br>
            
            <input type="submit" id="enviarRegistroCli" name="submit" value="Registrar"/>
            <input type="submit" id="btnModificarCli" name="submit" value="Modificar"/>
            <input type="submit" id= "btnEliminarCli" name="submit" value="Eliminar"/>
            <button type="button" id="btnNuevoCliente" >Nuevo</button>
        </fieldset>
            
    </form>
      
</div>

<div class="wrapper1"><br>
    
    <form action="" method="post">
        <fieldset>
            <legend>Imagen de Documento</legend>
            <div>
                <img id="foto" width="318" height="180" alt="" style="border-style: solid;">   
            </div>
            <div>
                <th><input type="file" id="archivo" accept="image/jpeg"></th>
            </div>
        </fieldset>    
    </form>
  
</div>

<input type="texto" id="fotoOriginal1" style="display:none">
<input type="texto" id="fotoOriginal" style="display:none">

