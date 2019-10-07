<?php

require_once "conexion.php";  
   
class ModeloVentas{      
 
 
	/*=============================================   
	CREAR VENTAS     
	=============================================*/ 
 
	static public function mdlIngresarVentas($tabla, $datos){ 
 
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(cliente,vendedor,simcard, tipoplan,fechallegada,fecharegreso,fechaventa,imei,observacion,valor,estado,codigo,agrego,celular,email,pasaporte,agregopadre,destino,horaingreso,horacierre,dias,coordinador) VALUES (:cliente,:vendedor, :simcard, :tipoplan, :fechallegada,:fecharegreso,:fechaventa,:imei,:observacion,:valor,:estado,:codigo,:agrego,:celular,:email,:pasaporte,:agregopadre,:destino,:horaingreso,:horacierre,:dias,:coordinador)");

		//var_dump($stmt);

		$stmt->bindParam(":cliente", $datos["cliente"], PDO::PARAM_STR);
		$stmt->bindParam(":vendedor", $datos["vendedor"], PDO::PARAM_STR);
		$stmt->bindParam(":simcard", $datos["simcard"], PDO::PARAM_STR);
		$stmt->bindParam(":tipoplan", $datos["tipoplan"], PDO::PARAM_STR);
		$stmt->bindParam(":fechallegada", $datos["fechallegada"], PDO::PARAM_STR);
		$stmt->bindParam(":fecharegreso", $datos["fecharegreso"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaventa", $datos["fechaventa"], PDO::PARAM_STR);
		$stmt->bindParam(":imei", $datos["imei"], PDO::PARAM_STR);
		$stmt->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);
		$stmt->bindParam(":valor", $datos["valor"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":agrego", $datos["agrego"], PDO::PARAM_STR);
		$stmt->bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":pasaporte", $datos["pasaporte"], PDO::PARAM_STR);
		$stmt->bindParam(":agregopadre", $datos["agregopadre"], PDO::PARAM_STR);
		$stmt->bindParam(":destino", $datos["destino"], PDO::PARAM_STR);
		$stmt->bindParam(":horaingreso", $datos["horaingreso"], PDO::PARAM_STR);
		$stmt->bindParam(":horacierre", $datos["horacierre"], PDO::PARAM_STR);
		$stmt->bindParam(":dias", $datos["dias"], PDO::PARAM_STR);
		$stmt->bindParam(":coordinador", $datos["coordinador"], PDO::PARAM_STR);



		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


		//Editar Ventas
	static public function mdlEditarVentas($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET cliente = :cliente, simcard = :simcard, tipoplan = :tipoplan, fechallegada = :fechallegada,fecharegreso = :fecharegreso,fechaventa = :fechaventa, imei = :imei,observacion = :observacion,valor = :valor,celular = :celular, email = :email, pasaporte = :pasaporte, destino = :destino, horaingreso = :horaingreso, horacierre = :horacierre, dias = :dias  WHERE id = :id");
 
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_STR);
		$stmt -> bindParam(":cliente", $datos["cliente"], PDO::PARAM_STR);
		$stmt -> bindParam(":simcard", $datos["simcard"], PDO::PARAM_STR);
		$stmt -> bindParam(":tipoplan", $datos["tipoplan"], PDO::PARAM_STR);
		$stmt -> bindParam(":fechallegada", $datos["fechallegada"], PDO::PARAM_STR);
		$stmt -> bindParam(":fecharegreso", $datos["fecharegreso"], PDO::PARAM_STR);
		$stmt -> bindParam(":fechaventa", $datos["fechaventa"], PDO::PARAM_STR);
		$stmt -> bindParam(":imei", $datos["imei"], PDO::PARAM_STR);
		$stmt -> bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);
		$stmt -> bindParam(":valor", $datos["valor"], PDO::PARAM_STR);
		$stmt -> bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt -> bindParam(":pasaporte", $datos["pasaporte"], PDO::PARAM_STR);
		$stmt -> bindParam(":destino", $datos["destino"], PDO::PARAM_STR);
		$stmt -> bindParam(":horaingreso", $datos["horaingreso"], PDO::PARAM_STR);
		$stmt -> bindParam(":horacierre", $datos["horacierre"], PDO::PARAM_STR);
		$stmt -> bindParam(":dias", $datos["dias"], PDO::PARAM_STR);
		

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
	static public function mdlMostrarVentas($tabla, $item, $valor,$item1,$valor3){

	if($item != null){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
		
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch(); 

	} else if ($item1 != null) {

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item1 = :$item1");

		$stmt -> bindParam(":".$item1, $valor3, PDO::PARAM_STR);

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
	static public function mdlEliminarVentas($tabla, $datos){

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
	
	
		/*=============================================
	ACTUALIZAR VENTAS POR FECHA
	=============================================*/

	static public function mdlActualizarVentasPorFecha($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2 OR CURDATE() > fecharegreso");

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
	ACTUALIZAR VENTAS
	=============================================*/

	static public function mdlActualizarVentas($tabla, $item1, $valor1, $item2, $valor2){

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
	CREAR LINEA DEL EXTERIOR 
	=============================================*/

	static public function mdlActualizarVentasLinea($tabla, $item1, $valor1, $item2, $valor2){

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
	RANGO FECHAS PARA LA VISTA DE VENTAS
	=============================================*/	

	static public function mdlRangoFechasVentas($tabla, $fechaInicial, $fechaFinal,$valor,$perfil,$valor1,$perfil1){

		if ($perfil != null) {

			if($fechaInicial == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil = :perfil");

			$stmt -> bindParam(":perfil", $valor, PDO::PARAM_STR);
 
			$stmt -> execute();

			return $stmt -> fetchAll();
 

		}
		else if($fechaInicial == $fechaFinal){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil = :perfil AND fechaventa like '%$fechaFinal%'");

			$stmt -> bindParam(":perfil", $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
		else{

			$fechaActual = new DateTime();
			$fechaActual ->add(new DateInterval("P1D"));
			$fechaActualMasUno = $fechaActual->format("Y-m-d");
 
			$fechaFinal2 = new DateTime($fechaFinal);
			$fechaFinal2 ->add(new DateInterval("P1D"));
			$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

			if($fechaFinalMasUno == $fechaActualMasUno){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil = :perfil AND fechaventa BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'");

					$stmt -> bindParam(":perfil", $valor, PDO::PARAM_STR);
 		
					$stmt -> execute();
		
					return $stmt -> fetchAll(); 

			}else{


				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil = :perfil AND fechaventa BETWEEN '$fechaInicial' AND '$fechaFinal'");

					$stmt -> bindParam(":perfil", $valor, PDO::PARAM_STR);
 		
					$stmt -> execute();
		
					return $stmt -> fetchAll();

			}
		}

		}else if ($perfil1 != "") {

			if($fechaInicial == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE  $perfil1 = :perfil1");

			$stmt -> bindParam(":perfil1", $valor1, PDO::PARAM_STR);
 
			$stmt -> execute();

			return $stmt -> fetchAll();
 

		}
		else if($fechaInicial == $fechaFinal){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil1 = :perfil1 AND fechaventa like '%$fechaFinal%'");

			$stmt -> bindParam(":perfil1", $valor1, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
		else{

			$fechaActual = new DateTime();
			$fechaActual ->add(new DateInterval("P1D"));
			$fechaActualMasUno = $fechaActual->format("Y-m-d");

			$fechaFinal2 = new DateTime($fechaFinal);
			$fechaFinal2 ->add(new DateInterval("P1D"));
			$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

			if($fechaFinalMasUno == $fechaActualMasUno){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil1 = :perfil1 AND fechaventa BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'");

					$stmt -> bindParam(":perfil1", $valor1, PDO::PARAM_STR);
 		
					$stmt -> execute();
		
					return $stmt -> fetchAll();

			}else{


				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil1 = :perfil1 AND fechallegada BETWEEN '$fechaInicial' AND '$fechaFinal'");

					$stmt -> bindParam(":perfil1", $valor1, PDO::PARAM_STR);
 		
					$stmt -> execute();
		
					return $stmt -> fetchAll();

			}
		}
			
		}else{

		if($fechaInicial == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");

			$stmt -> execute();

			return $stmt -> fetchAll();	


		}else if($fechaInicial == $fechaFinal){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fechaventa like '%$fechaFinal%'");

			$stmt -> bindParam(":fechaventa", $fechaFinal, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$fechaActual = new DateTime();
			$fechaActual ->add(new DateInterval("P1D"));
			$fechaActualMasUno = $fechaActual->format("Y-m-d");

			$fechaFinal2 = new DateTime($fechaFinal);
			$fechaFinal2 ->add(new DateInterval("P1D"));
			$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

			if($fechaFinalMasUno == $fechaActualMasUno){ 

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fechaventa BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'");

			}else{


				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fechaventa BETWEEN '$fechaInicial' AND '$fechaFinal'");

			}
		
			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		}

	}


	/*=============================================
	RANGO FECHAS PARA LA VISTA DE CRONOGRAMAS
	=============================================*/	

	static public function mdlRangoFechasVentasCronograma($tabla, $fechaInicial, $fechaFinal,$valor,$perfil,$valor1,$perfil1){

		if ($perfil != null) {

			if($fechaInicial == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE  $perfil = :perfil");

			$stmt -> bindParam(":perfil", $valor, PDO::PARAM_STR);
 
			$stmt -> execute();

			return $stmt -> fetchAll();
 

		}
		else if($fechaInicial == $fechaFinal){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil = :perfil AND fechallegada like '%$fechaFinal%'");

			$stmt -> bindParam(":perfil", $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
		else{

			$fechaActual = new DateTime();
			$fechaActual ->add(new DateInterval("P1D"));
			$fechaActualMasUno = $fechaActual->format("Y-m-d");

			$fechaFinal2 = new DateTime($fechaFinal);
			$fechaFinal2 ->add(new DateInterval("P1D"));
			$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

			if($fechaFinalMasUno == $fechaActualMasUno){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil = :perfil AND fechallegada BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'");

					$stmt -> bindParam(":perfil", $valor, PDO::PARAM_STR);
 		
					$stmt -> execute();
		
					return $stmt -> fetchAll();

			}else{


				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil = :perfil AND fechallegada BETWEEN '$fechaInicial' AND '$fechaFinal'");

					$stmt -> bindParam(":perfil", $valor, PDO::PARAM_STR);
 		
					$stmt -> execute();
		
					return $stmt -> fetchAll();

			}
		}

		}else if ($perfil1 != "") {

			if($fechaInicial == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE  $perfil1 = :perfil1");

			$stmt -> bindParam(":perfil1", $valor1, PDO::PARAM_STR);
 
			$stmt -> execute();

			return $stmt -> fetchAll();
 

		}
		else if($fechaInicial == $fechaFinal){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil1 = :perfil1 AND fechallegada like '%$fechaFinal%'");

			$stmt -> bindParam(":perfil1", $valor1, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
		else{

			$fechaActual = new DateTime();
			$fechaActual ->add(new DateInterval("P1D"));
			$fechaActualMasUno = $fechaActual->format("Y-m-d");

			$fechaFinal2 = new DateTime($fechaFinal);
			$fechaFinal2 ->add(new DateInterval("P1D"));
			$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

			if($fechaFinalMasUno == $fechaActualMasUno){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil1 = :perfil1 AND fechallegada BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'");

					$stmt -> bindParam(":perfil1", $valor1, PDO::PARAM_STR);
 		
					$stmt -> execute();
		
					return $stmt -> fetchAll();

			}else{


				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $perfil1 = :perfil1 AND fechallegada BETWEEN '$fechaInicial' AND '$fechaFinal'");

					$stmt -> bindParam(":perfil1", $valor1, PDO::PARAM_STR);
 		
					$stmt -> execute();
		
					return $stmt -> fetchAll();

			}
		}
			
		}else{

		if($fechaInicial == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");

			$stmt -> execute();

			return $stmt -> fetchAll();	


		}else if($fechaInicial == $fechaFinal){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fechallegada like '%$fechaFinal%'");

			$stmt -> bindParam(":fechaventa", $fechaFinal, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$fechaActual = new DateTime();
			$fechaActual ->add(new DateInterval("P1D"));
			$fechaActualMasUno = $fechaActual->format("Y-m-d");

			$fechaFinal2 = new DateTime($fechaFinal);
			$fechaFinal2 ->add(new DateInterval("P1D"));
			$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

			if($fechaFinalMasUno == $fechaActualMasUno){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fechallegada BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'");

			}else{


				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fechallegada BETWEEN '$fechaInicial' AND '$fechaFinal'");

			}
		
			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		}
 
	} 




	/*=============================================
	CONTAR LOS TIPOS DE PLANES
	=============================================*/	

	static public function mdlContarTiposPlanes($tabla,$perfil,$valor){ 

		if ($perfil != null) { 

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(numero) AS cantidad, tipoplan FROM $tabla WHERE numero=0 AND $perfil = :perfil GROUP BY tipoplan");

			$stmt -> bindParam(":perfil", $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{		

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(numero) AS cantidad, tipoplan  FROM $tabla WHERE numero=0 GROUP BY tipoplan");
	
			$stmt -> execute();
	
			return $stmt -> fetchAll();

		} 

		$stmt -> close(); 

		$stmt = null;
	} 



		/*=============================================
	SUMAR LOS TIPOS DE PLANES
	=============================================*/	

	static public function mdlSumarPlanesTodos($tabla,$perfil,$valor,$perfil1,$valor1){ 

		if ($perfil != null) { 

			$stmt = Conexion::conectar()->prepare("SELECT SUM(valor) AS valor,tipoplan,destino FROM $tabla WHERE numero=0 AND $perfil = :perfil GROUP BY tipoplan");

			$stmt -> bindParam(":perfil", $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else if($perfil1 != null){

			$stmt = Conexion::conectar()->prepare("SELECT SUM(valor) AS valor,tipoplan,destino FROM $tabla WHERE numero=0 AND $perfil1 = :perfil1 GROUP BY tipoplan");

			$stmt -> bindParam(":perfil1", $valor1, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{		

			$stmt = Conexion::conectar()->prepare("SELECT SUM(valor) AS valor,tipoplan,destino FROM $tabla WHERE numero=0 GROUP BY tipoplan");
	
			$stmt -> execute();
	
			return $stmt -> fetchAll();

		} 

		$stmt -> close(); 

		$stmt = null;
	} 



	/*=============================================
	CONTAR DESTINOS
	=============================================*/	

	static public function mdlContarDestino($tabla,$perfil,$valor){ 

		if ($perfil != null) { 

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(numero) AS cantidad, destino FROM $tabla WHERE numero=0 AND $perfil = :perfil GROUP BY destino");

			$stmt -> bindParam(":perfil", $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{		

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(numero) AS cantidad, destino  FROM $tabla WHERE numero=0 GROUP BY destino");
	
			$stmt -> execute();
	
			return $stmt -> fetchAll();

		} 

		$stmt -> close(); 

		$stmt = null;
	} 



	/*=============================================
	SUMAR LAS VENTAS DE CADA VENDEDOR
	=============================================*/	

	static public function mdlSumarVentasVendedor($tabla,$perfil,$valor){ 

		if ($perfil != null) { 

			$stmt = Conexion::conectar()->prepare("SELECT SUM(valor) AS valor,vendedor FROM $tabla WHERE numero=0 AND $perfil = :perfil GROUP BY vendedor");

			$stmt -> bindParam(":perfil", $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{		

			$stmt = Conexion::conectar()->prepare("SELECT SUM(valor) AS valor,vendedor FROM $tabla WHERE numero=0 GROUP BY vendedor");
	
			$stmt -> execute();
	
			return $stmt -> fetchAll();

		} 

		$stmt -> close(); 

		$stmt = null;
	} 



		/*=============================================
	SUMAR LAS VENTAS DE CADA CLIENTE
	=============================================*/	

	static public function mdlSumarVentasClientes($tabla,$perfil,$valor){ 

		if ($perfil != null) { 

			$stmt = Conexion::conectar()->prepare("SELECT SUM(valor) AS valor,cliente FROM $tabla WHERE numero=0 AND $perfil = :perfil GROUP BY cliente");

			$stmt -> bindParam(":perfil", $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{		

			$stmt = Conexion::conectar()->prepare("SELECT SUM(valor) AS valor,cliente FROM $tabla WHERE numero=0 GROUP BY cliente");
	
			$stmt -> execute();
	
			return $stmt -> fetchAll();

		} 

		$stmt -> close(); 

		$stmt = null;
	} 

	/*=============================================
	//CONTAR NUMERO DE SIMCARDS ACTIVAS
	=============================================*/	

	static public function mdlContarSimcards($tabla,$perfil,$valor){ 

		if ($perfil != null) {  

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(numero) AS cantidad, estado FROM $tabla WHERE numero=0 AND $perfil = :perfil GROUP BY estado");

			$stmt -> bindParam(":perfil", $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{		

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(numero) AS cantidad, estado  FROM $tabla WHERE numero=0 GROUP BY estado");
	
			$stmt -> execute();
	
			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;
	}

	/*=============================================
	SUMAR EL TOTAL DE VENTAS
	=============================================*/

	static public function mdlSumaTotalVentas($tabla,$item,$valor){	

		if ($item != null) { 

			$stmt = Conexion::conectar()->prepare("SELECT SUM(valor) as total FROM $tabla WHERE $item = :item");

			$stmt -> bindParam(":item", $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT SUM(valor) as total FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetch();

		}


		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	SUMAR EL TOTAL DE VENTAS HOY
	=============================================*/

	static public function mdlSumaTotalVentasHoy($tabla,$item,$valor){	

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT SUM(valor) AS total FROM $tabla WHERE $item = :item AND fechaventa = CURDATE()");

			$stmt -> bindParam(":item", $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT SUM(valor) AS total FROM $tabla WHERE fechaventa = CURDATE()");

			$stmt -> execute();

			return $stmt -> fetch();
		}

			
		

		$stmt -> close();

		$stmt = null;

	}





	/*=============================================
	//MOSTRAR VENTAS DE HOY
	=============================================*/

	static public function mdlMostrarVentasHoy($tabla,$item,$valor,$item1,$valor1){	

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :item AND fechallegada = CURDATE() AND estado = 'desactivado'");

			$stmt -> bindParam(":item", $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else if($item1 != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item1 = :item1 AND fechallegada = CURDATE() AND estado = 'desactivado'");

			$stmt -> bindParam(":item1", $valor1, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fechallegada = CURDATE() AND estado = 'desactivado'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}

			
		

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	SUMAR EL TOTAL DE VENTAS MES
	=============================================*/

	static public function mdlSumaTotalVentasMes($tabla,$item,$valor){	

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT SUM(valor) AS total FROM $tabla WHERE $item = :item AND date_format(fechaventa, '%m') = MONTH (NOW())");

			$stmt -> bindParam(":item", $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{
			$stmt = Conexion::conectar()->prepare("SELECT SUM(valor) AS total FROM $tabla WHERE date_format(fechaventa, '%m') = MONTH (NOW())");

			$stmt -> execute();

			return $stmt -> fetch();

		}

		

		$stmt -> close();

		$stmt = null;

	}


}