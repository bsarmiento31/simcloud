<?php
 
class ControladorUsuarios 
{ 
  
	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function ctrCrearUsuario(){ 

		if(isset($_POST["nuevoUsuario"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])){

				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = "";

				if(isset($_FILES["nuevaFoto"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/img/usuarios/".$_POST["nuevoUsuario"];

					mkdir($directorio, 0755);

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["nuevaFoto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

					$tabla = "usuario";

					$encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');


					if ($_POST["nuevoPerfil"] == "Administrador") {

						$mostrar = "0";
						
					}else{

						$mostrar = "1";

					}

					$datos = array( "nombre" => $_POST["nuevoNombre"],
					           		"usuario2" => $_POST["nuevoUsuario"],
					           		"password" => $encriptar,
					           		"perfil" => $_POST["nuevoPerfil"],
					           		"foto"=>$ruta,
					           		"mostrar" => $mostrar,
					           		"nit" => $_POST["nuevoNit"],
					           		"comercial" => $_POST["nuevoComercial"],
					           		"idpadre" => $_POST["nuevoIdPadre"],
					           		"coordinador" => $_POST["nuevoCoordinador"]);

				$respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);


				if($respuesta == "ok"){

					echo "<script>
						swal({
 
						type: 'success',
						title: '¡El usuario ha sido guardado correctamente!',
						showConfirmButton: true,
						confirmButtonText: 'Cerrar'

					}).then(function(result){

						if(result.value){
						
							window.location = 'usuarios';

						}

					});
				
				

					</script>";

					}		

				
			}
			
		}
	}


	/*=============================================
	MOSTRAR USUARIO
	=============================================*/

	static public function ctrMostrarUsuarios($item, $valor,$perfil,$valor1,$perfil1){

		$tabla = "usuario";

		$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor,$perfil,$valor1,$perfil1);

		return $respuesta;
	}
	
		/*=============================================
	MOSTRAR USUARIO CON COORDINADOR
	=============================================*/

	static public function ctrMostrarUsuariosCoordinador($item, $valor,$perfil,$valor1,$perfil1){

		$tabla = "usuario";

		$respuesta = ModeloUsuarios::MdlMostrarUsuariosCoordinador($tabla, $item, $valor,$perfil,$valor1,$perfil1);

		return $respuesta;
	}


	/*=============================================
	INGRESO DE USUARIO 
	=============================================*/

	static public function ctrIngresoUsuario(){ 

		if(isset($_POST["ingUsuario"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"])){

			   	$encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$tabla = "usuario";

				$item = "usuario2"; 
				$valor = $_POST["ingUsuario"];
				$perfil = null;
				$valor1 = null;
				$perfil1 = null;
				
				$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor,$perfil,$valor1,$perfil1);

				if($respuesta["usuario2"] == $_POST["ingUsuario"] && $respuesta["password"] == $encriptar){
 
					if($respuesta["estado"] == 1){

						$_SESSION["iniciarSesion"] = "ok";
						$_SESSION["id"] = $respuesta["id"];
						$_SESSION["nombre"] = $respuesta["nombre"];
						$_SESSION["usuario"] = $respuesta["usuario2"];
						$_SESSION["perfil"] = $respuesta["perfil"];
						$_SESSION["comercial"] = $respuesta["comercial"];
						$_SESSION["idpadre"] = $respuesta["idpadre"];

						/*=============================================
						REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN
						=============================================*/

						date_default_timezone_set('America/Bogota');
 
						$fecha = date('Y-m-d');
						$hora = date('H:i:s');

						$fechaActual = $fecha.' '.$hora;

						$item1 = "ultimo_login";
						$valor1 = $fechaActual;

						$item2 = "id";
						$valor2 = $respuesta["id"];

						$ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2); 

						if($ultimoLogin == "ok"){

							echo 
							"<script>
								swal({
 								position: 'top-end',
 								type: 'success',
 								title: 'Ingreso satisfactorio',
 								showConfirmButton: false,
 								timer: 1500
								}).then(function(result) {
									window.location = 'inicio';
							});
							</script>";

						}				
						
					}else{

						echo 
							"<script>
								swal({
  							type: 'error',
  							title: 'Oops...',
  							text: 'Este usuario no esta activado!',
  							footer: '<a href>Why do I have this issue?</a>'
  							});
							</script>";

					}		

				}else{

					echo 
							"<script>
								swal({
  							type: 'error',
  							title: 'Oops...',
  							text: 'Error al ingresar, vuelva a intentarlo!',
  							footer: '<a href>Why do I have this issue?</a>'
							
						});
							</script>";
				}

			}	

		}

	}


	/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function ctrEditarUsuario(){

		if(isset($_POST["editarIdUsuario"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = $_POST["fotoActual"];

				if(isset($_FILES["editarFoto"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/img/usuarios/".$_POST["editarUsuario"];

					mkdir($directorio, 0755);

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editarFoto"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["editarFoto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				if($_POST["editarPassword"] != ""){


					$encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

					

				}else{

					$encriptar = $_POST["passwordActual"];

				}

				if ($_POST["editarPerfil"] == "Administrador") {

					$mostrar = 0;
				}else{
					$mostrar = 1;
				}

					$tabla = "usuario";

					$datos = array( "id" => $_POST["editarIdUsuario"],
									"nombre" => $_POST["editarNombre"],
					           		"usuario2" => $_POST["editarUsuario"],
					           		"password" => $encriptar,
					           		"perfil" => $_POST["editarPerfil"],
					           		"foto"=>$ruta,
					           		"mostrar" => $mostrar,
					           		"nit" => $_POST["editarNit"],
					           		"comercial" => $_POST["editarComercial"],
					           		"idpadre" => $_POST["editarIdPadre"]);

				$respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);


				if($respuesta == "ok"){

					echo  "<script>
								swal({
 
						type: 'success',
						title: '¡El usuario ha sido guardado correctamente!',
						showConfirmButton: true,
						confirmButtonText: 'Cerrar'

					}).then(function(result){

						if(result.value){
						
							window.location = 'usuarios';

						}

					});
				
						</script>";

					}		

				
			}
		
		}
	}

	/*=============================================
	BORRAR USUARIO 
	=============================================*/

	static public function ctrBorrarUsuario(){

		if(isset($_GET["idUsuario"])){

			$tabla ="usuario";
			$datos = $_GET["idUsuario"];

			if($_GET["fotoUsuario"] != "" || $_GET["fotoUsuario"] == "")
			{

				unlink($_GET["fotoUsuario"]);
				rmdir('vistas/img/usuarios/'.$_GET["usuario"]);

			}


			$respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);

			if($respuesta == "ok"){

			 echo'<script>

				swal({
					  type: "success",
					  title: "El usuario ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "usuarios";

								}
							})

				</script>';

			}		

		}

	}


}