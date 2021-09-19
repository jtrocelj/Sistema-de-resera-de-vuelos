$(document).ready(inicializarEventos);
function inicializarEventos(){
  // btnRegistrarEst ES EL ID DE CONTROL QUE SE TIENE EN HTML Y LE ASIGNAMOS UNA FUNCION
    $("#btnCrearUsuario").click(function(){crearUsuario();});
}
function crearUsuario() {
    if(validarCampos()){
      // ASIGNAMOS VALORES DE CONTROLES DE PHP (CON LAS ESTRUCTURAS HTML) A VARIABLES DE JS
      var nombre = $("#nomUsuario").val();
      var paterno = $("#patUsuario").val();
      var materno = $("#matUsuario").val();
      var ci = $("#ciUsuario").val();
     
      var v_data = "Accion=" + 1;
      v_data = v_data+"&nombre=" + nombre;
      v_data = v_data+"&paterno=" + paterno;
      v_data = v_data+"&materno=" + materno;
      v_data = v_data+ "&ci=" + ci;
     
    //PETICION AJAX, LOS PARAMETROS ENVIADOS A LA PETICION VAN SEPARADOS POR COMAS
      $.ajax({
        cache: false,//NO ALMACENA CACHE
        url: "php/usuarioL.php", //archivo que recibe la peticion
        type: "POST", //método de envio
        dataType: "json", //tipo de dato será formato json
        data:v_data, //Enviando las variables hacia el php
  
        beforeSend: function () {
          //SE ACTIVA AL ESTAR PROCESANDO LA PETICION
          $(".mensaje").val("Procesando..."); // Mientras se cargan los datos
        },
        success: function (respuesta) {
          //una vez que el archivo recibe el request lo procesa y lo devuelve
        $.each(respuesta, function (indice, valor) {
            $(".mensaje").html(valor.resp);
            limpiar()
          });
        },
        error: function (respuesta) {
            var r = "";
            $.each(respuesta, function (indice, valor) {
                r += valor + "--";
              });
              $(".mensaje").html(r);
         
        },
      });
    } 
}

function validarCampos(){
    if($("#nomUsuario").val() == ""){
      $(".mensaje").html("NOMBRE ES REQUERIDO");
      $("#nomUsuario").focus();
      return false;
    }
  
    if($("#patUsuario").val() == ""){
      $(".mensaje").html("APELLIDO PATERNO ES REQUERIDO");
      $("#patUsuario").focus();
      return false;
    }
  
    if($("#matUsuario").val() == ""){
      $(".mensaje").html("APELLIDO MATERNO ES REQUERIDO");
      $("#matUsuario").focus();
      return false;
    }
  
    if($("#ciUsuario").val() == ""){
      $(".mensaje").html("CI ES REQUERIDO");
      $("#ciUsuario").focus();
      return false;
    }
    return true;
  }
  
  function limpiar(){
    $("#nomUsuario").val("");
    $("#patUsuario").val("");
    $("#matUsuario").val("");
    $("#ciUsuario").val("");
  }