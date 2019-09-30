<?php


require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxUsuarios{

	/*=============================================
	EDITAR USUARIO
	=============================================*/	 

	public $idUsuario;

	public function ajaxEditarUsuario(){

		$item = "id";
		$valor = $this->idUsuario;
		$perfil = null;
		$valor1 = null;
		$perfil1 = null;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor, $perfil,$valor1,$perfil1);

		echo json_encode($respuesta);

	}

	/*=============================================
	ACTIVAR USUARIO
	=============================================*/	

	public $activarUsuario;
	public $activarId;

 
	public function ajaxActivarUsuario(){

		$tabla = "usuario";

		$item1 = "estado";
		$valor1 = $this->activarUsuario;

		$item2 = "id";
		$valor2 = $this->activarId;

		$respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

	}

	/*=============================================
	VALIDAR NO REPETIR USUARIO
	=============================================*/	

	public $validarUsuario;

	public function ajaxValidarUsuario(){

		$item = "usuario2";
		$valor = $this->validarUsuario;
		$perfil = null;
		$valor1 = null;
		$perfil1 = null;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor,$perfil,$valor1,$perfil1);

		echo json_encode($respuesta);

	}
	
		/*=============================================
	TRAER EL ID DEL USUARIO AGENCIA CUANDO CREA UN COMERCIAL EL ADMINISTRADOR
	=============================================*/	

	public $usuarioTraer;

	public function ajaxTraerIdUsuarioComercial(){

		$item = "usuario2";
		$valor = $this->usuarioTraer;
		$perfil = null;
		$valor1 = null;
		$perfil1 = null;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor,$perfil,$valor1,$perfil1);

		echo json_encode($respuesta);

	}

}

/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idUsuario"])){

	$editar = new AjaxUsuarios();
	$editar -> idUsuario = $_POST["idUsuario"];
	$editar -> ajaxEditarUsuario();

}


/*=============================================
TRAER EL ID DEL USUARIO AGENCIA CUANDO CREA UN COMERCIAL EL ADMINISTRADOR
=============================================*/
if(isset($_POST["usuarioTraer"])){

	$traerUsuarioComercial = new AjaxUsuarios();
	$traerUsuarioComercial -> usuarioTraer = $_POST["usuarioTraer"];
	$traerUsuarioComercial -> ajaxTraerIdUsuarioComercial();

}

/*=============================================
ACTIVAR USUARIO
=============================================*/	

if(isset($_POST["activarUsuario"])){

	$activarUsuario = new AjaxUsuarios();
	$activarUsuario -> activarUsuario = $_POST["activarUsuario"];
	$activarUsuario -> activarId = $_POST["activarId"];
	$activarUsuario -> ajaxActivarUsuario();

}

/*=============================================
VALIDAR NO REPETIR USUARIO
=============================================*/

if(isset( $_POST["validarUsuario"])){

	$valUsuario = new AjaxUsuarios();
	$valUsuario -> validarUsuario = $_POST["validarUsuario"];
	$valUsuario -> ajaxValidarUsuario();

}