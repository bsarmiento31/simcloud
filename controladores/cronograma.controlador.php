<?php
 
class ControladorCronograma
{
	/*=============================================
	MOSTRAR CRONOGRAMAS
	=============================================*/ 

	static public function ctrMostrarCronogramas($item, $valor){ 

		$tabla = "cronograma";

		$respuesta = ModeloCronogramas::mdlMostrarCronogramas($tabla, $item, $valor);

		return $respuesta;

	}
} 