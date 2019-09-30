<?php

require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";

class AjaxPlanes{  


	public function traerDatos(){ 

			$perfil = null; 
			$valor1 = null;

			$respuesta = ControladorVentas::ctrContarDestino($perfil, $valor1);

			echo json_encode($respuesta);
		

	}

}



$traerPlanesGraficas = new AjaxPlanes();
$traerPlanesGraficas ->traerDatos();


