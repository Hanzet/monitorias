<?php

class ControladorClientes{

	/*=============================================
	CREAR CLIENTES
	=============================================*/

	static public function ctrCrearCliente(){

		if(isset($_POST["nuevoCliente"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCliente"]) && 
			   preg_match('/^[0-9]+$/', $_POST["nuevoDocumentoId"]) && 
               preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["nuevaDireccion"]) && 
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["nuevoEmail"]) && 
			   preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoTelefono"]) && 
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["nuevaCiudad"]) && 
               preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["nuevoPrograma"]) && 
               preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["nuevoRol"]) && 
               preg_match('/^[()\-0-9 ]+$/', $_POST["nuevaEdad"]) && 
               preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["nuevaFechaNacimiento"])){

			   	$tabla = "usuarios_monitores";

                // Los datos se envian por medio de un array a los campos que tiene la tabla en la base de datos
			   	$datos = array("nombre"=>$_POST["nuevoCliente"],
					           "documento"=>$_POST["nuevoDocumentoId"],
                               "direccion"=>$_POST["nuevaDireccion"],
                               "email"=>$_POST["nuevoEmail"],
                               "telefono"=>$_POST["nuevoTelefono"],
                               "programa"=>$_POST["nuevoPrograma"],
                               "tipo"=>$_POST["nuevoRol"],
                               "edad"=>$_POST["nuevaEdad"],
                               "ciudad"=>$_POST["nuevaCiudad"],
					           "fecha_nacimiento"=>$_POST["nuevaFechaNacimiento"],
                            );

			   	$respuesta = ModeloClientes::mdlIngresarCliente($tabla, $datos); // Pedimos al modelo la tabla y los datos

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Monitor o Practicante ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "usuarios-monitores-practicantes";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Monitor o Practicante contiene errores de carácteres!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "usuarios-monitores-practicantes";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	MOSTRAR CLIENTES
	=============================================*/

	static public function ctrMostrarClientes($item, $valor){

		$tabla = "usuarios_monitores";

		$respuesta = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR VALORES MONITORIAS 
	=============================================*/
	static public function ctrMostrarValoresMonitoria(){

		$tabla = "valor_monitoria";

		$respuesta = ModeloClientes::mdlMostrarValoresMonitorias($tabla);

		return $respuesta;

	}

	/*=============================================
	ACTUALIZAR VALORES MONITORIAS 
	=============================================*/

	static public function ctrUpdateValorTipoMonitoria(array $data){

			if(isset($_POST["valorMonitoria"])){
	
				if($_POST["valorMonitoria"]){
	
					   $tabla = "valor_monitoria";
	
					   $datos = array("id"=>$_POST["valorMonitoria"]);
	
					   $respuesta = ModeloClientes::mdlUpdateValueMonitoria($tabla, $datos);
	
					   if($respuesta == "ok"){
	
						echo'<script>
	
						swal({
							  type: "success",
							  title: "El valor de la monitoria ha sido cambiado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {
	
										window.location = "administrar-pago";
	
										}
									})
	
						</script>';
	
					}
	
				}else{
	
					echo'<script>
	
						swal({
							  type: "error",
							  title: "¡Error al momento de actualizar el valor de la monitoria!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {
	
								window.location = "administrar-pago";
	
								}
							})
	
					  </script>';
	
	
	
				}
	
			}
	
		}


	/*=============================================
	EDITAR CLIENTE
	=============================================*/

	static public function ctrEditarCliente(){

		if(isset($_POST["editarCliente"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCliente"]) && 
			   preg_match('/^[0-9]+$/', $_POST["editarDocumentoId"]) &&
               preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarEmail"]) && 
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["editarTelefono"]) && 
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDireccion"]) && 
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarPrograma"]) && 
               preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarRol"]) && 
               preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarEdad"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCiudad"]) &&
               preg_match('/^[()\-0-9 ]+$/', $_POST["editarFechaNacimiento"])){

			   	$tabla = "usuarios_monitores";

			   	$datos = array("nombre"=>$_POST["editarCliente"],
					           "documento"=>$_POST["editarDocumentoId"],
							   "ciudad"=>$_POST["editarCiudad"],
							   "email"=>$_POST["editarEmail"],
							   "telefono"=>$_POST["editarTelefono"],
                               "direccion"=>$_POST["editarDireccion"],
							   "fecha_nacimiento"=>$_POST["editarFechaNacimiento"],
							   "edad"=>$_POST["editarEdad"],
                               "programa"=>$_POST["editarPrograma"],
                               "tipo"=>$_POST["editarRol"],
                            );

			   	$respuesta = ModeloClientes::mdlEditarCliente($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Monitor o Practicante ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "usuarios-monitores-practicantes";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Monitor o Practicante no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "usuarios-monitores-practicantes";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	ELIMINAR MONITOR O PRACTICANTE
	=============================================*/

	static public function ctrEliminarCliente(){

		if(isset($_GET["idCliente"])){

			$tabla ="usuarios_monitores";
			$datos = $_GET["idCliente"];

			$respuesta = ModeloClientes::mdlEliminarCliente($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El Monitor o Practicante ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "usuarios-monitores-practicantes";

								}
							})

				</script>';

			}		

		}

	}

}