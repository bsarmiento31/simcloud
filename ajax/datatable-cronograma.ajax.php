<?php

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";  

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";  

class TablaCronogramas{ 
 
	public function mostrarCronogramas(){

		$item = null;
    $valor = null;
    $item1 = null;
    $valor3 = null;

    $ventas = ControladorVentas::ctrMostrarVentas($item, $valor,$item1,$valor3);

    if(count($ventas) == 0){
 
        echo '{"data": []}';

        return;
      } 

  	

  		$datosJson = '{
 		   "data":[';

 		 for( $i = 0 ; $i < count($ventas); $i++){


      // $item1 = "id";
      // $valor = $ventas[$i]["cliente"];
      // $perfil = null;


      

      // $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item1, $valor,$perfil);

      if ($ventas[$i]["estado"] != 0) {
        $activado = "<button class='btn btn-success btn-xs btnActivarSimcard' estadoSimcard='0' idSimcard='".$ventas[$i]["id"]."' >Activado</button>";
      }else{
        $activado = "<button class='btn btn-danger btn-xs btnActivarSimcard' estadoSimcard='1' idSimcard='".$ventas[$i]["id"]."' >Desactivado</button>";
      }

      $item2 = "id";
      $valor2 = $ventas[$i]["cliente"];
      $perfil = null;
       
      $clientes2 = ControladorClientes::ctrMostrarClientes($item2, $valor2,$perfil);

 			$datosJson .= '[
  			  "'.($i+1).'",
  			  "'.$clientes2["nombre"].'",
  			  "'.$ventas[$i]["simcard"].'",
  			  "'.$ventas[$i]["tipoplan"].'",
  			  "'.$clientes2["celular"].'",
  			  "'.$clientes2["agrego"].'",
  			  "'.$ventas[$i]["fechallegada"].'",
  			  "'.$ventas[$i]["fecharegreso"].'",
  			  "'.$activado.'"
  			],';
 		}
  			
  		$datosJson = substr($datosJson, 0,-1);

  		$datosJson .= '] 

  		}';

  		echo $datosJson;	
  		
		}




}

$activarCronograma = new TablaCronogramas();
$activarCronograma -> mostrarCronogramas();