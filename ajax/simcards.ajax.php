<?php


require_once "../controladores/simscard.controlador.php";
require_once "../modelos/simscard.modelo.php";

class AjaxSimcards{

	/*=============================================
	EDITAR SIMCARDS
	=============================================*/	 

	public $idSincards;

	public function ajaxEditarSimcards(){

		$item = "id";
		$valor = $this->idSincards;
		$select = null;
		$valor1 = null;
		$perfil1 = null;

		$respuesta = ControladorSimscard::ctrMostrarSimscard($item, $valor,$select,$valor1,$perfil1);

		echo json_encode($respuesta);

	}
	
		/*=============================================
	ACTIVAR SIMCARD
	=============================================*/	

	public $idSimcardNuevo;
	public $estadoSimcardNuevo;

 
	public function ajaxActivarSimcardNuevo(){

		$tabla = "simcards";

		$item1 = "valor";
		$valor1 = $this->estadoSimcardNuevo;

		$item2 = "id";
		$valor2 = $this->idSimcardNuevo;

		$respuesta = ModeloSimscards::MdlActualizarSimcard($tabla,$item2, $valor2,$item1, $valor1);

	}


	/*=============================================
	VALIDAR NO REPETIR SIMCARDS
	=============================================*/	

	public $validarSimcards;

	public function ajaxValidarSimcards(){

		$item = "simcard";
		$valor = $this->validarSimcards;
		$select = null;
		$valor1 = null;
		$perfil1 = null;

		$respuesta = ControladorSimscard::ctrMostrarSimscard($item, $valor,$select,$valor1,$perfil1);

		echo json_encode($respuesta);

	}

}

/*=============================================
EDITAR SIMCARDS
=============================================*/
if(isset($_POST["idSincards"])){

	$editar = new AjaxSimcards();
	$editar -> idSincards = $_POST["idSincards"];
	$editar -> ajaxEditarSimcards();

}

/*=============================================
	VALIDAR NO REPETIR SIMCARDS
	=============================================*/	

	if(isset($_POST["validarSimcards"])){

	$ValidarSimcard = new AjaxSimcards();
	$ValidarSimcard -> validarSimcards = $_POST["validarSimcards"];
	$ValidarSimcard -> ajaxValidarSimcards();

}



/*=============================================
ACTIVAR SIMCARDS NUEVAS
=============================================*/	

if(isset($_POST["idSimcardNuevo"])){

	$activarSimcardsNuevas = new AjaxSimcards();
	$activarSimcardsNuevas -> idSimcardNuevo = $_POST["idSimcardNuevo"];
	$activarSimcardsNuevas -> estadoSimcardNuevo = $_POST["estadoSimcardNuevo"];
	$activarSimcardsNuevas -> ajaxActivarSimcardNuevo();

}