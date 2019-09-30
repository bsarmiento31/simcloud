/*=============================================
SUBIENDO LA FOTO DEL USUARIO
=============================================*/
$(".nuevaFoto").change(function(){

	var imagen = this.files[0];
	
	/*============================================= 
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG  
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".nuevaFoto").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 2000000){

  		$(".nuevaFoto").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizar").attr("src", rutaImagen);

  		})

  	}
})

/*=============================================
TRAER EL ID DE LA AGENCIA CUANDO SE CREA UN COMERCIAL DESDE EL COORDINADOR
=============================================*/

$(".capturarIdAgenciaCoor").change(function(){


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

        console.log("respuesta",respuesta);
        
        if(respuesta){

          $("#capturarIdPadre8").val(respuesta["id"]);  
        }

      }

  })
})



/*=============================================
TRAER EL ID DEL USUARIO AGENCIA CUANDO CREA UN COMERCIAL EL ADMINISTRADOR
=============================================*/

$("#capturarIdAgencia").change(function(){


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

        console.log("respuesta",respuesta);
        
        if(respuesta){

          $("#capturarIdPadre").val(respuesta["id"]);  
        }

      }

  })
})


/*=============================================
TRAER EL ID DEL USUARIO AGENCIA CUANDO SE EDITA UN COMERCIAL EL ADMINISTRADOR
=============================================*/

$("#capturarIdAgencia2").change(function(){


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

        console.log("respuesta",respuesta);
        
        if(respuesta){

          $("#capturarIdPadre2").val(respuesta["id"]);  
        }

      }

  })
})


/*=============================================
TRAER EL ID DEL USUARIO AGENCIA CUANDO CREA UN COMERCIAL EL COORDINADOR(EDITAR)
=============================================*/

$(".traerUsuariopadreCoordinador").change(function(){


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

          $("#capturarIdPadre5").val(respuesta["id"]);  
        }

      }

  })
})

/*=============================================
EDITAR USUARIO
=============================================*/
$(document).on("click", ".btnEditarUsuario", function(){

  var idUsuario = $(this).attr("idUsuario");

  // console.log("idUsuario",idUsuario);
  
  var datos = new FormData();
  datos.append("idUsuario", idUsuario);

  $.ajax({

    url:"ajax/usuarios.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){

      console.log("respuesta",respuesta);
      
      $("#editarNombre").val(respuesta["nombre"]);
      $("#editarUsuario2").val(respuesta["usuario2"]);
      $("#editarPerfil").html(respuesta["perfil"]);
      $("#editarPerfil").val(respuesta["perfil"]);
      $("#fotoActual").val(respuesta["foto"]);
      $("#editarIdUsuario").val(respuesta["id"]);
      $("#editarNit").val(respuesta["nit"]);
      $("#editarComercial2").html(respuesta["comercial"]);
      $("#editarComercial2").val(respuesta["comercial"]);
      $(".idpadretraer").val(respuesta["idpadre"]);


      $("#passwordActual").val(respuesta["password"]);

      if(respuesta["foto"] != ""){

        $(".previsualizar").attr("src", respuesta["foto"]);

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
ELIMINAR USUARIO
=============================================*/
$(document).on("click", ".btnEliminarUsuario", function(){

  var idUsuario = $(this).attr("idUsuario"); 
  var fotoUsuario = $(this).attr("fotoUsuario");
  var usuario = $(this).attr("usuario");
  console.log(usuario);


  swal({
    title: '¿Está seguro de borrar el usuario?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar usuario!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=usuarios&idUsuario="+idUsuario+"&usuario="+usuario+"&fotoUsuario="+fotoUsuario;

    }

  })

})



/*=============================================
ACTIVAR USUARIO
=============================================*/
$(document).on("click", ".btnActivarUsuario", function(){

  var idUsuario = $(this).attr("idUsuario");
  var estadoUsuario = $(this).attr("estadoUsuario"); 

  // console.log(idUsuario);
  // console.log(estadoUsuario);

  var datos = new FormData();
   datos.append("activarId", idUsuario);
    datos.append("activarUsuario", estadoUsuario);

    $.ajax({

    url:"ajax/usuarios.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){

        if(window.matchMedia("(max-width:767px)").matches){
    
           swal({
            title: "El usuario ha sido actualizado",
            type: "success",
            confirmButtonText: "¡Cerrar!"
          }).then(function(result) {
            
              if (result.value) {

              window.location = "usuarios";

            }

          });


    }
      }

    })

    if(estadoUsuario == 0){

      $(this).removeClass('btn-success');
      $(this).addClass('btn-danger');
      $(this).html('Desactivado');
      $(this).attr('estadoUsuario',1);

    }else{

      $(this).addClass('btn-success');
      $(this).removeClass('btn-danger');
      $(this).html('Activado');
      $(this).attr('estadoUsuario',0);
 
    }

})

/*=============================================
REVISAR SI EL USUARIO YA ESTÁ REGISTRADO
=============================================*/

$("#usuarioValidar").change(function(){

  $(".mensaje").remove();  

  var usuario = $(this).val();

  console.log(usuario);

 

  var datos = new FormData();
  datos.append("validarUsuario", usuario);

   $.ajax({
      url:"ajax/usuarios.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success:function(respuesta){

        console.log("respuesta",respuesta);
        
        if(respuesta){

          $("#usuarioValidar").parent().after('<div class="mensaje">Este usuario ya existe en la base de datos</div>');

          $("#usuarioValidar").val("");  
        }

      }

  })
})

