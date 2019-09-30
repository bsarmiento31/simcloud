<?php
  
 
class ControladorVentas  
{     
  
	/*=============================================  
	REGISTRO DE VENTAS 
	=============================================*/  
 
	static public function ctrCrearVentas(){

		if(isset($_POST["nuevoCliente"])){
		        
		         $tabla2 = "simcards";

				 $item = "simcard";

				 $valor = $_POST["nuevoSimcards"];

				 $item2 = "valor";

				 $valor2 = $_POST["nuevoAgregovalorNuevo"];

				 $respuesta2 = ModeloSimscards::MdlActualizarSimcard($tabla2, $item, $valor,$item2,$valor2);
		    

				date_default_timezone_set('America/Bogota');

				$hora = date('H');

				$tabla = "ventas";
				
				if ($_POST["nuevoplan1"] != "") {

					$tipo = $_POST["nuevoplan1"];

				}else if ($_POST["nuevoplan2"] != "") {

					$tipo = $_POST["nuevoplan2"];

				}else if ($_POST["nuevoplan3"] != "") {

					$tipo = $_POST["nuevoplan3"];

				}else if ($_POST["nuevoplan4"] != "") {

					$tipo = $_POST["nuevoplan4"];

				}else if ($_POST["nuevoplan5"] != "") {

					$tipo = $_POST["nuevoplan5"];

				}else if ($_POST["nuevoplan6"] != "") {

					$tipo = $_POST["nuevoplan6"];

				}else if ($_POST["nuevoplan7"] != "") {

					$tipo = $_POST["nuevoplan7"];

				}else if ($_POST["nuevoplan8"] != "") {

					$tipo = $_POST["nuevoplan8"];

				}else if ($_POST["nuevoplan9"] != "") {

					$tipo = $_POST["nuevoplan9"];

				}else if ($_POST["nuevoplan10"] != "") {

					$tipo = $_POST["nuevoplan10"];
				}


				$datos = array("cliente"=>$_POST["nuevoCliente"],
							   "vendedor"=>$_POST["nuevoVendedor"],
							   "simcard"=>$_POST["nuevoSimcards"],
								"tipoplan"=>$tipo,
								"fechallegada"=>$_POST["nuevoFechaLlegada"],
							    "fecharegreso"=>$_POST["nuevoFechaRegreso"],
								"fechaventa" => $_POST["nuevoFechaVenta"],
								"imei" => $_POST["nuevoImei"],
								"observacion" => $_POST["nuevoObservacion"],
								"valor" => $_POST["nuevoValor"],
								"estado" => $_POST["nuevoEstado"],
								"codigo" => $_POST["nuevoCodigo"],
								"agrego" => $_POST["nuevoAgrego"],
								"celular" => $_POST["nuevoCelular"],
								"email" => $_POST["nuevoCorreo"],
								"pasaporte" => $_POST["nuevoPasaporte"],
								"agregopadre" => $_POST["nuevoAgregoPadre"],
								"destino" => $_POST["nuevoDestino"],
								"horaingreso"=>$hora,
								"horacierre" =>$_POST["nuevoCierreHora"],
								"dias" =>$_POST["nuevoDias"],
								"coordinador" =>$_POST["nuevoCoordinador"]);
			
				$respuesta = ModeloVentas::mdlIngresarVentas($tabla, $datos);

				if($respuesta == "ok"){

							echo'<script>
		
							swal({
								  type: "success",
								  title: "La venta se ha creado correctamente",
								  showConfirmButton: true,
								  confirmButtonText: "Cerrar"
								  }).then(function(result){
											if (result.value) {
		
											window.location = "ventas";
		
											}
										})
		
							</script>';

						}

		}

	}


	/*============================================= 
	EDITAR VENTAS
	=============================================*/

	static public function ctrEditarVentas(){

		

		if(isset($_POST["idVenta"])){

				$tabla = "ventas";

				// $plan = implode(' - ', $_POST["editarPlan"]);

				$datos = array("id"=>$_POST["idVenta"],
								"cliente"=>$_POST["editarCliente"],
							    "simcard"=>$_POST["editarSimcard"],
								"tipoplan"=>$_POST["editarPlan"],
								"fechallegada"=>$_POST["editarFechaLlegada"],
							    "fecharegreso"=>$_POST["editarFechaRegreso"],
								"fechaventa" => $_POST["editarFechaVenta"],
								"imei" => $_POST["editarImei"],
								"observacion" => $_POST["editarObservacion"],
								"valor" => $_POST["editarValor"],
								"celular" => $_POST["editarCelular"],
								"email" => $_POST["editarCorreo"],
								"pasaporte" => $_POST["editarPasaporte"],
								"destino" => $_POST["editarDestino"],
								"horaingreso" => $_POST["editarHoraIngreso"],
								"horacierre" => $_POST["editarHoraCierre"],
								"dias" => $_POST["editarDias"]);
			
				$respuesta = ModeloVentas::mdlEditarVentas($tabla, $datos);

				if($respuesta == "ok"){

							echo'<script>
		
							swal({
								  type: "success",
								  title: "La venta se ha editado correctamente",
								  showConfirmButton: true,
								  confirmButtonText: "Cerrar"
								  }).then(function(result){
											if (result.value) {
		
											window.location = "ventas";
		
											}
										})
		
							</script>';

						}

		} 

	}



	/*=============================================
	MOSTRAR VENTAS
	=============================================*/ 

	static public function ctrMostrarVentas($item, $valor,$item1,$valor3){ 

		$tabla = "ventas";

		$respuesta = ModeloVentas::mdlMostrarVentas($tabla, $item, $valor,$item1,$valor3);

		return $respuesta;

	}
 
	//CONTAR PLANES

	static public function ctrContarTiposPlanes($perfil,$valor){ 
		
		$tabla = "ventas";

		$respuesta = ModeloVentas::mdlContarTiposPlanes($tabla,$perfil,$valor);

		return $respuesta;
	}



	//CONTAR DESTINOS

	static public function ctrContarDestino($perfil,$valor){ 
		
		$tabla = "ventas";

		$respuesta = ModeloVentas::mdlContarDestino($tabla,$perfil,$valor);

		return $respuesta;
	}


		//SUMAR MAS VENTAS DEL VENDEDOR

	static public function ctrSumarVentasVendedor($perfil,$valor){ 
		
		$tabla = "ventas";

		$respuesta = ModeloVentas::mdlSumarVentasVendedor($tabla,$perfil,$valor);

		return $respuesta;
	}


		//SUMAR MAS VENTAS DEL CLIENTE

	static public function ctrSumarVentasClientes($perfil,$valor){ 
		
		$tabla = "ventas";

		$respuesta = ModeloVentas::mdlSumarVentasClientes($tabla,$perfil,$valor);

		return $respuesta;
	}

	//CONTAR NUMERO DE SIMCARDS ACTIVAS

	static public function ctrContarSimcards($perfil,$valor){ 
		
		$tabla = "ventas";

		$respuesta = ModeloVentas::mdlContarSimcards($tabla,$perfil,$valor);

		return $respuesta; 
	}
 
 

 
	/*=============================================
	RANGO FECHAS  PARA LA VISTA VENTAS 
	=============================================*/	

	static public function ctrRangoFechasVentas($fechaInicial, $fechaFinal,$valor,$perfil,$valor1,$perfil1){

		$tabla = "ventas";

		$respuesta = ModeloVentas::mdlRangoFechasVentas($tabla, $fechaInicial, $fechaFinal,$valor,$perfil,$valor1,$perfil1);

		return $respuesta;
		
	}

	/*=============================================
	RANGO FECHAS  PARA LA VISTA CRONOGRAMA
	=============================================*/	

	static public function ctrRangoFechasVentasCronograma($fechaInicial, $fechaFinal,$valor,$perfil,$valor1,$perfil1){

		$tabla = "ventas";

		$respuesta = ModeloVentas::mdlRangoFechasVentasCronograma($tabla, $fechaInicial, $fechaFinal,$valor,$perfil,$valor1,$perfil1);

		return $respuesta;
		
	}


	/*=============================================
	BORRAR VENTA
	=============================================*/

	static public function ctrBorrarVenta(){

		if(isset($_GET["idVentaEliminar"])){
		    
		    
		    $tabla2 = "simcards";

				 $item = "simcard";

				 $valor = $_GET["simcards"];

				 $item2 = "valor";

				 $valor2 = 0;

				 $respuesta2 = ModeloSimscards::MdlActualizarSimcard($tabla2, $item, $valor,$item2,$valor2);

			$tabla ="ventas";
			$datos = $_GET["idVentaEliminar"];

			

			$respuesta = ModeloVentas::mdlEliminarVentas($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La venta ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "ventas";

								}
							})

				</script>';

			}		

		}

	}

	/*=============================================
	SUMA TOTAL VENTAS
	=============================================*/

	public function ctrSumaTotalVentas($item,$valor){

		$tabla = "ventas"; 

		$respuesta = ModeloVentas::mdlSumaTotalVentas($tabla,$item,$valor);

		return $respuesta;

	} 


	/*=============================================
	SUMAR PLANES TOTALES
	=============================================*/

	public function ctrSumaPlanesTotales($perfil,$valor,$perfil1,$valor1){

		$tabla = "ventas"; 

		$respuesta = ModeloVentas::mdlSumarPlanesTodos($tabla,$perfil,$valor,$perfil1,$valor1);

		return $respuesta;

	} 

	/*=============================================
	SUMA TOTAL VENTAS DE HOY
	=============================================*/

	public function ctrSumaTotalVentasHoy($item,$valor){
 
		$tabla = "ventas"; 

		$respuesta = ModeloVentas::mdlSumaTotalVentasHoy($tabla,$item,$valor);

		return $respuesta;

	}


	//MOSTRAR VENTAS DE HOY

	public function ctrMostrarVentasHoy($item,$valor,$item1,$valor1){
 
		$tabla = "ventas"; 

		$respuesta = ModeloVentas::mdlMostrarVentasHoy($tabla,$item,$valor,$item1,$valor1);

		return $respuesta;

	}

	/*=============================================
	SUMA TOTAL VENTAS DE MES
	=============================================*/

	public function ctrSumaTotalVentasMes($item,$valor){

		$tabla = "ventas"; 

		$respuesta = ModeloVentas::mdlSumaTotalVentasMes($tabla,$item,$valor);

		return $respuesta;

	}

	/*============================================= 
	CREAR LINEA DEL EXTERIOR 
	=============================================*/

	static public function ctrCrearLineaExterior(){

				if(isset($_POST["NuevaLineaId"])){
 
						$tabla = "ventas";

						$item1 = "lineaexterior";
						$valor1 = $_POST["nuevoLinea"];

						$item2 = "id";		 
						$valor2 = $_POST["NuevaLineaId"];

						$respuesta = ModeloVentas::mdlActualizarVentasLinea($tabla, $item1, $valor1, $item2, $valor2);

						if ($respuesta == "ok") {
							echo'<script>
		
							swal({
								  type: "success",
								  title: "La linea se ha guardado",
								  showConfirmButton: true,
								  confirmButtonText: "Cerrar"
								  }).then(function(result){
											if (result.value) {
		
											window.location = "cronograma";
		
											}
										})
		
							</script>';
						}		

		}

	}




	/*=============================================
	DESCARGAR EXCEL
	=============================================*/

	public function ctrDescargarReporte(){

		if(isset($_GET["reporte"])){

			$tabla = "ventas";
			$valor = null;
			$perfil = null;
			$valor1 = null;
			$perfil1 = null;

			if(isset($_GET["fechaInicial"]) && isset($_GET["fechaFinal"])){

				$ventas = ModeloVentas::mdlRangoFechasVentas($tabla, $_GET["fechaInicial"], $_GET["fechaFinal"],$valor,$perfil,$valor1,$perfil1);

			}else{

				$item = null;
				$valor = null;
				$item1 = null;
				$valor3 = null;

				$ventas = ModeloVentas::mdlMostrarVentas($tabla, $item, $valor,$item1,$valor3);

			}


			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

			$Name = $_GET["reporte"].'.xls';

			header('Expires: 0');
			header('Cache-control: private');
			header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
			header("Cache-Control: cache, must-revalidate"); 
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public"); 
			header('Content-Disposition:; filename="'.$Name.'"');
			header("Content-Transfer-Encoding: binary");

			echo utf8_decode("<table border='0'> 

					<tr> 
					<td style='font-weight:bold; border:1px solid #eee;'>CLIENTE</td> 
					<td style='font-weight:bold; border:1px solid #eee;'>SIMCARD</td>
					<td style='font-weight:bold; border:1px solid #eee;'>CELULAR</td>
					<td style='font-weight:bold; border:1px solid #eee;'>TIPO DE PLAN</td>
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA DE LLEGADA</td>
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA DE REGRESO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA DE VENTA</td>	
					<td style='font-weight:bold; border:1px solid #eee;'>IMEI</td>
					<td style='font-weight:bold; border:1px solid #eee;'>OBSERVACION</td>		
					<td style='font-weight:bold; border:1px solid #eee;'>VALOR</td>			
					</tr>");

			foreach ($ventas as $row => $item){

				// $celular = ControladorClientes::ctrMostrarClientes("id", $item["cliente"],$perfil);
				// $cliente = ControladorUsuarios::ctrMostrarUsuarios("id", $item["cliente"],$perfil);

			 echo utf8_decode("<tr>
			 			<td style='border:1px solid #eee;'>".$item["cliente"]."</td> 
			 			<td style='border:1px solid #eee;'>".$item["simcard"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["celular"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["tipoplan"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["fechallegada"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["fecharegreso"]."</td>	
			 			<td style='border:1px solid #eee;'>".$item["fechaventa"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["imei"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["observacion"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["valor"]."</td>
		 					</tr>");

			}


			echo "</table>";

		}

	}


}