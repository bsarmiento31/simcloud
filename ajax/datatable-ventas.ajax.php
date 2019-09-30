<?php

require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php"; 

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php"; 
 
class TablaVentas{

	public function mostrarVentas(){

	// $item = null;
 //  $valor = null;

 //  $ventas = ControladorVentas::ctrMostrarVentas($item, $valor);

     if(isset($_GET["fechaInicial"])){

            $fechaInicial = $_GET["fechaInicial"];
            $fechaFinal = $_GET["fechaFinal"];
            $perfil = null;
            $valor = null;

          }else{

            $fechaInicial = null;
            $fechaFinal = null;
            $perfil = null;
            $valor = null;


          }

        $ventas = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal,$perfil,$valor);


 

   if(count($ventas) == 0){

        echo '{"data": []}';

        return;
    } 


  	$datosJson = '{
 		"data":[';

 		for( $i = 0 ; $i < count($ventas); $i++){


  	$botones = "<div class='btn-group'><button class='btn btn-success btnEditarVentas' type='button' idVenta='".$ventas[$i]["id"]."' ><i class='fa fa-edit' aria-hidden='true'></i></button><button class='btn btn-danger btnEliminarVentas' type='button' idVentaEliminar='".$ventas[$i]["id"]."'><i class='fa fa-times' aria-hidden='true'></i></button></div>";

     $item1 = "id";
     $valor = $ventas[$i]["cliente"];
     $perfil = null;
     $valor1 = null;
     $perfil1 = null; 

     $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item1, $valor,$perfil,$valor1,$perfil1);

 			$datosJson .= '[
  			  "'.($i+1).'",
  			  "'.$usuarios["nombre"].'",
  			  "'.$ventas[$i]["simcard"].'",
  			  "'.$ventas[$i]["tipoplan"].'",
  			  "'.$ventas[$i]["fechallegada"].'",
  			  "'.$ventas[$i]["fecharegreso"].'",
  			  "'.$ventas[$i]["fechaventa"].'",
  			  "'.$ventas[$i]["imei"].'",
  			  "'.$ventas[$i]["observacion"].'",
  			  "'.$ventas[$i]["valor"].'",
  			  "'.$botones.'"
  			],';
 		}
  			
  		$datosJson = substr($datosJson, 0,-1);

  		$datosJson .= '] 

  		}';

  		echo $datosJson;	

  		}
}


$activarVentas = new TablaVentas();
$activarVentas -> mostrarVentas();