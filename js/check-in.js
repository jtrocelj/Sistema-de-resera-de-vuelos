$(document).ready(inicializarEventos);
function inicializarEventos(){
    // btnRegistrarEst es el id del control que se tiene en HTML y le asignamos una función
    $("#enviarCheckin").click(function(){modificarCheckin();});
    $("#btnNuevoCheck").click(function(){nuevoCheckin();});
    $("#apellidoCli").blur(function(){cargarDatos();});
    $("#rTicket").click(function(){reporteTicket();});
    $("#apellidoCli").Keypress(function(){return soloLetras(event);});
}

function cargarDatos(){
        var ape = $("#apellidoCli").val();
        var v_data="Accion="+1;
        v_data=v_data+"&ape="+ape;
        $.ajax({
            cache:false,
            url:"php/check-inL.php",
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
                        alert("No existe el registro");
                    }
                    else{ 
                        $("#nombreCli").val(valor.nombres);
                        $("#apellidoCli").val(valor.apellidos);
                        $("#telefonoCli").val(valor.telefono);
                        $("#emailCli").val(valor.email);
                        $("#origen").val(valor.origen);
                        $("#destino").val(valor.destino);
                        $("#fecha").val(valor.fecha);
                        $("#equipaje").val(valor.equipaje);
                        $("#peso").val(valor.peso_equipaje);
                        $("#hora").val(valor.hora);
                        $("#asiento").val(valor.asiento);
                    }
                });
            },
            error:function(){
                $(".mensaje").html("Error en el proceso...");
            },
        });
    
}

function nuevoCheckin(){
    limpiarCampos();
    $(".mensaje").html("");
}

function modificarCheckin(){
    if(validarCampos()){
        var ape = $("#apellidoCli").val();
        var equipaje = $("#equipaje").val();
        var peso = $("#peso").val();
        var hora = $("#hora").val();
        var asiento = $("#asiento").val();
        /* var v_data="Accion="+2;
        v_data=v_data+"&cod="+cod;
        v_data=v_data+"&nom="+nom;
        v_data=v_data+"&pat="+pat;
        v_data=v_data+"&mat="+mat;
        v_data=v_data+"&ci="+ci;
        v_data=v_data+"&ext="+extension; */
        var formData=new FormData();
        formData.append("Accion",2);
        formData.append("ape",ape);
        formData.append("equipaje",equipaje);
        formData.append("peso",peso);
        formData.append("hora",hora);
        formData.append("asiento",asiento);
        $.ajax({
            cache:false,
            url:"php/check-inL.php",
            type:"POST",
            //dataType:"json",
            data:formData,
            contentType:false,
            processData:false,
            beforeSend:function(){
                $(".mensaje").html("Procesando...");
            },
            success:function(respuesta){
            alert("CHECK-IN REGISTRADO !!");
                limpiarCampos();
            },
            error:function(){
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
    $("#hora").val("");       
    $("#asiento").val("");                               
}

function validarCampos(){
    if($("#hora").val() == ""){
      $(".mensaje").html("HORA ES REQUERIDO");
      $("#hora").focus();
      return false;
    }
  
    if($("#asiento").val() == ""){
      $(".mensaje").html("ASIENTO ES REQUERIDO");
      $("#asiento").focus();
      return false;
    }
  
    if($("#equipaje").val() == ""){
      $(".mensaje").html("EQUIPAJE ES REQUERIDO");
      $("#equipaje").focus();
      return false;
    }
  
    if($("#peso").val() == ""){
      $(".mensaje").html("PESO DEL EQUIPAJE ES REQUERIDO");
      $("#peso").focus();
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

function reporteTicket(){
    $(".mensaje").html("");
    $(".contenido").load("reporteTicket.php");
  }
  
  