 //Local storage de la fecha del servicio
 if (localStorage.getItem("capturarRango1") != null) {

  $("#reportrange1 span").html(localStorage.getItem("capturarRango1")); 

}else{       
 
  $("#reportrange1 span").html(' Fecha del servicio');
}  

$( document ).ready(function() {


    // var start = moment();
    // var end = moment();

    function cb(start, end) {
        $('#reportrange1 span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

         var fechaInicial = start.format('YYYY-MM-DD');

         var fechaFinal = end.format('YYYY-MM-DD');
 
         // console.log(fechaInicial);
         // console.log(fechaFinal);

         var capturarRango1 = $("#reportrange1 span").html();

         localStorage.setItem("capturarRango1", capturarRango1);

        window.location = "index.php?ruta=reportes-ventas&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;
    }

    $('#reportrange1').daterangepicker({
        
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
$(".cancelarFecha2").on("click", function(){

  localStorage.removeItem("capturarRango1");
  localStorage.clear();
  
})

//Realizar Grafica planes


$(document).ready(function() {

  var perfilOculto = $("#perfilOculto").val(); 
  
    $.ajax({

        url: "ajax/datos.ajax.php?perfilOculto="+perfilOculto,
        dataType: 'json',
        contentType: "application/json; charset=utf-8",
        method: "GET",

        success: function(data) {
          // console.log(data);
          var nombre = [];
          var stock = [];
          var color = ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)'];
          var bordercolor = ['rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)'];
          // console.log(data);

          for (var i in data) {
                nombre.push(data[i].destino);
                stock.push(data[i].cantidad);
            }

            var chartdata = {
                labels: nombre,
                datasets: [{
                    label: nombre,
                    backgroundColor: color,
                    borderColor: color,
                    borderWidth: 2,
                    hoverBackgroundColor: color,
                    hoverBorderColor: bordercolor,
                    data: stock
                }]
            };
 
            var mostrar = $("#myChart");

            var grafico = new Chart(mostrar, {
              type: 'doughnut',
                data: chartdata,
                options: {
                    responsive: true,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }

            });


        },

        error: function(data) {
            console.log(data);
        }

    });
});



//Realizar Grafica para coordinador


$(document).ready(function() {

  var perfilOculto = $("#perfilOculto").val(); 
  
    $.ajax({

        url: "ajax/datos-coordinador.ajax.php?perfilOculto="+perfilOculto,
        dataType: 'json',
        contentType: "application/json; charset=utf-8",
        method: "GET",

        success: function(data) {
          // console.log(data);
          var nombre = [];
          var stock = [];
          var color = ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)'];
          var bordercolor = ['rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)'];
          // console.log(data);

          for (var i in data) {
                nombre.push(data[i].destino);
                stock.push(data[i].cantidad);
            }

            var chartdata = {
                labels: nombre,
                datasets: [{
                    label: nombre,
                    backgroundColor: color,
                    borderColor: color,
                    borderWidth: 2,
                    hoverBackgroundColor: color,
                    hoverBorderColor: bordercolor,
                    data: stock
                }]
            };
 
            var mostrar = $("#myChartCoordinador");

            var grafico = new Chart(mostrar, {
              type: 'doughnut',
                data: chartdata,
                options: {
                    responsive: true,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }

            });


        },

        error: function(data) {
            console.log(data);
        }

    });
});




//Realizar Grafica simcards


$(document).ready(function() {
  
    $.ajax({ 

        url: "ajax/datos-simcards.ajax.php",
        dataType: 'json',
        contentType: "application/json; charset=utf-8",
        method: "GET",

        success: function(data) {

          var nombre = [];
          var stock = [];
          var nombretitulo = ['simcards'];
          var color = ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)'];
          var bordercolor = ['rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)'];
          // console.log(data);

          for (var i in data) {
                nombre.push(data[i].estado);
                stock.push(data[i].cantidad);
            }

            var chartdata = {
                labels: nombre,
                datasets: [{
                    label: nombretitulo,
                    backgroundColor: color,
                    borderColor: color,
                    borderWidth: 2,
                    hoverBackgroundColor: color,
                    hoverBorderColor: bordercolor,
                    data: stock
                }]
            };

            var mostrar = $("#barChart12");

            var grafico = new Chart(mostrar, {
              type: 'bar',
                data: chartdata,
                options: {
                    responsive: true,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }

            });


        },

        error: function(data) {
            console.log(data);
        }

    });
});
  



$(document).on('change', '#clientesValor', function(event) {

     var idcliente = $("#clientesValor option:selected").val();
     var nombreCliente = $("#clientesValor option:selected").text();

 
     window.location = "index.php?ruta=reportes-ventas&idcliente="+idcliente+"&nombreCliente="+nombreCliente;
});


$(document).on('change', '#clientesValorInventario', function(event) {

     var idcliente = $("#clientesValorInventario option:selected").val();
     var nombreCliente = $("#clientesValorInventario option:selected").text();

     console.log(idcliente);
     console.log(nombreCliente);

 
     // window.location = "index.php?ruta=reportes-ventas&idcliente="+idcliente+"&nombreCliente="+nombreCliente;
});

$(document).on('change', '#clientesValorInventario', function(event) {

     var idcliente2 = $("#clientesValorInventario option:selected").val();
     var nombreCliente2 = $("#clientesValorInventario option:selected").text();

     // console.log(idcliente2);
     // console.log(nombreCliente2);

 
     window.location = "index.php?ruta=simscard&idcliente2="+idcliente2+"&nombreCliente2="+nombreCliente2;
});

 

