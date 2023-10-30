<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Registro de novedades de monitoría
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Registro de novedades de monitoría</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-warning" data-toggle="modal" data-target="#modalAgregarRegistroNovedades">
          
          Agregar nuevo registro de monitoría

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Código</th>
           <th>Descripción novedad</th>
           <th>Hora de inicio</th>
           <th>Hora de fin</th>
           <th>Fecha de monitoría</th>
           <th>Dependencia</th> 
           <th>Realizado por</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $registro_novedades = ControladorRegistroNovedades::ctrMostrarRegistroNovedades($item, $valor);

          foreach ($registro_novedades as $key => $value) {
            

            echo '<tr>

                    <td>'.($key+1).'</td>

                    <td>'.$value["codigo"].'</td>

                    <td>'.$value["descripcion_novedad"].'</td>

                    <td>'.$value["hora_inicio"].'</td>

                    <td>'.$value["hora_fin"].'</td>

                    <td>'.$value["fecha_monitoria"].'</td>

                    <td>'.$value["dependencia"].'</td>             

                    <td>'.$value["revisor"].'</td>

                    <td>

                      </button>
                          
                        <button class="btn btn-warning btnEditarRegistroNovedades" data-toggle="modal" data-target="#modalEditarRegistroNovedades" nuevoCodigo="'.$value["id"].'"><i class="fa fa-pencil"></i></button>';

                      if($_SESSION["perfil"] == "Super-Administrador" || $_SESSION["perfil"] == "Administrador"){

                          echo '<button class="btn btn-danger btnEliminarRegistroNovedades" nuevoCodigo="'.$value["id"].'"><i class="fa fa-times"></i></button>';

                      }

                      echo '</div>  

                    </td>

                  </tr>';
          
            }

        ?>
   
        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR REGISTRO DE NOVEDAD
======================================-->

<div id="modalAgregarRegistroNovedades" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#ff851b; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar registro de novedad</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL CÓDIGO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCodigo" id="idCodigo" placeholder="Ingresar código" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DESCRIPCIÓN DE LA NOVEDAD -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" min="0" class="form-control input-lg" name="nuevaDescripcionNovedad" placeholder="Ingresar la descripción de la novedad" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA HORA DE INICIO -->
            
            <div class="form-group">

            <label for="">Ingresa la hora de inicio</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="time" class="form-control input-lg" name="nuevaHoraInicio" required>

              </div>

            </div>

              <!-- ENTRADA PARA LA HORA DE FIN -->
            
              <div class="form-group">

              <label for="">Ingresa la hora final</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="time" class="form-control input-lg" name="nuevaHoraFin" required>

              </div>

            </div>

            <!-- ENTRADA LA FECHA DE INICIO -->
            
            <div class="form-group">

            <label for="">Ingresa la fecha</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="date" class="form-control input-lg" name="nuevaFechaInicio" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA REALIZADO POR -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaDependencia" placeholder="Dependencia" required>

              </div>

            </div>

              <!-- ENTRADA REALIZADO POR -->
            
              <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoRealizadoPor" placeholder="Ingresa tu nombre" required>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-warning">Registrar novedad</button>

        </div>

      </form>

      <?php

        $crearRegistroNovedades = new ControladorRegistroNovedades();
        $crearRegistroNovedades -> ctrCrearRegistroNovedades();

      ?>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR REGISTRO DE NOVEDADES
======================================-->

<div id="modalEditarCliente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#ff851b; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar registro de novedades</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="editarCliente" id="editarCliente" required>
                <input type="hidden" id="idCliente" name="idCliente">
              </div>

            </div>

            <!-- ENTRADA PARA EL DOCUMENTO ID -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="number" min="0" class="form-control input-lg" name="editarDocumentoId" id="editarDocumentoId" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" name="editarEmail" id="editarEmail" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="text" class="form-control input-lg" name="editarTelefono" id="editarTelefono" data-inputmask="'mask':'(999) 999-9999'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="editarDireccion" id="editarDireccion"  required>

              </div>

            </div>

             <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="editarFechaNacimiento" id="editarFechaNacimiento"  data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      </form>

      <?php

          $crearRegistroNovedades = new ControladorRegistroNovedades();
          $crearRegistroNovedades -> ctrCrearRegistroNovedades();

        ?> 

    

    </div>

  </div>

</div>

<?php

  $eliminarCliente = new ControladorRegistroNovedades();
  $eliminarCliente -> ctrEliminarRegistroNovedades();

?>