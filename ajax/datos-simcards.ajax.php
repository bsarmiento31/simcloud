<?php

require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";

class AjaxSimcard{ 
  

	public function traerDatosSimcard(){ 
 
		$perfil = null;
		$valor1 = null;

		$respuesta = ControladorVentas::ctrContarSimcards($perfil, $valor1);

		echo json_encode($respuesta);

	}

}





$traerDatosSimcards = new AjaxSimcard();
$traerDatosSimcards ->traerDatosSimcard();
