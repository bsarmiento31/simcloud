<?php

require_once "conexion.php";  
 
class ModeloClientes{  

 
	/*=============================================
	CREAR CLIENTES
	=============================================*/ 

	static public function mdlIngresarClientes($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,celular, email, agrego) VALUES (:nombre, :celular, :email, :agrego)");

		//var_dump($stmt);

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":agrego", $datos["agrego"], PDO::PARAM_STR);



		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	//Editar Simcards
	static public function mdlEditarClientes($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, celular = :celular, email = :email, agrego = :agrego WHERE id = :id");

		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_STR);
		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
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
	MOSTRAR CLIENTES
	=============================================*/ 
	static public function mdlMostrarClientes($tabla, $item, $valor,$perfil){

	if($item != null){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
		
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

	}else if($perfil != null){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil = :$perfil");
		
		$stmt -> bindParam(":".$perfil, $valor, PDO::PARAM_STR);

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


	//Borrar clientes
	static public function mdlEliminarCliente($tabla, $datos){

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