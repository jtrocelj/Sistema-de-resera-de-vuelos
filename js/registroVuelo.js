// ESTE DOCUMENTO JQUEY CORRESPONDE A registroEstudiante.php
//SE INICIALIZA EL DOCUMENTO LLAMANDO A UNA FUNCION 
$(document).ready(inicializarEventos);
function inicializarEventos(){
  // btnRegistrarEst ES EL ID DE CONTROL QUE SE TIENE EN HTML Y LE ASIGNAMOS UNA FUNCION
    $("#enviarRegisVuelo").click(function(){registrarCliente();});
    $("#btnNuevoVuelo").click(function(){limpiarCampos();});
    $("#apellidoCli").Keypress(function(){return soloLetras(event);});
}
function registrarCliente() {
  if(validarCampos()){
    // ASIGNAMOS VALORES DE CONTROLES DE PHP (CON LAS ESTRUCTURAS HTML) A VARIABLES DE JS
    var nom = $("#nombreCli").val();
    var ape = $("#apellidoCli").val();
    var tel = $("#telefonoCli").val();
    var email = $("#emailCli").val();
    var or = $("#origen").val();
    var des= $("#destino").val();
    var fecha = $("#fecha").val();

    //ASIGNAMOS $CADENA $DE VALORES PARA EL PHP QUE CONTIENE LA LOGICA,CADA VARIABLE VA SEPARADA CON EL SIMBOLO &
    /*
    var v_data = "Accion=" + 1;
    v_data = v_data+"&nom=" + nom;
    v_data = v_data+"&pat=" + pat;
    v_data = v_data+"&mat=" + mat;
    v_data = v_data+ "&ci=" + ci;
    v_data = v_data+"&ext=" + ext;*/

    // FORMDATA NOS PERMITE TRABAJAR CON ARCHIVOS/IMAGENES
    var formData = new FormData();
    formData.append("Accion",1);
    formData.append("nom",nom);
    formData.append("ape",ape);
    formData.append("tel",tel);
    formData.append("email",email);
    formData.append("or",or);
    formData.append("des",des);
    formData.append("fecha",fecha);




  //PETICION AJAX, LOS PARAMETROS ENVIADOS A LA PETICION VAN SEPARADOS POR COMAS
    $.ajax({
      cache: false,//NO ALMACENA CACHE
      url: "php/registroVueloL.php", //archivo que recibe la peticion
      type: "POST", //método de envio
      //dataType: "json", //tipo de dato será formato json
      data:formData, //Enviando las variables hacia el php
      contentType: false,
      processData: false,

      beforeSend: function () {
        //SE ACTIVA AL ESTAR PROCESANDO LA PETICION
        $(".mensaje").val("Procesando..."); // Mientras se cargan los datos
      },
      success: function (respuesta) {
        //una vez que el archivo recibe el request lo procesa y lo devuelve
      // $.each(respuesta, function (indice, valor) {
      alert("RESERVA EXITOSA !!");
        limpiarCampos();
        //});
      },
      error: function () {
        alert("Error en el registro"); // Si existe errores
      },
    });
  }
}

 

 function limpiarCampos(){
    $("#nombreCli").val("");
    $("#nombreCli").val("");
    $("#apellidoCli").val("");
    $("#telefonoCli").val("");
    $("#emailCli").val("");
    $("#origen").val("La Paz");
    $("#destino").val("La Paz");
    $("#fecha").val("");
    $("#equipaje").val("");
    $("#peso").val(""); 
}
function validarCampos(){
  if($("#nombreCli").val() == ""){
    $(".mensaje").html("NOMBRE ES REQUERIDO");
    $("#nombreCli").focus();
    return false;
  }

  if($("#apellidoCli").val() == ""){
    $(".mensaje").html("APELLIDOS ES REQUERIDO");
    $("#apellidoCli").focus();
    return false;
  }

  if($("#telefonoCli").val() == ""){
    $(".mensaje").html("TELEFONO ES REQUERIDO");
    $("#telefonoCli").focus();
    return false;
  }

  if($("#emailCli").val() == ""){
    $(".mensaje").html("EMAIL ES REQUERIDO");
    $("#emailCli").focus();
    return false;
  }

  if($("#fecha").val() == ""){
    $(".mensaje").html("FECHA ES REQUERIDO");
    $("#fecha").focus();
    return false;
  }

  
  return true;
}



function soloLetras(evt){
  if(window.event){
    Keynum=evt.KeyCode;
  }else{
    Keynum=evt.wich;
  }

  if(Keynum>64 && Keynum<91){
    return true;
  }else{
    return false;
  }
}