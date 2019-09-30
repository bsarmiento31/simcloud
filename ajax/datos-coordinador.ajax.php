<?php

require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";

class AjaxPlanesCoordinador{  


	public function traerDatosCoordinador(){ 

			$perfil = "coordinador"; 
			$valor1 = 1;

			$respuesta = ControladorVentas::ctrContarDestino($perfil, $valor1);

			echo json_encode($respuesta);
		

	}

}



$traerPlanesGraficasCoordinador = new AjaxPlanesCoordinador();
$traerPlanesGraficasCoordinador ->traerDatosCoordinador();