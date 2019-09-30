// Cargar los datos de form dinamica

 // $('.tablaCronograma').DataTable( {
 //        "ajax": "ajax/datatable-cronograma.ajax.php", 
 //        "deferRender": true, 
 //  "retrieve": true,
 //  "processing": true,
 //   "language": {

 //      "sProcessing":     "Procesando...",
 //      "sLengthMenu":     "Mostrar _MENU_ registros",
 //      "sZeroRecords":    "No se encontraron resultados",
 //      "sEmptyTable":     "Ningún dato disponible en esta tabla",
 //      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
 //      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
 //      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
 //      "sInfoPostFix":    "",
 //      "sSearch":         "Buscar:",
 //      "sUrl":            "",
 //      "sInfoThousands":  ",",
 //      "sLoadingRecords": "Cargando...",
 //      "oPaginate": {
 //      "sFirst":    "Primero",
 //      "sLast":     "Último",
 //      "sNext":     "Siguiente",
 //      "sPrevious": "Anterior"
 //      },
 //      "oAria": {
 //        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
 //        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
 //      }

 //    }
 //    });


 $(".tablaCronograma").DataTable({



  "language": {

    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
    "sFirst":    "Primero",
    "sLast":     "Último",
    "sNext":     "Siguiente",

    "sPrevious": "Anterior"
    },
    "oAria": {
      "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }

  }

});


/*=============================================
ACTIVAR USUARIO
=============================================*/
$(document).on("click", ".btnActivarSimcard", function(){

  var idSimcard = $(this).attr("idSimcard");
  var estadoSimcard = $(this).attr("estadoSimcard");

 
  var datos = new FormData();
   datos.append("idSimcard", idSimcard);
   datos.append("estadoSimcard", estadoSimcard);

    $.ajax({

    url:"ajax/ventas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){

        if(window.matchMedia("(max-width:767px)").matches){
    
           swal({
            title: "la simcard ha sido activada ha sido actualizado",
            type: "success",
            confirmButtonText: "¡Cerrar!"
          }).then(function(result) {
            
              if (result.value) {

              window.location = "cronograma";

            }

          });


    }
      }

    })

    if(estadoSimcard == 'desactivado'){

      $(this).removeClass('btn-success');
      $(this).addClass('btn-danger');
      $(this).html('Desactivado');
      $(this).attr('estadoSimcard','activado');

    }else{

      $(this).addClass('btn-success');
      $(this).removeClass('btn-danger');
      $(this).html('Activado');
      $(this).attr('estadoSimcard','desactivado');
 
    }

})
 //Local storage de la fecha del servicio
 if (localStorage.getItem("capturarRango25") != null) {

  $("#reportrangeLLegada span").html(localStorage.getItem("capturarRango25")); 

}else{    
 
  $("#reportrangeLLegada span").html(' Fecha del servicio');
} 

$(function() {

    // var start = moment();
    // var end = moment();

    function cb(start, end) {
        $('#reportrangeLLegada span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

         var fechaInicial = start.format('YYYY-MM-DD');

         var fechaFinal = end.format('YYYY-MM-DD');

         var capturarRango25 = $("#reportrangeLLegada span").html();

         localStorage.setItem("capturarRango25", capturarRango25);

        window.location = "index.php?ruta=cronograma&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;
    }
    $('#reportrangeLLegada').daterangepicker({
      "locale": {
        "applyLabel": "Aplicar",
        "cancelLabel": "Cancelar",
        "fromLabel": "Desde",
        "toLabel": "a",
        "customRangeLabel": "Perzonalizado",
        "daysOfWeek": [
            "Do",
            "Lu",
            "Ma",
            "Mi",
            "Ju",
            "Vi",
            "Sa"
        ],
        "monthNames": [
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre"
        ],
        "firstDay": 1
    },
        startDate: moment().subtract(29, 'days'),
        endDate: moment(),
        ranges: {
           'Hoy': [moment(), moment()],
           'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Últimos 7 días': [moment().subtract(6, 'days'), moment()],
           'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
           'Este mes': [moment().startOf('month'), moment().endOf('month')],
           'Último mes': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

});


 /*=============================================
CANCELAR RANGO DE FECHAS
=============================================*/
$(".cancelarFechaCronograma").on("click", function(){

  localStorage.removeItem("capturarRango25");
  localStorage.clear();
  
})


 /*=============================================
AGREGAR LINEA DEL NUMERO EN EL EXTERIOR
=============================================*/

$(".tablaCronograma").on("click", ".btnAgregarLinea", function(){

  var idSimcard2 = $(this).attr("idSimcard2");

  // console.log("idSimcard2",idSimcard2);

   var datos = new FormData();
    datos.append("idSimcard2", idSimcard2); 

    $.ajax({

      url:"ajax/ventas.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

       $("#NuevaLineaId").val(respuesta["id"]); 
       $("#nuevoLinea").val(respuesta["lineaexterior"]);
 
    }

    })

 })



//ATRAPAR LA FECHA DE REGRESO



$(document).on("click", ".traerFecha", function(){

   var fechaTraida = $(this).val();
   var estadoTraido = $(this).attr("estadoDesactivado"); 

   // console.log(fechaTraida);
   // console.log(estadoTraido);

  var datos = new FormData();
  datos.append("fechaTraida", fechaTraida);
  datos.append("estadoTraido", estadoTraido);

   $.ajax({

    url:"ajax/ventas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){
    
           swal({
            title: "Se han desactivado las ventas del día de hoy",
            type: "success",
            confirmButtonText: "¡Cerrar!"
          }).then(function(result) {
            
              if (result.value) {

              window.location = "cronograma";

            }

          });


      }

    })



});



