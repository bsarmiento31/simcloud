/*=============================================
EDITAR USUARIO
=============================================*/
$(document).on("click", ".btnEditarCliente", function(){

  var idCliente = $(this).attr("idCliente"); 
  
  var datos = new FormData();
  datos.append("idCliente", idCliente); 

  $.ajax({

    url:"ajax/clientes.ajax.php",  
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){

    $("#idCliente").val(respuesta["id"]); 
    $("#editarCliente").val(respuesta["nombre"]);
    $("#editarTelefono").val(respuesta["celular"]);
    $("#editarEmail").val(respuesta["email"]);
    $("#editarUsuario").val(respuesta["agrego"]);




    
    }

  });

})


/*============================================= 
ELIMINAR CLIENTE
=============================================*/
$(document).on("click", ".btnEliminarCliente", function(){

  var idCliente = $(this).attr("idCliente");


  swal({
    title: '¿Deseas Eliminar Este Cliente?',
    text: "¡No podrás revertir esto!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: '¡Sí, Borrarlo!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=clientes&idCliente="+idCliente;

    }

  })

})

