<?php

require_once "conexion.php";

class ModeloRegistroNovedades{

	/*=============================================
	CREAR REGISTRO DE NOVEDADES
	=============================================*/

	static public function mdlIngresarRegistroNovedades($tabla, $datos){
		
		// $documentoMonitor = $datos["codigo"];
		// $stmt = Conexion::conectar()->prepare("SELECT * FROM usuarios_monitores WHERE documento = $documentoMonitor LIMIT 1");
		// $stmt->execute();
		// $usuarioMonitor = $stmt ->fetchObject();

		// $stmt = Conexion::conectar()->prepare("SELECT * FROM valor_monitoria WHERE tipo = '{$usuarioMonitor->tipo}' order by fecha DESC limit 1");
		// $stmt->execute();
		// $valorHora = $stmt ->fetchObject();

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo, descripcion_novedad, hora_inicio, hora_fin, fecha_monitoria, dependencia, revisor) VALUES (:codigo, :descripcion_novedad, :hora_inicio, :hora_fin, :fecha_monitoria, :dependencia, :revisor)");

		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
		$stmt->bindParam(":descripcion_novedad", $datos["descripcion_novedad"], PDO::PARAM_STR);
		$stmt->bindParam(":hora_inicio", $datos["hora_inicio"], PDO::PARAM_INT);
		$stmt->bindParam(":hora_fin", $datos["hora_fin"], PDO::PARAM_INT);
		$stmt->bindParam(":fecha_monitoria", $datos["fecha_monitoria"], PDO::PARAM_INT);
		$stmt->bindParam(":dependencia", $datos["dependencia"], PDO::PARAM_STR);
		$stmt->bindParam(":revisor", $datos["revisor"], PDO::PARAM_STR);
		// $stmt->bindParam(":valor_hora_id", $valorHora-> id, PDO::PARAM_INT);

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

	static public function mdlMostrarRegistroNovedades($tabla, $item, $valor){

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
	EDITAR REGISTRO DE NOVEDADES
	=============================================*/

	static public function mdlEditarRegistroNovedades($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET codigo = :codigo, descripcion_novedad = :descripcion_novedad, hora_inicio = :hora_inicio, hora_fin = :hora_fin, fecha_monitoria = :fecha_monitoria, dependencia = :dependencia, revisor = :revisor WHERE id = :id");

		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR); // PDO::PARAM_STR -> STR: String
		$stmt->bindParam(":descripcion_novedad", $datos["descripcion_novedad"], PDO::PARAM_STR); // PDO::PARAM_INT -> INT: Entero
		$stmt->bindParam(":hora_inicio", $datos["hora_inicio"], PDO::PARAM_STR);
		$stmt->bindParam(":hora_fin", $datos["hora_fin"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_monitoria", $datos["fecha_monitoria"], PDO::PARAM_STR);
		$stmt->bindParam(":dependencia", $datos["dependencia"], PDO::PARAM_STR);
		$stmt->bindParam(":revisor", $datos["revisor"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	ELIMINAR REGISTRO DE NOVEDADES
	=============================================*/

	static public function mdlEliminarRegistroNovedades($tabla, $datos){

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