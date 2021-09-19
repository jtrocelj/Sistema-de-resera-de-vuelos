<?php
    $conexion=mysqli_connect('localhost','root','','bdd_aeropuerto')
?>
<style>
    body {
    font-family: "Helvetica Neue", Helvetica, Arial;
    font-size: 14px;
    font-weight: 400;
    }
    @media screen and (max-width: 580px) {
    body {
        font-size: 16px;
        line-height: 22px;
    }
    }

    .wrapper {
    margin: 0 auto;
    padding: 40px;
    max-width: 800px;
    }

    .table {
    margin: 0 0 40px 0;
    width: 100%;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
    display: table;
    }
    @media screen and (max-width: 580px) {
    .table {
        display: block;
    }
    }

    .row {
    display: table-row;
    background: #f6f6f6;
    }
    .row:nth-of-type(odd) {
    background: #e9e9e9;
    }
    .row.header {
    font-weight: 900;
    color: #ffffff;
    background: #ea6153;
    }
    .row.green {
    background: #27ae60;
    }
    .row.blue {
    background: #2980b9;
    }
    @media screen and (max-width: 580px) {
    .row {
        padding: 14px 0 7px;
        display: block;
    }
    .row.header {
        padding: 0;
        height: 6px;
    }
    .row.header .cell {
        display: none;
    }
    .row .cell {
        margin-bottom: 10px;
    }
    .row .cell:before {
        margin-bottom: 3px;
        content: attr(data-title);
        min-width: 98px;
        font-size: 10px;
        line-height: 10px;
        font-weight: bold;
        text-transform: uppercase;
        color: #969696;
        display: block;
    }
    }

    .cell {
    padding: 6px 12px;
    display: table-cell;
    }
    @media screen and (max-width: 580px) {
    .cell {
        padding: 2px 16px;
        display: block;
    }
    }
    @import url("//fonts.googleapis.com/css?family=Roboto:500");
        @import url("//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css");
        

        .face-button {
        height: 24px;
        display: inline-block;
        border: 3px solid #e43;
        font-family: "Roboto", sans-serif;
        font-size: 20px;
        font-weight: 10;
        text-align: center;
        text-decoration: none;
        color: #e43;
        overflow: hidden;
        }
        .face-button .icon {
        margin-right: 6px;
        }
        .face-button .face-primary,
        .face-button .face-secondary {
        display: block;
        padding: 0 10px;
        line-height: 28px;
        transition: margin 0.4s;
        }
        .face-button .face-primary {
        background-color: #e43;
        color: #fff;
        }
        .face-button:hover .face-primary {
        margin-top: -28px;
        }
</style>
<a class="face-button" href="reporteprofesionales.php" style="margin-left: 300px; margin-top: -200px; ">

<div class="face-primary">
  <span class="icon fa fa-cloud"></span>
  Descargar PDF
</div>

<div class="face-secondary">
  <span class="icon fa fa-hdd-o"></span>
  Descargando...
</div>

</a>

<body>
    <div class="wrapper" >
        <div class="table" style=" margin-left: -50px;">
            
            <div class="row header green">
                <div class="cell">
                    Apellidos
                </div>
                <div class="cell">
                    Nombres
                </div>
                <div class="cell">
                    Telefono
                </div>
                <div class="cell">
                Email
                </div>
                <div class="cell">
                Origen
                </div>
                <div class="cell">
                Destino
                </div>
                <div class="cell">
                Fecha
                </div>
                <div class="cell">
                Hora
                </div>
                <div class="cell">
                Asiento 
                </div>
                <div class="cell">
                 Equipaje  
                </div>
                <div class="cell">
                  Peso Equipaje 
                </div>
            </div>
            <?php
            $sql = "select * from cliente";
            $result=mysqli_query($conexion,$sql);
            while($mostrar = mysqli_fetch_array($result)){
            ?> 
            <div class="row">
                <div class="cell" data-title="Apellidos">
                <?php echo $mostrar['apellidos'] ?>
                </div>
                <div class="cell" data-title="Nombres">
                <?php echo $mostrar['nombres'] ?>
                </div>
                <div class="cell" data-title="Telefono">
                <?php echo $mostrar['telefono'] ?>
                </div>
                <div class="cell" data-title="Email">
                <?php echo $mostrar['email'] ?>
                </div>
                <div class="cell" data-title="Origen">
                <?php echo $mostrar['origen'] ?>
                </div>
                <div class="cell" data-title="Destino">
                <?php echo $mostrar['destino'] ?>
               </div>
               <div class="cell" data-title="Fecha">
               <?php echo $mostrar['fecha'] ?>
               </div>
               <div class="cell" data-title="Hora">
               <?php echo $mostrar['hora'] ?>
               </div>
               <div class="cell" data-title="Asiento">
               <?php echo $mostrar['asiento'] ?>
               </div>
               <div class="cell" data-title="Equipaje">
               <?php echo $mostrar['equipaje'] ?>
               </div>
               <div class="cell" data-title="Peso Equipaje">
               <?php echo $mostrar['peso_equipaje'] ?>
               </div> 
             </div>
             <?php
            }
            ?>
        </div>
    </div>
<body>    



