<?php

require_once "conexion.php";  


 
class ModeloSimscards{ 
 
 
	/*=============================================
	CREAR SIMCARD
	=============================================*/  

	static public function mdlIngresarSimscards($tabla, $valoresq){ 


		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario,simcard, tipoplan,agrego,destino) VALUES $valoresq");

		//var_dump($stmt);
//(:usuario, :simcard, :tipoplan, :operador,:agrego,:destino)
		// $stmt->bindParam(":datos", $datos, PDO::PARAM_STR);
		// $stmt->bindParam(":datos", $datos, PDO::PARAM_STR);
		// $stmt->bindParam(":datos", $datos, PDO::PARAM_STR);
		// $stmt->bindParam(":datos", $datos, PDO::PARAM_STR);
		// $stmt->bindParam(":datos", $datos, PDO::PARAM_STR);
		// $stmt->bindParam(":datos", $datos, PDO::PARAM_STR);
		// 

		


		if($stmt->execute()){ 

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}
	
	/*=============================================
	ASIGNAR SIMCARDS
	=============================================*/ 

	static public function mdlAsignarSimcards($tabla, $datos){ 
 

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario = :usuario, simcard = :simcard, agrego = :agrego  WHERE id = :id");

		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_STR);
		$stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt -> bindParam(":simcard", $datos["simcard"], PDO::PARAM_STR);
		$stmt -> bindParam(":agrego", $datos["agrego"], PDO::PARAM_STR);
		

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
	
	
		/*=============================================
	ACTUALIZAR VALOR DE LA SIMCARD
	=============================================*/

	static public function MdlActualizarSimcard($tabla, $item, $valor,$item2,$valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item2 = :$item2 WHERE $item = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}


	//Editar Simcards
	static public function mdlEditarSimscards($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario = :usuario, simcard = :simcard, tipoplan = :tipoplan, destino = :destino WHERE id = :id");

		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_STR);
		$stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt -> bindParam(":simcard", $datos["simcard"], PDO::PARAM_STR);
		$stmt -> bindParam(":tipoplan", $datos["tipoplan"], PDO::PARAM_STR);
		$stmt -> bindParam(":destino", $datos["destino"], PDO::PARAM_STR);
		

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	MOSTRAR SIMCARD 
	=============================================*/ 
	static public function mdlMostrarSinscard($tabla, $item, $valor,$select,$valor1,$perfil1){

	if($item != null){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
		
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

	}else if($select != null){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $select = :$select");

		$stmt -> bindParam(":".$select, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

	}else if ($perfil1 != null) {
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil1 = :$perfil1");

		$stmt -> bindParam(":".$perfil1, $valor1, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();
	}
	else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();
	}
		

		$stmt -> close();

		$stmt = null;

	}
	
	
		/*=============================================
	MOSTRAR SIMSCARDS QUE TENGAN COMO VALOR 0(OSEA QUE ESTE DISPONIBLE), SI SALE 1 ESTA VENDIDA Y NO LO MUESTRA(ESTO LO HACE EN EL CREAR VENTA)
	=============================================*/ 
	static public function mdlMostrarSinscardHabilitada($tabla, $item, $valor,$select,$valor1,$perfil1){

	if($item != null){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND valor = 1");
		
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

	}else if($select != null){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $select = :$select AND valor = 0");

		$stmt -> bindParam(":".$select, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

	}else if ($perfil1 != null) {
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil1 = :$perfil1 AND valor = 0");

		$stmt -> bindParam(":".$perfil1, $valor1, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();
	}
	else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();
	}
		

		$stmt -> close();

		$stmt = null;

	}
	
	
		/*=============================================
	MOSTRAR SIMCARD SOLO PARA AGENCIAS
	=============================================*/ 
	static public function mdlMostrarSimscardComerAgenFree($tabla,$item, $valor,$destino,$valordestino){

	if($item != null){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND $destino = :$destino AND valor = 0");
		
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt -> bindParam(":".$destino, $valordestino, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

	}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();
	}
		

		$stmt -> close();

		$stmt = null;

	}



	/*=============================================
	MOSTRAR SIMSCARDS NADA MAS PARA EL USUARIO CON PERFIL AGENCIAS
	=============================================*/ 
	static public function mdlMostrarSinscardAgencias($tabla, $item, $valor, $select,$valor1,$select1){

	if($item != null){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
		
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

	}else if ($select != null) {
		
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $select = :$select OR $select1 = :$select1");

		$stmt -> bindParam(":".$select, $valor, PDO::PARAM_STR);
		$stmt -> bindParam(":".$select1, $valor1, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();
	}
	else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();
	}
		

		$stmt -> close();

		$stmt = null;

	}

	//Borrar sincards
	static public function mdlEliminarSimscards($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}
}