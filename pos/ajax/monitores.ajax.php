<?php

require_once "../controladores/monitores.controlador.php";
require_once "../modelos/monitores.modelo.php";

class AjaxClientes{

	/*=============================================
	EDITAR MONITOR O PRACTICANTE
	=============================================*/	

	public $idCliente;

	public function ajaxEditarCliente(){

		$item = "id";
		$valor = $this->idCliente;

		$respuesta = ControladorClientes::ctrMostrarClientes($item, $valor);

		echo json_encode($respuesta);


	}

}

class AjaxValoresMonitorias{

	public function ajaxGetValoresMonitorias(){
		die(json_encode(ControladorClientes::ctrMostrarValoresMonitoria()));
	}

}

class AjaxUpdateValueMonitoria{

	public $idValueMonitoria;
	public $valueMonitoria;
	public $tipoMonitor;


	public function ajaxUpdateValueMonitoria() {

		$inactivaValueMonitoria    = null;		
		$insertNuevoValueMonitoria = null;		
	}
}

/*=============================================
EDITAR VALORES MONITORIA
=============================================*/	

if(isset($_POST["idCliente"])){

	$cliente = new AjaxClientes();
	$cliente -> idCliente = $_POST["idCliente"];
	$cliente -> ajaxEditarCliente();

}

if (isset($_GET['getValoresMonitoria'])) {
	$valoresMonitorias = new AjaxValoresMonitorias();
	$valoresMonitorias -> ajaxGetValoresMonitorias();
}

if (isset($_POST['idValorMonitoria'])) {

	$valueMonitoria = new AjaxUpdateValueMonitoria();

	$valueMonitoria -> idValueMonitoria = $_POST["idValorMonitoria"];
	$valueMonitoria -> valueMonitoria   = $_POST["valorMonitoria"];
	$valueMonitoria -> tipoMonitor      = $_POST["tipoMonitor"];

	$valueMonitoria -> ajaxUpdateValueMonitoria();

}