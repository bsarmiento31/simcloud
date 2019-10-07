<?php

require_once "../controladores/simscard.controlador.php";
require_once "../modelos/simscard.modelo.php";  
 
require_once "../controladores/ventas.controlador.php"; 
require_once "../modelos/ventas.modelo.php";
  
class AjaxVentas{  
 

	/*=============================================
	SELECCION DINAMICA PARA LA SIMCARDS Esto se cambio para que cargue las simcards del usuario administrador
	=============================================*/	
 
	public $idSimcards; 

	public function ajaxSimcards(){
 
		$item = null;
		$valor = $this->idSimcards;  
		$select = "usuario"; 
		$valor1 = null;
		$perfil1 = null;

		$respuesta = ControladorSimscard::ctrMostrarSimscardHabilitada($item, $valor,$select,$valor1,$perfil1);

		// echo "<select class='form-control m-b traerPlan chosen-select'  name='nuevoSimcards' required>";

		// echo $cadenaMarcaN = "<option value=''>Seleccione la simcards</option>";

		echo "<datalist id='browsers' class='scrollable'>";
		
		foreach ($respuesta as $key => $value)
		{
			if ($value["simcard"] != "") 
			{

				$cadena = "<option value='".$value['simcard']."'>".$value['simcard']."</option>";
				echo  $cadena;

			}
			else
			{
				$cadena = json_encode($respuesta);
				echo  $cadena;
			}

		
		}

		// echo "</select>";
		echo "</datalist>";


	}
	
	
	//Esto se cambio para que cargue las simcards del usuario administrador
	public $idSimcardsCoordinador; 

	public function ajaxSimcardsCoordinador(){
 
		$item = null;
		$valor = $this->idSimcardsCoordinador;  
		$select = "agrego"; 
		$valor1 = null;
		$perfil1 = null;

		$respuesta = ControladorSimscard::ctrMostrarSimscardHabilitada($item, $valor,$select,$valor1,$perfil1);

		// echo "<select class='form-control m-b traerPlan chosen-select'  name='nuevoSimcards' required>";

		// echo $cadenaMarcaN = "<option value=''>Seleccione la simcards</option>";

		echo "<datalist id='browsers' class='scrollable'>";
		
		foreach ($respuesta as $key => $value)
		{
			if ($value["simcard"] != "") 
			{

				$cadena = "<option value='".$value['simcard']."'>".$value['simcard']."</option>";
				echo  $cadena;

			}
			else
			{
				$cadena = json_encode($respuesta);
				echo  $cadena;
			}

		
		}

		// echo "</select>";
		echo "</datalist>";

	}
	
			/*=============================================
	REVISAR SI LA SIMCARD QUE VA A COLOCAR ESTA EN EL DATALIST
	=============================================*/	
 
	public $validarSimcardRepetida; 

	public function ajaxSimcardsRepetida(){
 
		$item = "simcard";
		$valor = $this->validarSimcardRepetida;  
		$select =  null;
		$valor1 = null;
		$perfil1 = null;

		$respuesta = ControladorSimscard::ctrMostrarSimscard($item, $valor,$select,$valor1,$perfil1);

		echo json_encode($respuesta);


	}
	
		/*=============================================
	REVISAR SI LA SIMCARD QUE VA A COLOCAR ESTA VENDIDA
	=============================================*/	
  
	public $validarSimcardVendida; 

	public function ajaxSimcardsVendida(){
 
		$item = "simcard";
		$valor = $this->validarSimcardVendida;  
		$select =  null;
		$valor1 = null;
		$perfil1 = null;

		$respuesta = ControladorSimscard::ctrMostrarSimscardHabilitada($item, $valor,$select,$valor1,$perfil1);

		echo json_encode($respuesta);


	}
	
				/*=============================================
	SELECCION DINAMICA PARA LA SIMCARDS DE COMERCIAL SOLO(VIENE DE VENTAS.JS)
	=============================================*/	

	public $SimcardUsuarioComercial; 
	public $SimcardNumeroComercial;

	public function ajaxSimcardComercialComercialSolo(){
 
		$item = "usuario";
		$valor = $this->SimcardUsuarioComercial;  
		$destino = "destino";
		$valordestino = $this->SimcardNumeroComercial;
	

		$respuesta = ControladorSimscard::ctrMostrarSimscardComerAgenFree($item, $valor,$destino,$valordestino);


		//echo $cadenaMarcaN = "<option value=''>Seleccione la simcards</option>"; 
		echo "<datalist id='browsers' class='scrollable'>";
		
		foreach ($respuesta as $key => $value)
		{
			if ($value["simcard"] != "") 
			{

				$cadena = "<option value='".$value['simcard']."'>".$value['simcard']."</option>";
				echo  $cadena;

			}
			else
			{
				$cadena = json_encode($respuesta);
				echo  $cadena;
			}

		
		}
		
		echo "</datalist>";


	}
	
	
		/*=============================================
	SELECCION DINAMICA PARA LA SIMCARDS DE COMERCIAL(VIENE DE VENTAS.JS)
	=============================================*/	

	public $SimcardUsuario; 
	public $SimcardNumero;

	public function ajaxSimcardComercialAgencias(){
 
		$item = "usuario";
		$valor = $this->SimcardUsuario;  
		$destino = "destino";
		$valordestino = $this->SimcardNumero;
	

		$respuesta = ControladorSimscard::ctrMostrarSimscardComerAgenFree($item, $valor,$destino,$valordestino);
    
        echo "<datalist id='browsers' class='scrollable'>";
		//echo $cadenaMarcaN = "<option value=''>Seleccione la simcards</option>"; 
		
		foreach ($respuesta as $key => $value)
		{
			if ($value["simcard"] != "") 
			{

				$cadena = "<option value='".$value['simcard']."'>".$value['simcard']."</option>";
				echo  $cadena;

			}
			else
			{
				$cadena = json_encode($respuesta);
				echo  $cadena;
			}

		
		}
        echo "</datalist>";

	}
	
	/*=============================================
	DESACTIVAR POR MEDIO DE LA FECHA EL CRONOGRAMA
	=============================================*/	

	public $fechaTraida;
	public $estadoTraido;

 
	public function ajaxDesactivarxFecha(){

		$tabla = "ventas";

		$item1 = "estado";
		$valor1 = $this->estadoTraido;

		$item2 = "fecharegreso";
		$valor2 = $this->fechaTraida;

		$respuesta = ModeloVentas::mdlActualizarVentasPorFecha($tabla, $item1, $valor1, $item2, $valor2);

	}
	
	
			/*=============================================
	TRAERNOS LOS TIPOS DE PLANES DE LA AGENCIAS
	=============================================*/	
 
	public $idPlanAgencia;

	public function ajaxTraerPlanesAgencias(){

		$item = null;
		$valor = $this->idPlanAgencia;  
		$select = "simcard";
		$valor1 = null;
		$perfil1 = null;

		$respuesta = ControladorSimscard::ctrMostrarSimscard($item, $valor,$select,$valor1,$perfil1);

		// $cadenaChekboxes = '<select class="form-control" name="nuevoplan">';
		// echo $cadenaChekboxes;
		echo $cadenaChekboxes = "<option value=''>Seleccione el plan</option>";
		$MensajeErrorTrabajo = '<div class="alert alert-success alert-dismissible" role="alert">Este cliente no tiene plan</div>';

		foreach ($respuesta as $key => $value)
		{

		$array_ph = explode("/",$value["tipoplan"]);

			foreach ($array_ph as $key) {
				
				if ($key == "0") 
				{	
					echo $MensajeErrorTrabajo;
				}
				else if($key != "") 
				{
					$cadena = '<option><value="'.$key.'">'.$key.'</option>';
					echo $cadena;
				}
				
			}

			// echo '</select>';

			
		}

		

	}


	/*=============================================
	SELECCION DINAMICA PARA TRAER LOS DESTINOS DE LA SIMCARD
	=============================================*/	
 
	// public $idSimcardsDestino;

	// public function ajaxSimcardsDestino(){
 
	// 	$item = null;
	// 	$valor = $this->idSimcardsDestino;  
	// 	$select = "usuario";
	// 	$valor1 = null;
	// 	$perfil1 = null;

	// 	$respuesta = ControladorSimscard::ctrMostrarSimscard($item, $valor,$select,$valor1,$perfil1);

	// 	// echo json_encode($respuesta);

	// 	echo $cadenaMarcaN = "<option value=''>Seleccione el destino</option>";
		
	// 	foreach ($respuesta as $key => $value)
	// 	{
	// 		if ($value["destino"] != "") 
	// 		{

	// 			$cadena = "<option value='".$value['destino']."'>".$value['destino']."</option>";
	// 			echo  $cadena;

	// 		}
	// 		else
	// 		{
	// 			$cadena = json_encode($respuesta);
	// 			echo  $cadena;
	// 		}

		
	// 	}


	// }


	/*=============================================
	TRAERNOS LOS TIPOS DE PLANES
	=============================================*/	
 
	public $idPlan;

	public function ajaxTraerPlanes(){

		$item = null;
		$valor = $this->idPlan;  
		$select = "simcard";
		$valor1 = null;
		$perfil1 = null;

		$respuesta = ControladorSimscard::ctrMostrarSimscard($item, $valor,$select,$valor1,$perfil1);

		// $cadenaChekboxes = '<select class="form-control" name="nuevoplan">';
		// echo $cadenaChekboxes;
		echo $cadenaChekboxes = "<option value=''>Seleccione el destino</option>";
		$MensajeErrorTrabajo = '<div class="alert alert-success alert-dismissible" role="alert">Este cliente no tiene plan</div>';

		foreach ($respuesta as $key => $value)
		{

		$array_ph = explode("/",$value["destino"]);

		if ($array_ph) {
			foreach ($array_ph as $key) {
				
				if ($key == "0") 
				{	
					echo $MensajeErrorTrabajo;
				}
				else if($key != "") 
				{
					$cadena = '<option><value="'.$key.'">'.$key.'</option>';
					echo $cadena;
				}
				
			}
		}else{
			$cadena = '<option><value="'.$value["destino"].'">'.$value["destino"].'</option>';
					echo $cadena;
		}

			

			// echo '</select>';

			
		}

		

	}


	/*=============================================
	TRAERNOS LOS TIPOS DE PLANES CUANDDO EDITEMOS LA VENTA
	=============================================*/	
 
	public $idPlanEditar;

	public function ajaxTraerInstrumentosEditar(){
 
		$item = null;
		$valor = $this->idPlanEditar;  
		$select = "simcard";
		$valor1 = null;
		$perfil1 = null;

		$respuesta = ControladorSimscard::ctrMostrarSimscard($item, $valor,$select,$valor1,$perfil1);

		// $cadenaChekboxes = '<select class="form-control m-b" name="editarPlan">';
		// echo $cadenaChekboxes;
		echo $cadenaChekboxes = "<option value=''>Seleccione el plan</option>";
		$MensajeErrorTrabajo = '<div class="alert alert-success alert-dismissible" role="alert">Este cliente no tiene plan</div>';

		foreach ($respuesta as $key => $value)
		{

		$array_ph = explode("/",$value["tipoplan"]);

			foreach ($array_ph as $key) {
				
				if ($key == "0") 
				{	
					// echo json_encode($key);
					echo $MensajeErrorTrabajo;
				}
				else if($key != "") 
				{
					$cadena = '<option><value="'.$key.'">'.$key.'</option>';
					echo $cadena;
				}
				// echo $key;
				
			}
			// echo '</select>';
		}

		

	}


	/*=============================================
	ACTIVAR SIMCARD DE LA TABLA CORNOGRAMA
	=============================================*/	

	public $idSimcard;
	public $estadoSimcard;

 
	public function ajaxAtivarSim(){

		$tabla = "ventas";

		$item1 = "estado";
		$valor1 = $this->estadoSimcard;

		$item2 = "id";
		$valor2 = $this->idSimcard;

		$respuesta = ModeloVentas::mdlActualizarVentas($tabla, $item1, $valor1, $item2, $valor2);

	}

	/*=============================================
	AGREGAR LINEA DEL NUMERO EN EL EXTERIOR
	=============================================*/	
 
	public $idSimcard2;

	public function ajaxTraerLinea(){

		$item = "id";
		$valor = $this->idSimcard2;
		$item1 = null;
		$valor3 = null;

		$respuesta = ControladorVentas::ctrMostrarVentas($item, $valor,$item1,$valor3);

		echo json_encode($respuesta);

	}


}

/*=============================================
MIRAR QUE LA SIMCARD NO ESTE REPETIDA DE LA DATALIST
=============================================*/
if(isset($_POST["validarSimcardRepetida"])){

	$repetidaSimcards = new AjaxVentas();
	$repetidaSimcards -> validarSimcardRepetida = $_POST["validarSimcardRepetida"];
	$repetidaSimcards -> ajaxSimcardsRepetida();

}


//SELECCIONAR EQUIPO DINAMICA DE CREAR MANTENIMIENTO

if(isset($_POST["idSimcards"])){

$traerSimcards = new AjaxVentas();
$traerSimcards -> idSimcards = $_POST["idSimcards"];
$traerSimcards ->ajaxSimcards();

}


/*=============================================
MIRAR QUE LA SIMCARD ESTA VENDIDA
=============================================*/
if(isset($_POST["validarSimcardVendida"])){

	$vendidasSimcards = new AjaxVentas();
	$vendidasSimcards -> validarSimcardVendida = $_POST["validarSimcardVendida"];
	$vendidasSimcards -> ajaxSimcardsVendida();

}


/*=============================================
DESACTIVAR POR MEDIO DE LA FECHA EL CRONOGRAMA
=============================================*/
if(isset($_POST["fechaTraida"])){

	$traerFechaSimcard = new AjaxVentas();
	$traerFechaSimcard -> fechaTraida = $_POST["fechaTraida"];
	$traerFechaSimcard -> estadoTraido = $_POST["estadoTraido"];
	$traerFechaSimcard -> ajaxDesactivarxFecha();

}

//SELECCION DINAMICA PARA TRAER LOS DESTINOS DE LA SIMCARD

// if(isset($_POST["idSimcardsDestino"])){

// $traerSimcardsDestino = new AjaxVentas();
// $traerSimcardsDestino -> idSimcardsDestino = $_POST["idSimcardsDestino"];
// $traerSimcardsDestino ->ajaxSimcardsDestino();

// }


////TRAER PLANES A LA VENTA DE AGENCIAS(VENTA.JS)

if(isset($_POST["idPlanAgencia"])){

$traerplanesAgencias = new AjaxVentas();
$traerplanesAgencias -> idPlanAgencia = $_POST["idPlanAgencia"];
$traerplanesAgencias ->ajaxTraerPlanesAgencias();

}

/*=============================================
TRAER SIMCARD DE USUARIO O COMERCIAL
=============================================*/	

if(isset($_POST["SimcardNumero"])){

	$SimcardNumero = new AjaxVentas();
	$SimcardNumero -> SimcardNumero = $_POST["SimcardNumero"];
	$SimcardNumero -> SimcardUsuario = $_POST["SimcardUsuario"];
	$SimcardNumero -> ajaxSimcardComercialAgencias();

}

/*=============================================
TRAER SIMCARD DE COMERCIAL SOLO
=============================================*/	

if(isset($_POST["SimcardNumeroComercial"])){

	$SimcardNumeroSolo = new AjaxVentas();
	$SimcardNumeroSolo -> SimcardNumeroComercial = $_POST["SimcardNumeroComercial"];
	$SimcardNumeroSolo -> SimcardUsuarioComercial = $_POST["SimcardUsuarioComercial"];
	$SimcardNumeroSolo -> ajaxSimcardComercialComercialSolo();

}


//AGREGAR LINEA DEL NUMERO EN EL EXTERIOR

if(isset($_POST["idSimcard2"])){

$traerLineaExterior = new AjaxVentas();
$traerLineaExterior -> idSimcard2 = $_POST["idSimcard2"];
$traerLineaExterior ->ajaxTraerLinea();

}

//SELECCIONAR EQUIPO DINAMICA DE CREAR MANTENIMIENTO

if(isset($_POST["idPlan"])){

$traerplanes = new AjaxVentas();
$traerplanes -> idPlan = $_POST["idPlan"];
$traerplanes ->ajaxTraerPlanes();

}

//TRAERNOS LOS TIPOS DE PLANES CUANDDO EDITEMOS LA VENTA

if(isset($_POST["idPlanEditar"])){

$traerPlanesEditar = new AjaxVentas();
$traerPlanesEditar -> idPlanEditar = $_POST["idPlanEditar"];
$traerPlanesEditar ->ajaxTraerInstrumentosEditar();

}


//OBTENER DATOS PARA LA GRAFICA

// if(isset($_POST["valor"])){

// $traerPlanesGraficas = new AjaxVentas();
// $traerPlanesGraficas -> valor = $_POST["valor"];
// $traerPlanesGraficas ->ajaxTraerPlanes();

// }


/*=============================================
ACTIVAR USUARIO
=============================================*/	

if(isset($_POST["idSimcard"])){

	$activarSimcard = new AjaxVentas();
	$activarSimcard -> idSimcard = $_POST["idSimcard"];
	$activarSimcard -> estadoSimcard = $_POST["estadoSimcard"];
	$activarSimcard -> ajaxAtivarSim();

}

if(isset($_POST["idSimcardsCoordinador"])){

$traerSimcardCoordinador = new AjaxVentas();
$traerSimcardCoordinador -> idSimcardsCoordinador = $_POST["idSimcardsCoordinador"];
$traerSimcardCoordinador ->ajaxSimcardsCoordinador();

}

