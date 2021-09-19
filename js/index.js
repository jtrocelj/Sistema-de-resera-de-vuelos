// SE INICALIZA EL DOCUMENTO LLAMANDO A UNA FUNCION
$(document).ready(inicializarEventos);

// ESTA FUNCION ASIGNA EVENTOS A CONTROLOS DEL ARCHIVO HTML
function inicializarEventos(){
  $("#registrarVue").click(function(){abrirFrmRegVue();});
  $("#checkin").click(function(){abrirFrmModCheck();});
  $("#cambiarVuelo").click(function(){abrirCam();});
  $("#cancelarVuelo").click(function(){abrirCancelarVuelo();});
  $("#registrarCli").click(function(){abrirFrmRegCli();});
  $("#asignacionCli").click(function(){abrirFrmAsiCli();});
  $("#reporteVuelo").click(function(){reportePasajero();});
  $("#reporteT").click(function(){reporteTicket();});
  $("#usuarios").click(function(){usuarios();});
  $("#salir").click(function(){salirSesion()});
}

function abrirFrmRegVue(){
  // EL CONTROL QUE ES DE CLASE MENSAJE DE EL HTML SE LIMPIA POR SI EXISTE ALGUN VALOR
  $(".mensaje").html("");
  // EL CONTROL DE CLASE CONTENIDO LO CARGAMOS LLAMANDO A UN ARCHIVO PHP QUE TIENE UN DISEÑO PARA EL USUARIO
  $(".contenido").load("php/registroVuelo.php");
  
}
function abrirFrmModCheck(){
  $(".mensaje").html("");
  $(".contenido").load("php/check-in.php");
  
}
function abrirCam(){
  $(".mensaje").html("");
  $(".contenido").load("php/cambiarVuelo.php");
  
}
function abrirCancelarVuelo(){
  $(".mensaje").html("");
  $(".contenido").load("php/cancelarVuelo.php");
  
}

function abrirFrmRegCli(){
  $(".mensaje").html("");
  $(".contenido").load("php/registroCliente.php");
}

function abrirFrmAsiCli(){
  $(".mensaje").html("");
  $(".contenido").load("php/asignacionCliente.php");
}

function reportePasajero(){
  $(".mensaje").html("");
  $(".contenido").load("php/reporte.php");
}
function reporteTicket(){
  $(".mensaje").html("");
  $(".contenido").load("php/reporte2.php");
}
function usuarios(){
  // EL CONTROL QUE ES DE CLASE MENSAJE DE EL HTML SE LIMPIA POR SI EXISTE ALGUN VALOR
  $(".mensaje").html("");
  // EL CONTROL DE CLASE CONTENIDO LO CARGAMOS LLAMANDO A UN ARCHIVO PHP QUE TIENE UN DISEÑO PARA EL USUARIO
  $(".contenido").load("php/usuario.php");
  
}

function salirSesion(){
  $(".mensaje").html("");
  var v_data="Accion="+1;
  $.ajax({
      cache:false,
      url:"php/indexL.php",
      type:"POST",
      dataType:"JSON",
      data:v_data,
      beforeSend:function(){
          $(".mensaje").html("Saliendo...");
      },
      success:function(respuesta){
          $.each(respuesta,function(indice,valor){
              window.location="index.php?log=false";
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