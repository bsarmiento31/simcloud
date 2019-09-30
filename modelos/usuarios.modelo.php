<?php
 
require_once "conexion.php"; 

class ModeloUsuarios
{   

	static public function mdlIngresarUsuario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, usuario2, password, perfil, foto,mostrar,nit,comercial,idpadre,coordinador) VALUES (:nombre, :usuario2, :password, :perfil, :foto,:mostrar,:nit,:comercial,:idpadre,:coordinador)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario2", $datos["usuario2"], PDO::PARAM_STR); 
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
		$stmt->bindParam(":mostrar", $datos["mostrar"], PDO::PARAM_STR);
		$stmt->bindParam(":nit", $datos["nit"], PDO::PARAM_STR);
		$stmt->bindParam(":comercial", $datos["comercial"], PDO::PARAM_STR);
		$stmt->bindParam(":idpadre", $datos["idpadre"], PDO::PARAM_STR);
		$stmt->bindParam(":coordinador", $datos["coordinador"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}
	
	
		/*============================================= 
	MOSTRAR USUARIO CON COORDINADOR
	=============================================*/ 

	static public function MdlMostrarUsuariosCoordinador($tabla, $item, $valor,$perfil,$valor1,$perfil1){

		if($item != null){ 

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();


		} else if($perfil != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil = :$perfil OR $perfil1 = :$perfil1");

			$stmt -> bindParam(":".$perfil, $valor, PDO::PARAM_STR);
			$stmt -> bindParam(":".$perfil1, $valor1, PDO::PARAM_STR);

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
	MOSTRAR USUARIOS 
	=============================================*/ 

	static public function mdlMostrarUsuarios($tabla, $item, $valor,$perfil,$valor1,$perfil1){

		if($item != null){ 

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();


		} else if($perfil != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil = :$perfil OR $perfil1 = :$perfil1");

			$stmt -> bindParam(":".$perfil, $valor, PDO::PARAM_STR);
			$stmt -> bindParam(":".$perfil1, $valor1, PDO::PARAM_STR);

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
	ACTUALIZAR USUARIO
	=============================================*/

	static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;
 
	}

	/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function mdlEditarUsuario($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario2 = :usuario2 ,nombre = :nombre, password = :password, perfil = :perfil, foto = :foto, mostrar = :mostrar, nit = :nit , comercial = :comercial, idpadre = :idpadre WHERE id = :id");

		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_STR);
		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":usuario2", $datos["usuario2"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt -> bindParam(":mostrar", $datos["mostrar"], PDO::PARAM_STR);
		$stmt -> bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
		$stmt -> bindParam(":nit", $datos["nit"], PDO::PARAM_STR);
		$stmt -> bindParam(":comercial", $datos["comercial"], PDO::PARAM_STR);
		$stmt -> bindParam(":idpadre", $datos["idpadre"], PDO::PARAM_STR);
		

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function mdlBorrarUsuario($tabla, $datos){

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