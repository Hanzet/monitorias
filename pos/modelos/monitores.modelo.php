<?php

require_once "conexion.php";

class ModeloClientes{

	/*=============================================
	CREAR CLIENTE
	=============================================*/

	static public function mdlIngresarCliente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, documento, ciudad, email, telefono, direccion, fecha_nacimiento, programa, tipo, edad) VALUES (:nombre, :documento, :ciudad, :email, :telefono, :direccion, :fecha_nacimiento, :programa, :tipo, :edad)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR); // PDO::PARAM_STR -> STR: String
		$stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_INT); // PDO::PARAM_INT -> INT: Entero
		$stmt->bindParam(":ciudad", $datos["ciudad"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
		$stmt->bindParam(":programa", $datos["programa"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":edad", $datos["edad"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR MONITORES Y PRACTICANTES
	=============================================*/

	static public function mdlMostrarClientes($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR VALORES MONITORIAS
	=============================================*/
	static public function mdlMostrarValoresMonitorias($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estado");

		$stmt -> execute();

		return $stmt -> fetchAll();

	}

	static public function mdlUpdateValueMonitoria($idValorMonitoria){
		$stmt = Conexion::conectar()->prepare("UPDATE 'valor_monitoria' SET estado = :0 WHERE id = :id");

		$stmt -> bindParam(":id", $idValorMonitoria, PDO::PARAM_INT); // PDO::PARAM_STR -> STR: String

		$stmt->execute();

		if($stmt->execute() == false){

			return false;
		}

		$stmt = Conexion::conectar()->prepare("INSERT INTO 'valor_monitoria' (valor_hora, tipo) VALUES (:valor_hora, :tipo)");

		$stmt -> bindParam(":valor_hora", $idValorMonitoria, PDO::PARAM_INT);
		$stmt -> bindParam(":tipo", $idValorMonitoria, PDO::PARAM_INT);

		return $stmt->execute();
	}

	/*=============================================
	EDITAR MONITOR O PRACTICANTE
	=============================================*/

	static public function mdlEditarCliente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, documento = :documento, email = :email, telefono = :telefono, direccion = :direccion, fecha_nacimiento = :fecha_nacimiento, edad = :edad, programa = :programa, tipo = :tipo, ciudad = :ciudad WHERE id = :id");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR); // PDO::PARAM_STR -> STR: String
		$stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_INT); // PDO::PARAM_INT -> INT: Entero
		$stmt->bindParam(":ciudad", $datos["ciudad"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
		$stmt->bindParam(":programa", $datos["programa"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":edad", $datos["edad"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	ELIMINAR MONITOR O PRACTICANTE
	=============================================*/

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