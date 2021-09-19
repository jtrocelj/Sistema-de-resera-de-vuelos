<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aeropuerto</title>
    <link rel="stylesheet" href="css/estilos.css">
    
    <script src="js/jquery-3.6.0.js" type="text/javascript"></script>
    <script src="js/index.js" type="text/javascript"></script>
  <style>
    * {
  margin: 0px;
  padding: 0px;
}

#sidebar {
  position: fixed;
  width: 200px;
  height: 100%;
  background: #151719;
  left: -200px;
  transition: all 500ms linear;
}

#sidebar.active {
  left: 0px;
}

#sidebar ul li {
  color: rgba(230, 230, 230, .9);
  list-style: none;
  padding: 15px 10px;
  border-bottom: 1px solid rgba(100, 100, 100, .3);
  text-align: center;
}

.logo {
  border-radius: 50%;
  display: block;
  margin: 0 auto; 
}

#sidebar .toggle-btn {
  position: absolute;
  left: 230px;
  top: 20px;
  cursor: pointer;
}

#sidebar .toggle-btn span {
  display: block;
  width: 40px;
  text-align: center;
  font-size: 30px;
  border: 3px solid #000;
}

  </style>  
</head>
<body>
 <!-- / My brand -->
<div class='brand'>
  </a>
</div>
<?php
     session_start();
     if(isset($_GET['log']) && isset($_SESSION['usr'])){
    ?>
    <div id="sidebar">
      <div class="toggle-btn">
          <span>&#9776</span>
        </div>
        
        <div class='swanky_wrapper'>
          <input id='Dashboard' name='radio' type='radio'>
          <label for='Dashboard'>
            <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/dash.png'>
            <span>Vuelo</span>
            <div class='lil_arrow'></div>
            <div class='bar'></div>
            <div class='swanky_wrapper__content'>
              <ul>
                <li id="registrarVue">Reservar vuelo</li>
                <li id="checkin">Check-in online</li>
                <li id="cambiarVuelo">Cambiar vuelo</li>
                <li id="cancelarVuelo">Cancelar vuelo</li>
              </ul>
            </div>
          </label>
          <input id='Sales' name='radio' type='radio'>
          <label for='Sales'>
            <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/set.png'>
            <span>Gestionar Cliente</span>
            <div class='lil_arrow'></div>
            <div class='bar'></div>
            <div class='swanky_wrapper__content'>
              <ul>
                <li id="registrarCli">Datos y Registro del Cliente</li>
                <!--<li id="asignacionCli">Asignación Preferencial</li>-->
              </ul>
            </div>
          </label>
          <input id='Users' name='radio' type='radio'>
          <label for='Users'>
            <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/users.png'>
            <span>Reportes</span>
            <div class='lil_arrow'></div>
            <div class='bar'></div>
            <div class='swanky_wrapper__content'>
              <ul>
              <li id="reporteVuelo">Reporte Pasajero</li>
              <li id="reporteT">Reporte Ticket</li>
              </ul>
            </div>
          </label>
          
          <input id='Settings' radio='radio' type='radio'>
          <label for='Settings'>
            <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/set.png'>
            <span>Login</span>
            <div class='lil_arrow'></div>
            <div class='swanky_wrapper__content'>
              <ul>
              <li ><a id="usuarios">Usuarios</a></li>
              <li ><a id="salir" >Salir</a></li>
              </ul>
            </div>
          </label>
        </div>
            
            </ul>
      </div>
      
  <?php
    }
    ?>  
<main>
   <div class="contenido"></div>
        <!---Dentro del div mensaje se coloca mensajes al usuario como(PROCESADO,FINALLIZADO
            ERROR, ETC)-->
    <div align="center" class="mensaje"></div>
</main>

<script src="main.js"></script>
</body>
</html> 

