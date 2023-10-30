<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar pago monitoria

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar pago monitoria</li>

    </ol>

  </section>

  <section class="content">

  <div class="box">

    <div class="container">
      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive" width="100%">

          <thead>
            <tr>

              <th style="width:10px">ID</th>
              <th>Tipo monitor</th>
              <th>Valor</th>
              <th>Vigencia</th>
              <th>Historial</th>
              <th>Actualizar</th>
            </tr>
          </thead>
          <tbody id="tbodyValoresMonitorias">
            <!-- <tr class="text-center">
                <td>1</td>
                <td>5.300</td>
                <td>Monitor</td>
                <td>2023-10-26 19:45</td>
                <td>
                  <button type="button" class="btn btn-info" onclick="">
                    <i class="fa fa-history" aria-hidden="true"></i>
                  </button>
                </td>
                <td>
                  <button type="button" class="btn btn-warning" onclick="">
                    <i class="fa fa-pencil"></i>
                  </button>
                </td>
            </tr> -->
          </tbody>
        </table>
      </div>
    </div>
  </section>

</div>

<!--=====================================
MODAL AGREGAR CLIENTE
======================================-->

<div id="modalUpdateValor" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" id="formUpdateValorMonitoria">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#ff851b; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Actualizar valor pago</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL TIPO MONITOR -->

            <div class="form-group">

              <label for="">Tipo de monitor</label>
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="tipoMonitor" id="tipoMonitor" placeholder="Tipo de monitor" disabled required>

              </div>

            </div>

            <!-- ENTRADA PARA FECHA ULTIMA ACTUALIZACIÓN -->

            <div class="form-group">

              <label for="">Ultima actualización</label>
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="text" class="form-control input-lg" id="fechaValor" placeholder="Fecha" disabled required>

              </div>

            </div>

            <!-- ENTRADA PARA EL VALOR DE LA MONITORIA -->

            <div class="form-group">

              <label for="">Valor monitoria</label>
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-money"></i></span>

                <input type="number" min="1" class="form-control input-lg" id="valorMonitoria" name="valorMonitoria" placeholder="Ingresar documento" required>
              </div>

            </div>

            <input type="hidden" name="idValorMonitoria" id="idValorMonitoria">

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-warning">Actualizar valor</button>

        </div>

      </form>

    </div>

  </div>

</div>

<script>
  const formatoColombiano = new Intl.NumberFormat('es-CO', {
    style: 'currency',
    currency: 'COP'
  });

  $(document).ready(function() {

    getValuesMonitorias().catch((error) => {
      console.log('Un error: ', error);
    });


    $('#formUpdateValorMonitoria').submit(function(e) {
      e.preventDefault();

      const CONTEXT = $(this);

      const DATA_FORM = CONTEXT.serializeArray();

      DATA_FORM.push({name: 'tipoMonitor', value : $("#tipoMonitor").val()});


      $.ajax({
        url: 'ajax/monitores.ajax.php',
        type: 'POST',
        data: DATA_FORM
      }).then(response => {
        
      });

    });




  });

  function getValuesMonitorias() {
    return new Promise((resolve, reject) => {

      $.ajax({
        url: 'ajax/monitores.ajax.php',
        type: 'GET',
        data: {
          getValoresMonitoria: true
        },
        dataType: "json"
      }).then(response => {

        $("#tbodyValoresMonitorias").html('');

        response.map((row, index) => {

          const {
            id,
            tipo,
            valor_hora,
            fecha
          } = row;

          $("#tbodyValoresMonitorias").append(`
            <tr class="">
                <td>${id}</td>
                <td>${tipo}</td>
                <td>${formatoColombiano.format(valor_hora)}</td>
                <td>${fecha}</td>
                <td>
                  <button id="btnLog${id}" type="button" class="btn btn-info" onclick="">
                    <i class="fa fa-history" aria-hidden="true"></i>
                  </button>
                </td>
                <td>
                  <button id="btnUpdate${id}" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalUpdateValor" 
                  onclick="loadDataModal('${tipo}', '${fecha}', '${valorMonitoria}', ${id})">
                    <i class="fa fa-pencil"></i>
                  </button>
                </td>
            </tr>
          `);

        });

        resolve(response);

      }).fail(error => {

        reject(error);

      });

    });
  }

  function loadDataModal(tipoMonitor, fechaValor, valorMonitoria, idValorMonitoria) {

    $("#tipoMonitor, #fechaValor, #idValorMonitoria").val('');

    $("#tipoMonitor").val(tipoMonitor);
    $("#fechaValor").val(fechaValor);
    $("#idValorMonitoria").val(idValorMonitoria);

  }


</script>