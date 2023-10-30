<?php
require_once 'consulta.modelo.php';

class ConsultaControlador {
    public function obtenerConsultas($monitor, $fechaInicio, $fechaFin) {
        $modelo = new ConsultaModelo();
        $resultados = $modelo->obtenerConsultas($monitor, $fechaInicio, $fechaFin);
        return $resultados;
    }
}
?>