<?php



require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class AjaxClientes{

	/*=============================================
	EDITAR CLIENTES
	=============================================*/	 

	public $idCliente;

	public function ajaxEditarSimcards(){

		$item = "id";
		$valor = $this->idCliente;
		$perfil = null;

		$respuesta = ControladorClientes::ctrMostrarClientes($item, $valor,$perfil);

		echo json_encode($respuesta);

	}

}


/*=============================================
EDITAR CLIENTES
=============================================*/
if(isset($_POST["idCliente"])){

	$editarCliente = new AjaxClientes();
	$editarCliente -> idCliente = $_POST["idCliente"];
	$editarCliente -> ajaxEditarSimcards();

}
