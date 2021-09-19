// ESTE DOCUMENTO JQUEY CORRESPONDE A registroEstudiante.php
//SE INICIALIZA EL DOCUMENTO LLAMANDO A UNA FUNCION 
$(document).ready(inicializarEventos);
function inicializarEventos(){
  // btnRegistrarEst ES EL ID DE CONTROL QUE SE TIENE EN HTML Y LE ASIGNAMOS UNA FUNCION
    $("#enviarRegistroCli").click(function(){registrarCliente();});
    $("#btnModificarCli").click(function(){modificarCliente();});
    $("#btnEliminarCli").click(function(){eliminarCliente();});
    $("#apellidoCli").blur(function(){cargarDatos();});
    $("#numeroDoc").blur(function(){cargarDatos2();});
    $("#archivo").change(function(){imagenPrevia(this);});
    $("#btnNuevoCliente").click(function(){nuevoCliente();});
    $("#numeroDoc").Keypress(function(){return soloLetras(event);});
    
}

function cargarDatos(){
  var ape = $("#apellidoCli").val();
  var v_data="Accion="+1;
  v_data=v_data+"&ape="+ape;
  $.ajax({
      cache:false,
      url:"php/registroClienteL.php",
      type:"POST",
      dataType:"json",
      data:v_data,
      beforeSend:function(){
          $(".mensaje").html("Procesando...");
      },
      success:function(respuesta){
          $.each(respuesta,function(indice,valor){
              $(".mensaje").html("");
              if(valor.codigo=='No existe'){
                  alert("No existe el registro");
              }
              else{ 
                  $("#nombreCli").val(valor.nombres);
                  $("#apellidoCli").val(valor.apellidos);
                  $("#telefonoCli").val(valor.telefono);
                  $("#emailCli").val(valor.email);
              }
          });
      },
      error:function(){
          $(".mensaje").html("Error en el proceso...");
      },
  });

}

function cargarDatos2(){
  //alert("Cargando datos...");
  var numDoc=$("#numeroDoc").val();
  var v_data="Accion="+2;
  v_data=v_data+"&numDoc="+numDoc;
  $.ajax({
      cache:false,
      url:"php/registroClienteL.php",
      type:"POST",
      dataType:"json",
      data:v_data,
      beforeSend:function(){
          $(".mensaje").html("Procesando...");
      },
      success:function(respuesta){
          $.each(respuesta,function(indice,valor){
              // procesando respuesta que nos da el PHP
              $(".mensaje").html("");
              if(valor.codigo=='No existe'){
              //if(valor.numero_documento=='No existe'){ //////////
                  alert("No existe el registro");
              }
              else{
                  $("#numeroDoc").val(valor.numero_documento);
                  $("#tipoDoc").val(valor.tipo_documento);
                  $("#nombreCli").val(valor.nombres);
                  $("#apellidoCli").val(valor.apellidos);
                  $("#telefonoCli").val(valor.telefono);
                  $("#emailCli").val(valor.email);
                  $("#fechaNac").val(valor.fecha_nacimiento);
                  $("#nacionalidadCli").val(valor.nacionalidad);
                  $("#estadoCivil").val(valor.estado_civil);
                  $("#genero").val(valor.genero);
                  // Cargando fotografía la etiqueta img
                  $("#foto").prop("src",valor.foto);
                  // Modificando ancho de la etiqueta img
                  $("#foto").prop("width","318");
                  // Modificando alto de la etiqueta img
                  $("#foto").prop("height","180");
                  // Almacenando ruta original
                  $("#fotoOriginal").val(valor.foto);
                  // Almacenando ruta original en input tipo FILE
                  $("#archivo").val(valor.foto);
              }
          });
      },
      error:function(){
          $(".mensaje").html("Error en el proceso...");
      },
  });
}

function imagenPrevia(input){
  if(input.files && input.files[0]){
    var reader=new FileReader();
    reader.readAsDataURL(input.files[0]);
    reader.onload=function(e){
        $("#foto").prop("src",e.target.result);
        $("#foto").prop("width","318");
        $("#foto").prop("heigth","180");
    };
  }
}

function nuevoCliente(){
  limpiarCampos();
  $(".mensaje").html("");
}

function modificarCliente(){
      var nom = $("#nombreCli").val();
      var ape = $("#apellidoCli").val();
      var tel = $("#telefonoCli").val();
      var email = $("#emailCli").val();
      var tipDoc = $("#tipoDoc").val();
      var numDoc= $("#numeroDoc").val();
      var fecNac = $("#fechaNac").val();
      var nacCli = $("#nacionalidadCli").val();
      var estCiv = $("#estadoCivil").val();
      var gen = $("#genero").val();
      var files=$("#archivo")[0].files[0];
      var textoFile=$("#archivo").val();
      var fotoOriginal=$("#fotoOriginal").val();
      /* var v_data="Accion="+2;
      v_data=v_data+"&cod="+cod;
      v_data=v_data+"&nom="+nom;
      v_data=v_data+"&pat="+pat;
      v_data=v_data+"&mat="+mat;
      v_data=v_data+"&ci="+ci;
      v_data=v_data+"&ext="+extension; */
      var formData=new FormData();
      formData.append("Accion",4);
      formData.append("nom",nom);
      formData.append("ape",ape);
      formData.append("tel",tel);
      formData.append("email",email);
      formData.append("tipDoc",tipDoc);
      formData.append("numDoc",numDoc);
      formData.append("fecNac",fecNac);
      formData.append("nacCli",nacCli);
      formData.append("estCiv",estCiv);
      formData.append("gen",gen);
      formData.append("file",files);
      formData.append("textofile",textoFile);
      formData.append("fotoOriginal",fotoOriginal);

      $.ajax({
          cache:false,
          url:"php/registroClienteL.php",
          type:"POST",
          //dataType:"json",
          data:formData,
          contentType:false,
          processData:false,
          beforeSend:function(){
              $(".mensaje").html("Procesando...");
          },
          success:function(respuesta){
            alert("CLIENTE REGISTRADO !!");
            limpiarCampos();
        },
          error:function(){
              alert("Error en el registro"); // Si existe errores
          },
      });
  
}


function registrarCliente() {
  // ASIGNAMOS VALORES DE CONTROLES DE PHP (CON LAS ESTRUCTURAS HTML) A VARIABLES DE JS
if(validarCampos()){
  var nom = $("#nombreCli").val();
  var ape = $("#apellidoCli").val();
  var tel = $("#telefonoCli").val();
  var email = $("#emailCli").val();
  var tipDoc = $("#tipoDoc").val();
  var numDoc= $("#numeroDoc").val();
  var fecNac = $("#fechaNac").val();
  var nacCli = $("#nacionalidadCli").val();
  var estCiv = $("#estadoCivil").val();
  var gen = $("#genero").val();
  var files=$("#archivo")[0].files[0];
  

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
  formData.append("Accion",3);
  formData.append("nom",nom);
  formData.append("ape",ape);
  formData.append("tel",tel);
  formData.append("email",email);
  formData.append("tipDoc",tipDoc);
  formData.append("numDoc",numDoc);
  formData.append("fecNac",fecNac);
  formData.append("nacCli",nacCli);
  formData.append("estCiv",estCiv);
  formData.append("gen",gen);
  formData.append("file",files);




//PETICION AJAX, LOS PARAMETROS ENVIADOS A LA PETICION VAN SEPARADOS POR COMAS
  $.ajax({
    cache: false,//NO ALMACENA CACHE
    url: "php/registroClienteL.php", //archivo que recibe la peticion
    type: "POST", //método de envio
    //dataType: "json", //tipo de dato será formato json
    data:formData, //Enviando las variables hacia el php
    contentType: false,
    processData: false,

    beforeSend: function () {
      //SE ACTIVA AL ESTAR PROCESANDO LA PETICION
      $(".mensaje").html("Procesando..."); // Mientras se cargan los datos
    },
    success: function (respuesta) {
      //una vez que el archivo recibe el request lo procesa y lo devuelve
     // $.each(respuesta, function (indice, valor) {
    alert("REGISTRO EXITOSO !!");
      //$(".mensaje").html(respuesta);//----------ATENCIONNNNNNNNNNNNN
      limpiarCampos();
      //});
    },
    error: function () {
      alert("Error en el registro"); // Si existe errores
    },
  });
  }
}

function eliminarCliente(){
  var numDoc=$("#numeroDoc").val();
  var foto=$("#fotoOriginal").val();

  var v_data="Accion="+5;
  v_data=v_data+"&numDoc="+numDoc;
  v_data=v_data+"&foto="+foto;

  $.ajax({
      cache:false,
      url:"php/registroClienteL.php",
      type:"POST",
      dataType:"json",
      data:v_data,
      beforeSend:function(){
          $(".mensaje").html("Procesando...");
      },
      success:function(respuesta){
          $(".mensaje").html("Registro eliminado");
          limpiarCampos();
      },
      error:function(){
          $(".mensaje").html("Error en el proceso...");
      },
  });
}
 
 function limpiarCampos(){
    $("#numeroDoc").val("");
    $("#nombreCli").val("");
    $("#apellidoCli").val("");
    $("#telefonoCli").val("");
    $("#emailCli").val("");
    $("#tipoDoc").val("Pasaporte");
    $("#numeroDoc").val("");
    $("#fechaNac").val("");
    $("#nacionalidadCli").val("");
    $("#estadoCivil").val("Solter@");
    $("#genero").val("");
    $("#foto").prop("src","");
    $("#fotoOriginal").val("");
    $("#archivo").val("");
}

function validarCampos(){
  if($("#numeroDoc").val() == ""){
    $(".mensaje").html("NUMERO DE DOCUMENTO ES REQUERIDO");
    $("#numeroDoc").focus();
    return false;
  }

  if($("#nombreCli").val() == ""){
    $(".mensaje").html("NOMBRES ES REQUERIDO");
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
    $(".mensaje").html("CORREO ELECTRONICO ES REQUERIDO");
    $("#emailCli").focus();
    return false;
  }

  if($("#tipoDoc").val() == ""){
    $(".mensaje").html("TIPO DE DOCUMENTO ES REQUERIDO");
    $("#tipoDoc").focus();
    return false;
  }

  if($("#numeroDoc").val() == ""){
    $(".mensaje").html("NUMERO DE DOCUMENTO ES REQUERIDO");
    $("#numeroDoc").focus();
    return false;
  }

  if($("#fechaNac").val() == ""){
    $(".mensaje").html("FECHA DE NACIMIENTO ES REQUERIDO");
    $("#fechaNac").focus();
    return false;
  }
  
  if($("#nacionalidadCli").val() == ""){
    $(".mensaje").html("NACIONALIDAD ES REQUERIDO");
    $("#nacionalidadCli").focus();
    return false;
  }

  if($("#estadoCivil").val() == ""){
    $(".mensaje").html("ESTADO CIVIL ES REQUERIDO");
    $("#estadoCivil").focus();
    return false;
  }

  if($("#genero").val() == ""){
    $(".mensaje").html("GENERO ES REQUERIDO");
    $("#genero").focus();
    return false;
  }
        
  var foto = $("#archivo").val();
  if (foto == ""){
    $(".mensaje").html("FOTO ES REQUERIDO");
    return false;
  }

  return true;
}
        
        
function soloNumeros(evt){
  if(window.event){
    Keynum=evt.KeyCode;
  }else{
    Keynum=evt.wich;
  }
        
  if(Keynum>47 && Keynum<58){
    return true;
  }else{
    return false;
  }
}