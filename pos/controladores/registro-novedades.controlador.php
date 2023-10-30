<?php

class ControladorRegistroNovedades{

	/*=============================================
	CREAR REGISTRO DE NOVEDADES
	=============================================*/

	static public function ctrCrearRegistroNovedades(){

		if(isset($_POST["nuevoCodigo"])){

			if($_POST["nuevoCodigo"] && 
			   $_POST["nuevaDescripcionNovedad"] && 
               $_POST["nuevaHoraInicio"] && 
			   $_POST["nuevaHoraFin"] &&  
			   $_POST["nuevaFechaInicio"] && 
               $_POST["nuevaDependencia"] && 
               $_POST["nuevoRealizadoPor"]){

			   	$tabla = "registro_novedades";

                // Los datos se envian por medio de un array a los campos que tiene la tabla en la base de datos
			   	$datos = array("codigo"=>$_POST["nuevoCodigo"],
					           "descripcion_novedad"=>$_POST["nuevaDescripcionNovedad"],
                               "hora_inicio"=>$_POST["nuevaHoraInicio"],
                               "hora_fin"=>$_POST["nuevaHoraFin"],
                               "fecha_monitoria"=>$_POST["nuevaFechaInicio"],
                               "dependencia"=>$_POST["nuevaDependencia"],
                               "revisor"=>$_POST["nuevoRealizadoPor"],
                            );

			   	$respuesta = ModeloRegistroNovedades::mdlIngresarRegistroNovedades($tabla, $datos); // Pedimos al modelo la tabla y los datos

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El registro de novedades ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "registro-novedades";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El registro de novedades contiene errores de carácteres!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "registro-novedades";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	MOSTRAR REGISTRO DE NOVEDADES
	=============================================*/

	static public function ctrMostrarRegistroNovedades($item, $valor){

		$tabla = "registro_novedades";

		$respuesta = ModeloRegistroNovedades::mdlMostrarRegistroNovedades($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR REGISTRO DE NOVEDADES
	=============================================*/

	static public function ctrEditarRegistroNovedad(){

		if(isset($_POST["nuevoCodigo"])){

			if($_POST["nuevoCodigo"] && 
			   $_POST["nuevaDescripcionNovedad"] && 
               $_POST["nuevaHoraInicio"] && 
			   $_POST["nuevaHoraFin"] &&
			   $_POST["nuevoTelefono"] && 
			   $_POST["nuevaFechaInicio"] && 
               $_POST["nuevaDependencia"] && 
               $_POST["nuevoRealizadoPor"]){

			   	$tabla = "registro_novedades";

			   	$datos = array("codigo"=>$_POST["nuevoCodigo"],
					           "descripcion_novedad"=>$_POST["nuevaDescripcionNovedad"],
                               "hora_inicio"=>$_POST["nuevaHoraInicio"],
                               "hora_fin"=>$_POST["nuevaHoraFin"],
                               "fecha_monitoria"=>$_POST["nuevaFechaInicio"],
                               "dependencia"=>$_POST["nuevaDependencia"],
                               "revisor"=>$_POST["nuevoRealizadoPor"],
                            );

			   	$respuesta = ModeloRegistroNovedades::mdlEditarRegistroNovedades($tabla, $datos);

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
	ELIMINAR REGISTRO DE NOVEDADES
	=============================================*/

	static public function ctrEliminarRegistroNovedades(){

		if(isset($_GET["idCliente"])){

			$tabla ="registro_novedades";
			$datos = $_GET["nuevoCodigo"];

			$respuesta = ModeloRegistroNovedades::mdlEliminarRegistroNovedades($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El Monitor o Practicante ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "registro-novedades";

								}
							})

				</script>';

			}		

		}

	}

}