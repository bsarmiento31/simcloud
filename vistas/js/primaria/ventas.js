// Cargar los datos de form dinamica

var FechaInicial = $("#FechaInicial").val(); 
var FechaFinal = $("#FechaFinal").val(); 

 $('.tablaVentas').DataTable( {
  "ajax": "ajax/datatable-ventas.ajax.php?FechaInicial="+FechaInicial+"&FechaFinal="+FechaFinal,
  "deferRender": true,
  "retrieve": true, 
  "processing": true,
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


 //Local storage de la fecha del servicio
 if (localStorage.getItem("capturarRango") != null) {

  $("#reportrange span").html(localStorage.getItem("capturarRango")); 

}else{    
 
  $("#reportrange span").html(' Fecha del servicio');
} 


 function recargarPlan2(){
 $.ajax({ 
    type: "POST",
    url:"ajax/ventas.ajax.php",
    data: "idPlan="+ $('.traerDestinos').val(), 
    success : function(respuesta){
 
      console.log(respuesta);

        if (respuesta == 0) 
        {
          $('#destinosCargados').html("<option value=''>No hay planes cargados</option>");
        }
        else
        {
          $('#destinosCargados').html(respuesta);
        }
    }
  }) 


 };

$(function() {

    // var start = moment();
    // var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

         var fechaInicial = start.format('YYYY-MM-DD');

         var fechaFinal = end.format('YYYY-MM-DD');

         // console.log(fechaInicial);
         // console.log(fechaFinal);

         var capturarRango = $("#reportrange span").html();

         localStorage.setItem("capturarRango", capturarRango);

        window.location = "index.php?ruta=ventas&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;
    }

    $('#reportrange').daterangepicker({

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
$(".cancelarFecha").on("click", function(){

  localStorage.removeItem("capturarRango");
  localStorage.clear();
  
})


// function recargarDestinoSimcard(){ 
//   $.ajax({ 
//     type: "POST",
//     url:"ajax/ventas.ajax.php",
//     data: "idSimcardsDestino="+ $('#nuevoCliente').attr("usuario"),  
//     success : function(respuesta){

//       console.log(respuesta);
 
//       if (respuesta == "") 
//       {
//          $('#nuevoSimcardsDestino').html("<option value=''>El usuario no tiene destino</option>");
//       }
//       else
//       {
//         $('#nuevoSimcardsDestino').html(respuesta);
//       }
      
//     }
//   })

// }; 


///De aca estoy trabajando datalist//

//REVISAR SI LA SIMCARD QUE VA A COLOCAR ESTA EN EL DATALIST

$(".mirarSimscards").change(function(){

  $(".mensaje").remove();  

  var simcard = $(this).val();

  var datos = new FormData();
  datos.append("validarSimcardRepetida", simcard);

   $.ajax({
      url:"ajax/ventas.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success:function(respuesta){

        console.log("respuesta",respuesta);
        
        if(!respuesta){

          $(".mirarSimscards").after('<div class="mensaje">Esta simcard no esta guardada en tu lista</div>');

          $(".mirarSimscards").val("");  
        }

      }

  })
})



  function recargarNumeroSimcards(){ 
  $.ajax({ 
    type: "POST",
    url:"ajax/ventas.ajax.php",
    data: "idSimcards="+ $('.traerSimcard').val(), 
    success : function(respuesta){ 
          console.log(respuesta);
      if (respuesta == "<datalist id='browsers' class='scrollable'></datalist>") 
      {   
          
         $('#nuevoSimcards').attr('readonly', true);
         // $('#nuevoSimcards').value("No tiene simcard asignada");
      }
      else
      {
        $('#nuevoSimcards').removeAttr("readonly");
        $('#nuevoSimcards').html(respuesta);
      }

      

      
    }
  })

}; 


//Recargar simcards para el usuario coordinador por medio del usuario agrego
  function recargarNumeroSimcardsCoordinador(){  
  $.ajax({ 
    type: "POST",
    url:"ajax/ventas.ajax.php",
    data: "idSimcardsCoordinador="+ $('.traerSimcard2').val(),  
    success : function(respuesta){ 
          console.log(respuesta);
      if (respuesta == "<datalist id='browsers' class='scrollable'></datalist>") 
      {   
         $('#nuevoSimcards2').attr('readonly', true); 
         // $('#nuevoSimcards').value("No tiene simcard asignada");
      }
      else
      {
        $('#nuevoSimcards2').removeAttr("readonly");
        $('#nuevoSimcards2').html(respuesta);
      }

      

      
    }
  })

}; 


//Recargar simcard para agencia o freelance
  function recargarNumeroSimcardsComercial(){
    var SimcardUsuario = $("#TraerSimcardUsuario").val();
    var SimcardNumero = $(".traerSimcardComercial").val(); 

    // console.log(SimcardUsuario);
    //   console.log(SimcardNumero);

    var datos = new FormData(); 
    datos.append("SimcardUsuario", SimcardUsuario);
    datos.append("SimcardNumero", SimcardNumero);
  $.ajax({ 
    type: "POST",
    url:"ajax/ventas.ajax.php",
    data: datos,
    cache: false,
      contentType: false,
      processData: false,
    success : function(respuesta){

      if (respuesta == "<datalist id='browsers' class='scrollable'></datalist>") 
      { 
          $('#nuevoSimcardsNuevo').attr('readonly', true);
         // $('#nuevoSimcardsNuevo').html("<option value=''>El destino no tiene simcard</option>");
      }
      else
      {
         $('#nuevoSimcardsNuevo').removeAttr("readonly");
         $('#nuevoSimcardsNuevo').html(respuesta);
        // $('#nuevoSimcardsNuevo').html(respuesta);
      }
      
    }
  })

}; 


//REVISAR SI LA SIMCARD YA ESTA VENDIDA

$(".mirarVendida").change(function(){

  $(".mensaje").remove();  

  var simcard = $(this).val();

  var datos = new FormData();
  datos.append("validarSimcardVendida", simcard);

   $.ajax({
      url:"ajax/ventas.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success:function(respuesta){

        console.log("respuesta",respuesta);
        
        if(respuesta){

          $(".mirarVendida").after('<div class="mensaje">Esta simcard ya esta vendida</div>');

          $(".mirarVendida").val("");  
        }

      }

  })
})


//Recargar simcard para comercial
  function recargarNumeroSimcardsComercialSolo(){
    var SimcardUsuarioComercial = $("#TraerSimcardUsuarioPadre").val();
    var SimcardNumeroComercial = $(".traerSimcardComercial").val(); 


    var datos = new FormData();
    datos.append("SimcardUsuarioComercial", SimcardUsuarioComercial);
    datos.append("SimcardNumeroComercial", SimcardNumeroComercial);
  $.ajax({ 
    type: "POST",
    url:"ajax/ventas.ajax.php",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success : function(respuesta){


      if (respuesta == "<datalist id='browsers' class='scrollable'></datalist>") 
      {
         $('#nuevoSimcardsNuevo').attr('readonly', true);
      }
      else
      {
        $('#nuevoSimcardsNuevo').removeAttr("readonly");
         $('#nuevoSimcardsNuevo').html(respuesta);
      }
      
    }
  })

}; 


function recargarPlan(){
 $.ajax({ 
    type: "POST",
    url:"ajax/ventas.ajax.php",
    data: "idPlan="+ $('.traerDestinos').val(), 
    success : function(respuesta){

        if (respuesta == 0) 
        {
          $('#destinosCargados').html("<option value=''>No hay planes cargados</option>");
        }
        else
        {
          $('#destinosCargados').html(respuesta);
        }
    }
  }) 


 };
 
  function recargarPlanUsuariosAgencia(){
 $.ajax({ 
    type: "POST",
    url:"ajax/ventas.ajax.php",
    data: "idPlanAgencia="+ $('.traerPlan').val(), 
    success : function(respuesta){

        if (respuesta == 0) 
        {
          $('#planeCargados2').html("<option value=''>No hay planes cargados</option>");
        }
        else
        {
          $('#planeCargados2').html(respuesta);
        }
    }
  }) 


 };





 function recargarPlanEditar(){
 $.ajax({
    type: "POST",
    url:"ajax/ventas.ajax.php",
    data: "idPlanEditar="+ $('.traerPlanEditar').val(),
    success : function(respuesta){

        if (respuesta == 0) 
        {
          $('#planesCargadosEditar').html("<option value=''>No hay planes cargados</option>");
        }
        else
        {
          $('#planesCargadosEditar').html(respuesta);
        }
    }
  })


 };

 /*=============================================
BOTON EDITAR VENTA
=============================================*/
$(".TablasVentasTodas").on("click", ".btnEditarVentas", function(){

  var idVenta = $(this).attr("idVenta");

  window.location = "index.php?ruta=editar-ventas&idVenta="+idVenta;


})


/*=============================================
ELIMINAR CLIENTE
=============================================*/
$(document).on("click", ".btnEliminarVentas", function(){

  var idVentaEliminar = $(this).attr("idVentaEliminar"); 
  var simcards = $(this).attr("simcards");

  swal({
    title: '¿Deseas Eliminar Esta venta?',
    text: "¡No podrás revertir esto!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: '¡Sí, Borrarlo!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=ventas&idVentaEliminar="+idVentaEliminar+"&simcards="+simcards;

    }

  })

})


/*=============================================
IMPRIMIR FACTURA
=============================================*/

$(".TablasVentasTodas").on("click", ".btnImprimirFactura", function(){

  var codigo = $(this).attr("codigo");

  window.open("extensiones/tcpdf/pdf/facturaVenta.php?codigo="+codigo, "_blank");

})