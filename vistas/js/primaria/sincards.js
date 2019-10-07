/*=============================================
EDITAR SINCARD
=============================================*/
$(".TablasSimcards").on("click", ".btnEditarSimcards", function(){

  var idSincards = $(this).attr("idSincard");
  
  var datos = new FormData();  
  datos.append("idSincards", idSincards);
 
  $.ajax({

    url:"ajax/simcards.ajax.php", 
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false, 
    dataType: "json",
    success: function(respuesta){
      
      $("#editarid").val(respuesta["id"]);
      $("#editarUsuario").val(respuesta["usuario"]);
      $("#editarSimcards").val(respuesta["simcard"]);
      $("#editarPlan").val(respuesta["tipoplan"]);
      $(".editarDestino").val(respuesta["destino"]);
      $("#mostrarDestinosEnviar").val(respuesta["destino"]);
      $("#mostrarPlanes").text(respuesta["tipoplan"]);
      $("#mostrarPlanesEnviar").val(respuesta["tipoplan"]);
      
      var destino = respuesta["destino"];

      var destinoSeparados = destino.split(' / ');
      
       for ( x=0; x < destinoSeparados.length; x++){ 

        if (destinoSeparados[x] == "Union europea") {
          $(".UnionCheck").prop("checked",true);
          $(".UnionCheck").val("Union europea");
          $("#content26").css("display","block");
          $("#select-all26").prop("checked",true);
          $(".select-alla26").prop("checked",true);
        }
        if (destinoSeparados[x] == "Estados Unidos") {
          $(".UsaCheck").prop("checked",true);
          $(".UsaCheck").val("Estados Unidos");
          $("#content21").css("display","block");
          $("#select-all29").prop("checked",true);
          $(".select-alla29").prop("checked",true);
        }

        if (destinoSeparados[x] == "Mexico") {
          $(".MexicoCheck").prop("checked",true);
          $(".MexicoCheck").val("Mexico");
          $("#content22").css("display","block");
          $("#select-all20").prop("checked",true);
          $(".select-alla20").prop("checked",true);
        }

        if (destinoSeparados[x] == "Republica Dominicana") {
          $(".DominicaCheck").prop("checked",true);
          $(".DominicaCheck").val("Republica Dominicana");
          $("#content23").css("display","block");
          $("#select-all28").prop("checked",true);
          $(".select-alla28").prop("checked",true);
        }

        if (destinoSeparados[x] == "Centro y sur america") {
          $(".SurCheck").prop("checked",true);
          $(".SurCheck").val("Centro y sur america");
          $("#content24").css("display","block");
          $("#select-all24").prop("checked",true);
          $(".select-alla24").prop("checked",true);
        }

        if (destinoSeparados[x] == "Australia y nueva zelanda") {
          $(".AustraliaCheck").prop("checked",true);
          $(".AustraliaCheck").val("Australia y nueva zelanda");
          $("#content45").css("display","block");
          $("#select-all27").prop("checked",true);
          $(".select-alla27").prop("checked",true);
        }

        if (destinoSeparados[x] == "Canada") {
          $(".CanadaCheck").prop("checked",true);
          $(".CanadaCheck").val("Canada");
          $("#content27").css("display","block");
          $("#select-all22").prop("checked",true);
          $(".select-alla22").prop("checked",true);
        }

        if (destinoSeparados[x] == "Asia") {
          $(".AsiaCheck").prop("checked",true);
          $(".AsiaCheck").val("Asia");
          $("#content28").css("display","block");
          $("#select-all23").prop("checked",true);
          $(".select-alla23").prop("checked",true);
        }


        if (destinoSeparados[x] == "Colombia") {
          $(".ColombiaCheck").prop("checked",true);
          $(".ColombiaCheck").val("Colombia");
          $("#content29").css("display","block");
          $("#select-all25").prop("checked",true);
          $(".select-alla25").prop("checked",true);
        }

        if (destinoSeparados[x] == "Puerto Rico") {
          $(".PuertoRicoCheck").prop("checked",true);
          $(".PuertoRicoCheck").val("Puerto Rico");
          $("#content30").css("display","block");
          $("#select-all21").prop("checked",true);
          $(".select-alla21").prop("checked",true);
        }

    }
    
    }

  });

})


/*=============================================
TRAER EL ID DEL USUARIO AGENCIA CUANDO CREA UN COMERCIAL EL COORDINADOR
=============================================*/

$("#capturarIdAgencia1").change(function(){


  var usuarioTraer = $(this).val();

  console.log(usuarioTraer); 

  var datos = new FormData();
  datos.append("usuarioTraer", usuarioTraer);

   $.ajax({
      url:"ajax/usuarios.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success:function(respuesta){

        // console.log("respuesta",respuesta);
        
        if(respuesta){

          $("#capturarIdPadre1").val(respuesta["id"]);  
        }

      }

  })
})


/*============================================= 
AGREGANDO CAMPO SIMCARD AL DARLE CLICK
=============================================*/

$(document).on("click", ".agregarSimcard", function(){

   var capturarUsuario = $('#capturarUsuario').val();
   var capturarTipoPlan = $('#capturarTipoPlan').val();
   var capturarDestino = $('#capturarDestino').val();
   var nuevoAgrego = $('#nuevoAgrego').val();

  $(".nuevoCampoSimcard").append(

          '<div class="col-sm-12" style="padding:5px 15px;">'+
            '<div class="input-group ">'+
                '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarSimcard"><i class="fa fa-close"></i></button></span><input type="text" placeholder="# de la simcards"  name="nuevoSimcards[]" class="form-control simcardsValidar nuevaSimcardListar" id="simcardGuardar">'+
            '</div>'+
            '<input type="hidden" placeholder="Nombre del operador" class="form-control" name="nuevoAgrego[]" value="'+nuevoAgrego+'">'+
            '<input type="hidden" placeholder="Nombre del operador" class="form-control" name="nuevoDestino[]" value="'+capturarDestino+'">'+
            '<input type="hidden" placeholder="Nombre del operador" class="form-control" name="planvacio[]">'+
            '<input type="hidden" placeholder="Nombre del cliente" class="form-control"  name="nuevoUsuario[]" value="'+capturarUsuario+'">')

});


//<!--Esto se hizo nuevo-->


/*============================================= 
AGREGANDO CAMPO SIMCARD AL DARLE CLICK CUANDO SEA OPCION MULTIPLE
=============================================*/

$(document).on("click", ".agregarSimcardMultiple", function(){

   var capturarUsuario = $('#capturarUsuario2').val();
   var capturarTipoPlan = $('#capturarTipoPlan').val();
   var capturarDestino = $('#capturarDestino').val();
   var nuevoAgrego = $('#nuevoAgrego2').val();

  $(".nuevoCampoSimcard2").append(

          '<div class="col-sm-12" style="padding:5px 8px;">'+
            '<div class="input-group ">'+
                '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarSimcard2"><i class="fa fa-close"></i></button></span><input type="text" placeholder="# de la simcards"  name="nuevoSimcards2[]" class="form-control simcardsValidar nuevaSimcardListar" id="simcardGuardar">'+
            '</div>'+
            '<input type="hidden" placeholder="Nombre del operador" class="form-control" name="nuevoAgrego2[]" value="'+nuevoAgrego+'">'+
            '<input type="hidden" placeholder="Nombre del operador" class="form-control" name="nuevoDestinoVacio2[]">'+
            '<input type="hidden" placeholder="Tipos de planes" class="form-control" name="planvacio2[]">'+
            '<input type="hidden" placeholder="Nombre del cliente" class="form-control"  name="nuevoUsuario2[]" value="'+capturarUsuario+'">')

});

//<!--Esto se hizo nuevo-->

//ELIMINAR CAMPO SIMCARD MULTISIMCARD
$(document).on("click", ".quitarSimcard2", function(){
      $(this).parent().parent().parent().remove();
});

//ELIMINAR CAMPO SIMCARD
$(document).on("click", ".quitarSimcard", function(){
      $(this).parent().parent().parent().remove();
});


// Listen for click on toggle checkbox
$('#select-all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $('.checktabla').each(function() {
            this.checked = true;                        
        });
    } else {
        $('.checktabla').each(function() {
            this.checked = false;                       
        });
    }
});



// Listen for click on toggle checkbox
// Mexico
$('#select-all1').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $('.select-alla').each(function() {
            this.checked = true;                        
        });
    } else {
        $('.select-alla').each(function() {
            this.checked = false;                       
        });
    }
});

$('#select-all2').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $('.select-alla2').each(function() {
            this.checked = true;                        
        });
    } else {
        $('.select-alla2').each(function() {
            this.checked = false;                       
        });
    }
});

$('#select-all3').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $('.select-alla3').each(function() {
            this.checked = true;                        
        });
    } else {
        $('.select-alla3').each(function() {
            this.checked = false;                       
        });
    }
});
// Mexico
$('#select-all4').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $('.select-alla4').each(function() {
            this.checked = true;                        
        });
    } else {
        $('.select-alla4').each(function() {
            this.checked = false;                       
        });
    }
});
// Mexico
$('#select-all5').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $('.select-alla5').each(function() {
            this.checked = true;                        
        });
    } else {
        $('.select-alla5').each(function() {
            this.checked = false;                       
        });
    }
});
// Mexico
$('#select-all6').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $('.select-alla6').each(function() {
            this.checked = true;                        
        });
    } else {
        $('.select-alla6').each(function() {
            this.checked = false;                       
        });
    }
});
// Mexico
$('#select-all7').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $('.select-alla7').each(function() {
            this.checked = true;                        
        });
    } else {
        $('.select-alla7').each(function() {
            this.checked = false;                       
        });
    }
});
// Mexico
$('#select-all8').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $('.select-alla8').each(function() {
            this.checked = true;                        
        });
    } else {
        $('.select-alla8').each(function() {
            this.checked = false;                       
        });
    }
});
// Mexico
$('#select-all9').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $('.select-alla9').each(function() {
            this.checked = true;                        
        });
    } else {
        $('.select-alla9').each(function() {
            this.checked = false;                       
        });
    }
});
// Mexico
$('#select-all10').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $('.select-alla10').each(function() {
            this.checked = true;                        
        });
    } else {
        $('.select-alla10').each(function() {
            this.checked = false;                       
        });
    }
});


//HABILITAR BOTON CUANDO TODOS LOS CAMPOS ESTEN LLENOS EN AGREGAR MULTISIMCARDS
//<!--Esto se hizo nuevo-->

function validar2(){
  var validado = true;
  elementos = document.getElementsByClassName("inputFormu2");
  for(i=0;i<elementos.length;i++){
    if(elementos[i].value == "" || elementos[i].value == null){
    validado = false
    }
  }
  if(validado){
  document.getElementById("habilitarButton2").disabled = false;
  
  }else{
     document.getElementById("habilitarButton2").disabled = true;
  }
}

//<!--Esto se hizo nuevo-->

//HABILITAR BOTON SUBMIT MULTISIMCARD
$(document).on("click", "#habilitarSubmitMultisimcard", function(){
      
      $('#submitHabilitadoMultisimcard').removeAttr("disabled");

});

$(document).on("change", ".cambiarSelect", function(){
      var capturarSelect = $(".cambiarSelect").val();
      if (capturarSelect == "Estados Unidos") {

         // $(".capturarOption").html('<option value="uno">Numero uno</option>');

      }
});



//HABILITAR BOTON CUANDO TODOS LOS CAMPOS ESTEN LLENOS

function validar(){
  var validado = true;
  elementos = document.getElementsByClassName("inputFormu");
  for(i=0;i<elementos.length;i++){
    if(elementos[i].value == "" || elementos[i].value == null){
    validado = false
    }
  }
  if(validado){
  document.getElementById("habilitarButton").disabled = false;
  
  }else{
     document.getElementById("habilitarButton").disabled = true;
  }
}

//HABILITAR BOTON SUBMIT
$(document).on("click", "#habilitarSubmit", function(){
      
      $('#submitHabilitado').removeAttr("disabled");

});




/*=============================================
ELIMINAR SIMCARD
=============================================*/
$(".TablasSimcards").on("click", ".btnEliminarSimcard", function(){

  var idSincard = $(this).attr("idSincard"); 
  console.log(idSincard);


  swal({
    title: '¿Está seguro de borrar la simcard?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar simcard!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=simscard&idSincard="+idSincard;

    }

  })

})
/*=============================================
REVISAR SI LA SIMCARDS YA ESTÁ REGISTRADA
=============================================*/

$("#nuevoDias").change(function(){

  var capturarDias = $(this).val();

  var cargarDias = capturarDias * 5;

  $("#valor").val(cargarDias);

});

/*=============================================
REVISAR SI LA SIMCARDS YA ESTÁ REGISTRADA
=============================================*/

$(".simcardsValidar").change(function(){

  $(".mensaje").remove();  

  var validarSimcards = $(this).val();

 

  var datos = new FormData();
  datos.append("validarSimcards", validarSimcards);

   $.ajax({
      url:"ajax/simcards.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success:function(respuesta){

        
        if(respuesta){

          $(".simcardsValidar").parent().after('<div class="mensaje">Esta Simcards ya existe en la base de datos</div>');

          $(".simcardsValidar").val("");  
        }

      }

  })
})



  //Este método hace que al estar listo el documento se ejecuten los métodos
function ready(fn) {
  if (document.readyState != 'loading'){
    fn();
  } else {
    document.addEventListener('DOMContentLoaded', fn);
  }
}

// En esta variable se guardaran todos los elegidos
var valores = {};
var sumaTotal = 0;

// Metodo para agregar el "onchange" y hacer la magia
function agregarListeners(){
    var listas = document.getElementsByTagName("select");
    
    //Activar RecolectarElegidos cada que se detecte un cambio
    for (var i = 0; i < listas.length; i++) {
       listas[i].addEventListener("change", RecolectarElegidos, false); 
    }
}


// Método que busca en todas las listas los elementos Elegidos
function RecolectarElegidos(elemento){
  var _listaQueSeCambio = elemento.target;
  var _seleccionados = _listaQueSeCambio.selectedOptions;
  var _nombreLista = _listaQueSeCambio.name;
  // var _dias = document.getElementById('nuevoDias').value;
  var _temporal = [];
  
  for(var i = 0; i < _seleccionados.length; i++){
    var _valorSeleccionado = _seleccionados[i].value;
    var _valorCantidad = 0;
    console.warn(_seleccionados[i].value);
    
     if(_valorSeleccionado == 'Plan $35USD - 1.5GB - 30 Dias'){
      _valorCantidad = 35;
    } else if(_valorSeleccionado == 'Plan $45USD - 2.5GB - 30 Dias'){
      _valorCantidad = 45;
    } else if(_valorSeleccionado == 'Plan $55USD - 5GB - 30 Dias'){
      _valorCantidad = 55;
    }else if (_valorSeleccionado == 'Plan $40USD - 1GB - 30 Dias') {
      _valorCantidad = 40;
    }else if (_valorSeleccionado == 'Plan $50USD - 4GB - 30 Dias') {
      _valorCantidad = 50;
    }else if (_valorSeleccionado == 'Plan $600USD - 6GB - 30 Dias') {
      _valorCantidad = 60;
    }else if (_valorSeleccionado == 'Plan $70USD - ilimitado - 30 Dias') {
      _valorCantidad = 70;
    }else if (_valorSeleccionado == 'Plan $35USD - 1.5GB - 30 Dias') {
      _valorCantidad = 35;
    }else if (_valorSeleccionado == 'Plan $45USD - 2.5GB - 30 Dias') {
      _valorCantidad = 45;
    }else if (_valorSeleccionado == 'Plan $55USD - 5GB - 30 Dias') {
      _valorCantidad = 55;
    }else if (_valorSeleccionado == 'Plan $45USD - 5GB - 30 Dias') {
      _valorCantidad = 45;
    }else if (_valorSeleccionado == 'Plan $40USD - 1GB - 30 Dias') {
      _valorCantidad = 40;
    }else if (_valorSeleccionado == 'Plan $45USD - 5GB - 30 Dias') {
      _valorCantidad = 45;
    }else if (_valorSeleccionado == 'Plan $40USD - 1GB - 30 Dias') {
      _valorCantidad = 40;
    }else if (_valorSeleccionado == 'Plan $15USD - 2GB - 30 Dias') {
      _valorCantidad = 15;
    }else if (_valorSeleccionado == 'Plan $15USD - 3GB - 15 Dias') {
      _valorCantidad = 15;
    }else if (_valorSeleccionado == 'Plan $8USD - 1GB - 7 Dias') {
      _valorCantidad = 8;
    }else if (_valorSeleccionado == 'Plan $5USD - 500MB - 3 Dias') {
      _valorCantidad = 5;
    }else if (_valorSeleccionado == 'Plan $70USD - Ilimitados - 30 Dias') {
      _valorCantidad = 70;
    }else if (_valorSeleccionado == 'Plan $60USD - 15GB - 30 Dias') {
      _valorCantidad = 60;
    }else if (_valorSeleccionado == 'Plan $45USD - 5GB - 30 Dias') {
      _valorCantidad = 45;
    }else if (_valorSeleccionado == 'Plan $40USD - 3GB - 30 Dias') {
      _valorCantidad = 40;
    }else if (_valorSeleccionado == 'Plan $60USD - 9GB - 30 Dias') {
      _valorCantidad = 60;
    }else if (_valorSeleccionado == 'Plan $45USD - 5GB - 30 Dias') {
      _valorCantidad = 45;
    }else if (_valorSeleccionado == 'Plan $30USD - Ilimitado - 5 Dias') {
      _valorCantidad = 30;
    }else if (_valorSeleccionado == 'Plan $35USD - Ilimitado - 10 Dias') {
      _valorCantidad = 35;
    }else if (_valorSeleccionado == 'Plan $40USD - Ilimitado - 15 Dias') {
      _valorCantidad = 40;
    }else if (_valorSeleccionado == 'Plan $45USD - 3GB - 30 Dias') {
      _valorCantidad = 45;
    }else if (_valorSeleccionado == 'Plan $40USD - 1GB - 30 Dias') {
      _valorCantidad = 40;
    }
    else if (_valorSeleccionado == 'Plan $50USD - 4GB - 30 Dias') {
      _valorCantidad = 50;
    }
    else if (_valorSeleccionado == 'Plan $60USD - 10GB - 30 Dias') {
      _valorCantidad = 60;
    }
    else if (_valorSeleccionado == 'Plan $70USD - Ilimitado - 30 Dias') {
      _valorCantidad = 70;
    }
////// Esta es para los dias

    else if (_valorSeleccionado == '1 Dia') {
      _valorCantidad = 5;
    }
    else if (_valorSeleccionado == '2 Dias') {
      _valorCantidad = 10;
    }
    else if (_valorSeleccionado == '3 Dias') {
      _valorCantidad = 15;
    }
    else if (_valorSeleccionado == '4 Dias') {
      _valorCantidad = 20;
    }
    else if (_valorSeleccionado == '5 Dias') {
      _valorCantidad = 25;
    }
    else if (_valorSeleccionado == '6 Dias') {
      _valorCantidad = 26;
    }
    else if (_valorSeleccionado == '7 Dias') {
      _valorCantidad = 30;
    }
    else if (_valorSeleccionado == '8 Dias') {
      _valorCantidad = 32;
    }
    else if (_valorSeleccionado == '9 Dias') {
      _valorCantidad = 34;
    }
    else if (_valorSeleccionado == '10 Dias') {
      _valorCantidad = 36;
    }
    else if (_valorSeleccionado == '11 Dias') {
      _valorCantidad = 38;
    }
    else if (_valorSeleccionado == '12 Dias') {
      _valorCantidad = 40;
    }
    else if (_valorSeleccionado == '13 Dias') {
      _valorCantidad = 42;
    }
    else if (_valorSeleccionado == '14 Dias') {
      _valorCantidad = 44;
    }
    else if (_valorSeleccionado == '15 Dias') {
      _valorCantidad = 46;
    }
    else if (_valorSeleccionado == '16 Dias') {
      _valorCantidad = 48;
    }
    else if (_valorSeleccionado == '17 Dias') {
      _valorCantidad = 50;
    }
    else if (_valorSeleccionado == '18 Dias') {
      _valorCantidad = 52;
    }
    else if (_valorSeleccionado == '19 Dias') {
      _valorCantidad = 54;
    }
    else if (_valorSeleccionado == '20 Dias') {
      _valorCantidad = 56;
    }
    else if (_valorSeleccionado == '21 Dias') {
      _valorCantidad = 58;
    }
    else if (_valorSeleccionado == '22 Dias') {
      _valorCantidad = 60;
    }
    else if (_valorSeleccionado == '23 Dias') {
      _valorCantidad = 61;
    }
    else if (_valorSeleccionado == '24 Dias') {
      _valorCantidad = 63;
    }
    else if (_valorSeleccionado == '25 Dias') {
      _valorCantidad = 65;
    }
    else if (_valorSeleccionado == '26 Dias') {
      _valorCantidad = 66;
    }
    else if (_valorSeleccionado == '27 Dias') {
      _valorCantidad = 67;
    }
    else if (_valorSeleccionado == '28 Dias') {
      _valorCantidad = 68;
    }
    else if (_valorSeleccionado == '29 Dias') {
      _valorCantidad = 69;
    }
    else if (_valorSeleccionado == '30 Dias') {
      _valorCantidad = 70;
    }
    //Esta es para que el valor sea 0 
     else if (_valorSeleccionado == '') {
      _valorCantidad = 0;
    }

 
     else if (_valorSeleccionado == 'Estados Unidos') {
      _valorCantidad = 0;
    }
     else if (_valorSeleccionado == 'Mexico') {
      _valorCantidad = 0;
    }
     else if (_valorSeleccionado == 'Republica Dominicana') {
      _valorCantidad = 0;
    }
     else if (_valorSeleccionado == 'Centro y sur america') {
      _valorCantidad = 0;
    }
     else if (_valorSeleccionado == 'Australia y nueva zelanda') {
      _valorCantidad = 0;
    }
     else if (_valorSeleccionado == 'Union europea') {
      _valorCantidad = 0;
    }
     else if (_valorSeleccionado == 'Canada') {
      _valorCantidad = 0;
    }
     else if (_valorSeleccionado == 'Asia') {
      _valorCantidad = 0;
    }
     else if (_valorSeleccionado == 'Colombia') {
      _valorCantidad = 0;
    }
     else if (_valorSeleccionado == 'Puerto Rico') {
      _valorCantidad = 0;
    }
  
    // else if (_valorSeleccionado == 'Plan de datos: 10GB, Velocidad Red: 4GLTE, Llamadas a estados unidos, canadá, méxico y colombia: NA,Precio: 5USD, Vigencia: 1 Día') {
    //   _valorCantidad = 5;
    // }
    
    var _temp = {
      valorLetra: _valorSeleccionado,
      valorCantidad: _valorCantidad
    }
    
    _temporal.push(_temp);
  }
   
   //Guardamos los valores recolectados
   valores[_nombreLista] = _temporal;

   // Una vez que tenemos todo recolectado, hay que ir a sumarlos
   calcularSuma(valores);
}

// Dados valores recolectados los recorre y suma
function calcularSuma(valores){
   var _cantidad = 0
  
   for(var indice in valores){ 
     for(var i = 0; i < valores[indice].length; i++){
       _cantidad += valores[indice][i].valorCantidad;
     }
   }
   
   // Guardar la suma en nuestra variable global
   sumaTotal = _cantidad;
   
   //Opcional mostrarlos en pantalla
   mostrarElegidos();
}


//Este método es para mostrar que valores se elegieron y la suma, aunque realmente no es necesario solo para la demostraión
function mostrarElegidos(){
   // var _divResultados = document.getElementById('resultados');
   $("#valor").val(sumaTotal);
   
}


// ESTE ES EL MÉTODO INICIAL, EL MAIN, El que ejecuta todo :D al terminar la carga
ready(agregarListeners);



//CARGAR LOS USUARIOS ASIGNADOS

$(document).ready(function() {
      $(document).on('change', '#usuarioAsignado', function(event) {
        $('.usuarioSeleccionado').val($("#usuarioAsignado option:selected").val());
    });
       

  });
  
  
  //CAPTURAR EL USUARIO DEL COORDINADOR
$(document).ready(function() {
      $(document).on('change', '#capturarUsuarioCordinador', function(event) {
        $('.capturarCorrdinador').val($("#capturarUsuarioCordinador option:selected").val());
    });
       

  });
  
  
  //CAPTURAR EL USUARIO DEL COORDINADOR EN LA PAGINA ASIGNAR SIMCARD
$(document).ready(function() {
      $(document).on('change', '#capturarUsuarioCordinador2', function(event) {
        $('.capturarCorrdinador2').val($("#capturarUsuarioCordinador2 option:selected").val());
    });
       

  });
  
  
  $(document).on("click", ".btnActivar", function(){

  var idSimcardNuevo = $(this).attr("idUsuario");
  var estadoSimcardNuevo = $(this).attr("estadoUsuario"); 

  // console.log(idSimcardNuevo);
  // console.log(estadoSimcardNuevo);

  var datos = new FormData();
   datos.append("idSimcardNuevo", idSimcardNuevo);
    datos.append("estadoSimcardNuevo", estadoSimcardNuevo);

    $.ajax({

    url:"ajax/simcards.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){

        if(window.matchMedia("(max-width:767px)").matches){
    
           swal({
            title: "La simcard ha sido actualizada",
            type: "success",
            confirmButtonText: "¡Cerrar!"
          }).then(function(result) {
            
              if (result.value) {

              window.location = "simcards";

            }

          });


    }
      }

    })

    if(estadoSimcardNuevo == 0){

      $(this).removeClass('btn-success');
      $(this).addClass('btn-danger');
      $(this).html('Habilitado');
      $(this).attr('estadoUsuario',1);

    }else{

      $(this).addClass('btn-success');
      $(this).removeClass('btn-danger');
      $(this).html('Vendido');
      $(this).attr('estadoUsuario',0);
 
    }

})