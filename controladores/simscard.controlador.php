<?php
 
class ControladorSimscard
{ 
   
	/*============================================= 
	REGISTRO DE SIMSCARD
	=============================================*/

	static public function ctrCrearSimsCard(){
 
		if(isset($_POST["nuevoUsuario"])){

				$items1 = ($_POST["nuevoUsuario"]);
				$items3 = ($_POST["nuevoDestino"]);
				if ($_POST["plan"] =="") {
					$items4 = "No hay plan";
				}else{
					$items4 = implode(' / ', $_POST["plan"]);
				}
				$items5 = ($_POST["nuevoSimcards"]);
				$items6 = ($_POST["nuevoAgrego"]);


				while(true){

					$item1 = current($items1); 
					$item3 = current($items3);
					$item4 = $items4;
					$item5 = current($items5);
					$item6 = current($items6);

					$usuario = (($item1 !== false) ? $item1: ", &nbsp;");
					$destino = (($item3 !== false) ? $item3: ", &nbsp;");
					$plan = (($item4 !== false) ? $item4: ", &nbsp;");
					$sim = (($item5 !== false) ? $item5: ", &nbsp;");
					$agrego = (($item6 !== false) ? $item6: ", &nbsp;");

					$valores = '("'.$usuario.'","'.$sim.'","'.$plan.'", "'.$agrego.'" , "'.$destino.'"),';

					$valoresq = substr($valores, 0, -1);

					$tabla = "simcards"; 

					$respuesta = ModeloSimscards::mdlIngresarSimscards($tabla, $valoresq);

					$item1 = next($items1); 
					$item3 = next($items3);
					$item4 = next($items4);
					$item5 = next($items5);
					$item6 = next($items6);

					if ($item1 == false && $item3 == false && $item4 == false && $item5 == false && $item6 == false) break;

				}

				// $tabla = "simcards"; 

				// $plan = implode(' - ', $_POST["plan"]);

				// $datos = array("usuario"=>$_POST["nuevoUsuario"],
				// 			   "simcard"=>$_POST["listarSimcards"],
				// 				"tipoplan"=>$plan,
				// 			    "operador"=>$_POST["nuevoOperador"],
				// 				"agrego"=>$_POST["nuevoAgrego"],
				// 				"destino"=>$_POST["nuevoDestino"]);
			
				// $respuesta = ModeloSimscards::mdlIngresarSimscards($tabla, $datos);

				if($respuesta == "ok"){

							echo'<script>
		
							swal({
								  type: "success",
								  title: "La simcard se ha creado correctamente",
								  showConfirmButton: true,
								  confirmButtonText: "Cerrar"
								  }).then(function(result){
											if (result.value) {
		
											window.location = "simscard";
		
											}
										})
		
							</script>'; 

						}

		}

	}
	
	
			/*============================================= 
	REGISTRO DE SIMSCARD MULTISIMCARD
	=============================================*/
 
	static public function ctrCrearMultiSimsCard(){
 
		if(isset($_POST["nuevoUsuario2"])){

				$items1 = ($_POST["nuevoUsuario2"]);

				if ($_POST["nuevoDestino2"] == "") {
					$items3 = "No hay destino";
				}else{
					$items3 = implode(' / ', $_POST["nuevoDestino2"]);
				}

				if ($_POST["plan2"] == "") {
					$items4 = "No hay plan";
				}else{
					$items4 = implode(' / ', $_POST["plan2"]);
				}

				$items5 = ($_POST["nuevoSimcards2"]);
				$items6 = ($_POST["nuevoAgrego2"]);
				$items7 = ($_POST["addcordinadorinv"]);
 
				while(true){

					$item1 = current($items1);
					$item3 = $items3;
					$item4 = $items4;
					$item5 = current($items5);
					$item6 = current($items6);
					$item7 = current($items7);

					$usuario = (($item1 !== false) ? $item1: ", &nbsp;");
					$destino = (($item3 !== false) ? $item3: ", &nbsp;");
					$plan = (($item4 !== false) ? $item4: ", &nbsp;");
					$sim = (($item5 !== false) ? $item5: ", &nbsp;");
					$agrego = (($item6 !== false) ? $item6: ", &nbsp;");
					$asigcoord = (($item7 !== false) ? $item7: ", &nbsp;");

					$valores = '("'.$usuario.'","'.$sim.'","'.$plan.'", "'.$agrego.'" , "'.$destino.'","'.$asigcoord.'"),';

					$valoresq = substr($valores, 0, -1);

					$tabla = "simcards"; 

					$respuesta = ModeloSimscards::mdlIngresarSimscards($tabla, $valoresq);

					$item1 = next($items1); 
					$item3 = next($items3);
					$item4 = next($items4);
					$item5 = next($items5);
					$item6 = next($items6);
					$item7 = next($items7);

					if ($item1 == false && $item3 == false && $item4 == false && $item5 == false && $item6 == false && $item7 == false) break;

				}

				

				if($respuesta == "ok"){

							echo'<script>
		
							swal({
								  type: "success",
								  title: "Las simcard multidestino se han creado correctamente",
								  showConfirmButton: true,
								  confirmButtonText: "Cerrar"
								  }).then(function(result){
											if (result.value) {
		
											window.location = "simscard";
		
											}
					 					})
		
							</script>'; 

						}

		}

	}
	
	
			/*=============================================
	BORRAR SINCARD SELECCIONADOS
	=============================================*/

	static public function ctrEliminarRegistrosSeleccionados(){

		if(isset($_POST["selector"])){

			$id = $_POST["selector"];

			foreach ($id as $value) {
				
				$tabla = "simcards";
				$datos = $value;

				$respuesta = ModeloSimscards::mdlEliminarSimscards($tabla, $datos);
			}


			if($respuesta == "ok"){ 

				echo'<script>

							swal({
							    title: "¿Está seguro de borrar la simcard?",
							    text: "¡Si no lo está puede cancelar la accíón!",
							    type: "warning",
							    showCancelButton: true,
							    confirmButtonColor: "#3085d6",
							      cancelButtonColor: "#d33",
							      cancelButtonText: "Cancelar",
							      confirmButtonText: "Si, borrar simcard!"
							  }).then(function(result){

							    if(result.value){

							   	swal({
										  type: "success",
										  title: "Las simcards ha sido borrado correctamente",
										  showConfirmButton: true,
										  confirmButtonText: "Cerrar"

										  });

										  window.location = "simscard";

							    }

  						})

				</script>';

			}		

		}

	}

	
	
	
	/*=============================================
	ASIGNAR SIMSCARDS
	=============================================*/

	static public function ctrAsignarSimcards(){

		if(isset($_POST["editarId"])){

				$id = $_POST['editarId'];
				$simcard = $_POST['editarSimcard'];
				$usuario = $_POST['editarSeleccionadoUsuario'];
				$agrego = $_POST['editarSeleccionadoAgrego'];

				$N = count($id);

				for($i=0; $i < $N; $i++)
				{
					$tabla = "simcards";

					$datos = array("id"=>$id[$i],
							   "usuario"=>$usuario[$i],
							   "simcard"=>$simcard[$i],
							   "agrego"=>$agrego[$i]); 

					$respuesta = ModeloSimscards::mdlAsignarSimcards($tabla, $datos);
				}

				
				if($respuesta == "ok"){

							echo'<script>
		
							swal({
								  type: "success",
								  title: "Se ha asignado la simcard correctamente",
								  showConfirmButton: true,
								  confirmButtonText: "Cerrar"
								  }).then(function(result){
											if (result.value) {
		
											window.location = "simscard";
		
											}
										})
		
							</script>';

						}





		}

	}
 
	/*=============================================
	MOSTRAR SIMSCARDS
	=============================================*/ 

	static public function ctrMostrarSimscard($item, $valor,$select,$valor1,$perfil1){ 

		$tabla = "simcards";

		$respuesta = ModeloSimscards::mdlMostrarSinscard($tabla, $item, $valor,$select,$valor1,$perfil1);

		return $respuesta;

	}
	
		/*=============================================
	MOSTRAR SIMSCARDS QUE TENGAN COMO VALOR 0(OSEA QUE ESTE DISPONIBLE), SI SALE 1 ESTA VENDIDA Y NO LO MUESTRA(ESTO LO HACE EN EL CREAR VENTA) 
	=============================================*/ 

	static public function ctrMostrarSimscardHabilitada($item, $valor,$select,$valor1,$perfil1){ 

		$tabla = "simcards"; 
 
		$respuesta = ModeloSimscards::mdlMostrarSinscardHabilitada($tabla, $item, $valor,$select,$valor1,$perfil1);

		return $respuesta;

	}

 
	/*=============================================
	MOSTRAR SIMSCARDS NADA MAS PARA EL USUARIO CON PERFIL AGENCIAS
	=============================================*/ 

	static public function ctrMostrarSimscardAgencias($item, $valor, $select,$valor1,$select1){ 

		$tabla = "simcards";

		$respuesta = ModeloSimscards::mdlMostrarSinscardAgencias($tabla, $item, $valor, $select,$valor1,$select1);

		return $respuesta;

	}
	
	
/*=============================================
	MOSTRAR SIMCARD SOLO PARA AGENCIAS,COMERCIAL O FREELANCE(PARA QUE NO SE DAÑE EL AJAX DEL CREAR VENTA)
	=============================================*/ 

	static public function ctrMostrarSimscardComerAgenFree($item, $valor,$destino,$valordestino){ 

		$tabla = "simcards";

		$respuesta = ModeloSimscards::mdlMostrarSimscardComerAgenFree($tabla,$item, $valor,$destino,$valordestino);

		return $respuesta;

	}

	/*=============================================
	EDITAR SIMSCARD
	=============================================*/

	static public function ctrEditarSimsCard(){

		if(isset($_POST["editarid"])){

				$tabla = "simcards";

				$destino = implode(' / ', $_POST["editarDestino"]);	
				$plan = implode(' / ', $_POST["editarPlan"]);


				$datos = array("id"=>$_POST["editarid"],
							   "usuario"=>$_POST["editarUsuario"],
							   "simcard"=>$_POST["editarSimcards"],
								"tipoplan"=>$plan,
							    "destino"=>$destino);
			
				$respuesta = ModeloSimscards::mdlEditarSimscards($tabla, $datos);

				if($respuesta == "ok"){

							echo'<script>
		
							swal({
								  type: "success",
								  title: "La simcard se ha editado correctamente",
								  showConfirmButton: true,
								  confirmButtonText: "Cerrar"
								  }).then(function(result){
											if (result.value) {
		
											window.location = "simscard";
		
											}
										})
		
							</script>';

						}

		}

	}


	/*=============================================
	BORRAR SINCARD
	=============================================*/

	static public function ctrBorrarSimcards(){

		if(isset($_GET["idSincard"])){

			$tabla ="simcards";
			$datos = $_GET["idSincard"];

			

			$respuesta = ModeloSimscards::mdlEliminarSimscards($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La simcards ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "simscard";

								}
							})

				</script>';

			}		

		}

	}


		/*=============================================
	DESCARGAR EXCEL SIMCARD
	=============================================*/

	public function ctrDescargarReporteSimcard(){

		if(isset($_GET["reporteSimcard"])){

			$item = null;
            $valor = null; 
            $select = null;
            $valor1 = null;
            $perfil1 = null;

            $simscard = ControladorSimscard::ctrMostrarSimscard($item, $valor, $select,$valor1,$perfil1);


			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

			$Name = $_GET["reporteSimcard"].'.xls';

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
					<td style='font-weight:bold; border:1px solid #eee;'>USUARIO</td> 
					<td style='font-weight:bold; border:1px solid #eee;'>PERFIL</td>
					<td style='font-weight:bold; border:1px solid #eee;'># DE SIMCARD</td>
					<td style='font-weight:bold; border:1px solid #eee;'>TIPO DE PLAN</td>
					<td style='font-weight:bold; border:1px solid #eee;'>DESTINO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>CREACIÓN</td>	
					</tr>");

			foreach ($simscard as $row => $item){

				$item1 = "id";
                $valor3 = $item["usuario"];
                $perfil3 = null;
                $valor2 = null;
                $perfil2 = null;

				$usuarios = ControladorUsuarios::ctrMostrarUsuarios($item1, $valor3,$perfil3,$valor2,$perfil2);
				
				$fecha = substr($item["creacion"],0,7); 

			 echo utf8_decode("<tr>
			 			<td style='border:1px solid #eee;'>".$usuarios["nombre"]."</td> 
			 			<td style='border:1px solid #eee;'>".$item["agrego"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["simcard"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["tipoplan"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["destino"]."</td>
			 			<td style='border:1px solid #eee;'>".$fecha."</td>
		 					</tr>");

			}


			echo "</table>";

		}

	}

}