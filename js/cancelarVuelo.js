$(document).ready(inicializarEventos);
function inicializarEventos(){
    // btnRegistrarEst es el id del control que se tiene en HTML y le asignamos una función
    $("#btnEliminarVuelo").click(function(){eliminarVuelo();});
    $("#btnNuevoVuelo").click(function(){nuevoVuelo();});
    $("#apellidoCli").blur(function(){cargarDatos();});
   
}


function nuevoVuelo(){
    limpiarCampos();
    $(".mensaje").html("");
}

function eliminarVuelo(){
    var ape = $("#apellidoCli").val();

    var v_data="Accion="+3;
    v_data=v_data+"&ape="+ape;
    

    $.ajax({
        cache:false,
        url:"php/cancelarVueloL.php",
        type:"POST",
        dataType:"json",
        data:v_data,
        beforeSend:function(){
            $(".mensaje").html("Procesando...");
        },
        success:function(respuesta){
            alert("VUELO CANCELADO!!");
            limpiarCampos();
        },
        error:function(){
           alert("VUELO CANCELADO!!");
        },
    });
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
}