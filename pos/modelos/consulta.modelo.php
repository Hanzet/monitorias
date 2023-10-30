<?php

require_once "conexion.php";

class ConsultaModelo{

	/*=============================================
	MOSTRAR CONSULTA
	=============================================*/

	static public function obtenerConsultas($monitor, $fechaInicio, $fechaFin) {
        // Implementa la lógica para obtener consultas según los parámetros
        $query = "SELECT * FROM consultas WHERE monitor = :monitor AND fecha >= :fechaInicio AND fecha <= :fechaFin";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':monitor', $monitor);
        $stmt->bindParam(':fechaInicio', $fechaInicio);
        $stmt->bindParam(':fechaFin', $fechaFin);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}