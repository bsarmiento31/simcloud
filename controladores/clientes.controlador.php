<?php
 
class ControladorClientes
{

	/*=============================================
	REGISTRO DE CLIENTES
	=============================================*/

	static public function ctrCrearClientes(){
		if(isset($_POST["nuevoCliente"])){

				$tabla = "clientes";


				$datos = array("nombre"=>$_POST["nuevoCliente"],
							   "celular"=>$_POST["nuevoTelefono"],
								"email"=>$_POST["nuevoEmail"],
							    "agrego"=>$_POST["nuevoUsuario"]);
			
				$respuesta = ModeloClientes::mdlIngresarClientes($tabla, $datos);


				if($respuesta == "ok"){

							echo'<script>
		
							swal({
								  type: "success",
								  title: "El cliente se ha creado correctamente",
								  showConfirmButton: true,
								  confirmButtonText: "Cerrar"
								  }).then(function(result){
											if (result.value) {
		
											window.location = "clientes";
		
											}
										})
		
							</script>';

						}
		}
	}

	/*=============================================
	EDITAR CLIENTES
	=============================================*/

	static public function ctrEditarClientes(){
		if(isset($_POST["idCliente"])){

				$tabla = "clientes";


				$datos = array("id"=>$_POST["idCliente"],
							   "nombre"=>$_POST["editarCliente"],
							   "celular"=>$_POST["editarTelefono"],
								"email"=>$_POST["editarEmail"],
							    "agrego"=>$_POST["editarUsuario"]);
			
				$respuesta = ModeloClientes::mdlEditarClientes($tabla, $datos);


				if($respuesta == "ok"){

							echo'<script>
		
							swal({
								  type: "success",
								  title: "El cliente se ha editado correctamente",
								  showConfirmButton: true,
								  confirmButtonText: "Cerrar"
								  }).then(function(result){
											if (result.value) {
		
											window.location = "clientes";
		
											}
										})
		
							</script>';

						}
		}
	}


	/*=============================================
	MOSTRAR CLIENTES
	=============================================*/ 

	static public function ctrMostrarClientes($item, $valor,$perfil){  

		$tabla = "clientes";

		$respuesta = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor,$perfil);

		return $respuesta;

	}


	/*=============================================
	BORRAR CLIENTE
	=============================================*/

	static public function ctrBorrarCliente(){

		if(isset($_GET["idCliente"])){

			$tabla ="clientes";
			$datos = $_GET["idCliente"];

			

			$respuesta = ModeloClientes::mdlEliminarCliente($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El cliente ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "clientes";

								}
							})

				</script>';

			}		

		}

	}

}