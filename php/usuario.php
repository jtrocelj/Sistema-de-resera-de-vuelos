<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="js/jquery-3.6.0.js" type="text/javascript"></script>
    <!--AGREGAMOS EL SCRIPT CON EL QUE VA A TRABAJAR ESTE ARCHIVO PHP--->
    <script src="js/usuario.js" type="text/javascript"></script>
</head>
<body>
<div id="wrapper">
<form action="" method="post">
            <fieldset>
                <legend>Registro de Usuarioss</legend>

                <div>
                     <input type="text" id="nomUsuario" placeholder="Nombre(s)">
                </div>
                 <div>
                 <input type="text" id="patUsuario" placeholder="Apellido Paterno">
                </div>
            
                <div>
                 <input type="text" id="matUsuario" placeholder="Apellido Materno">
                </div>
                <div>
                    <input type="text" id="ciUsuario" placeholder="CI">
                </div>
                <button type="button" class="btn btn-primary" id="btnCrearUsuario">CREAR</button>
            </fieldset>    
        </form>
      
</div>
</body>
</html>

