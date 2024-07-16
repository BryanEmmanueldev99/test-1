<?php
include('../app/config.php');
include('../layaout/sesion.php');
include('../auth/staff_de_ventas.php');
include('../app/controllers/proveedores/listado_de_proveedores.php');
include('../layaout/parte1.php');
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Listado de proveedores</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Proveedores registrados</a></li>
            <li class="breadcrumb-item active">Proveedores</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Visualización</h3>
        </div>



        <!--new data table-->
        <!-- /.card-header -->
        <div class="card-body shadow-sm rounded">
          <div class="btn-add mb-4">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-proveedor">
              <i class="fa fa-plus"></i> Agregar Proveedor
            </button>
          </div>
          <table id="example1" class="table table-bordered table-striped text-center table-sm">
            <thead>
              <tr>
                <th style="width: 10px">Nro</th>
                <th>Nombre del proveedor</th>
                <th>Celular</th>
                <th>Telefono</th>
                <th>Empresa</th>
                <th>Dirección</th>
                <th>Correo electrónico</th>
                <th>Acciones</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $id_front_end = 0;
              foreach ($proveedores_info as $proveedor) {
                $id_proveedor_DAO = $proveedor['id_proveedor'];
                $proveedor_DAO = $proveedor['nombre_proveedor'];
              ?>
                <tr>
                  <td><?= $id_front_end = $id_front_end + 1; ?></td>
                  <td><?= $proveedor['nombre_proveedor']; ?></td>
                  <td>
                      <div class="d-flex" style="gap: 5px; justify-content:center;">
                      <p><?= $proveedor['celular']; ?></p>
                       <a href="https://wa.me/<?= $proveedor['celular']; ?>" target="_blank" rel="noopener noreferrer">
                       <svg class="icono-proveedor-ws" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#09be88" d="M92.1 254.6c0 24.9 7 49.2 20.2 70.1l3.1 5-13.3 48.6L152 365.2l4.8 2.9c20.2 12 43.4 18.4 67.1 18.4h.1c72.6 0 133.3-59.1 133.3-131.8c0-35.2-15.2-68.3-40.1-93.2c-25-25-58-38.7-93.2-38.7c-72.7 0-131.8 59.1-131.9 131.8zM274.8 330c-12.6 1.9-22.4 .9-47.5-9.9c-36.8-15.9-61.8-51.5-66.9-58.7c-.4-.6-.7-.9-.8-1.1c-2-2.6-16.2-21.5-16.2-41c0-18.4 9-27.9 13.2-32.3c.3-.3 .5-.5 .7-.8c3.6-4 7.9-5 10.6-5c2.6 0 5.3 0 7.6 .1c.3 0 .5 0 .8 0c2.3 0 5.2 0 8.1 6.8c1.2 2.9 3 7.3 4.9 11.8c3.3 8 6.7 16.3 7.3 17.6c1 2 1.7 4.3 .3 6.9c-3.4 6.8-6.9 10.4-9.3 13c-3.1 3.2-4.5 4.7-2.3 8.6c15.3 26.3 30.6 35.4 53.9 47.1c4 2 6.3 1.7 8.6-1c2.3-2.6 9.9-11.6 12.5-15.5c2.6-4 5.3-3.3 8.9-2s23.1 10.9 27.1 12.9c.8 .4 1.5 .7 2.1 1c2.8 1.4 4.7 2.3 5.5 3.6c.9 1.9 .9 9.9-2.4 19.1c-3.3 9.3-19.1 17.7-26.7 18.8zM448 96c0-35.3-28.7-64-64-64H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96zM148.1 393.9L64 416l22.5-82.2c-13.9-24-21.2-51.3-21.2-79.3C65.4 167.1 136.5 96 223.9 96c42.4 0 82.2 16.5 112.2 46.5c29.9 30 47.9 69.8 47.9 112.2c0 87.4-72.7 158.5-160.1 158.5c-26.6 0-52.7-6.7-75.8-19.3z"/></svg>
                       </a>
                      </div>
                  </td>
                  <td><?= $proveedor['telefono']; ?></td>
                  <td><?= $proveedor['empresa']; ?></td>
                  <td><?= $proveedor['direccion']; ?></td>
                  <td><?= $proveedor['email_proveedor']; ?></td>
                 
                  <td>
                    <div class="btn-group">

                      <a href="<?= $url; ?>proveedores/update.php?id=<?php echo $id_proveedor_DAO; ?>" class="btn btn-primary btn-sm">
                        <i class="fa fa-pencil-alt"></i> Editar
                      </a>
                      <a id="#btn-delete-proveedor" href="<?= $url; ?>proveedores/delete.php?id=<?php echo $id_proveedor_DAO; ?>" class="btn btn-primary btn-sm">
                        <i class="fa fa-trash-alt"></i> Borrar
                      </a>
                    </div>
                  </td>
                </tr>
              <?php } ?>

            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>



      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
  <div class="p-3">
    <h5>Title</h5>
    <p>Sidebar content</p>
  </div>
</aside>
<!-- /.control-sidebar -->




<?php
include('../layaout/mensajes.php');
include('../layaout/parte2.php');
?>


<!-- Page specific script -->
<script>
  $("#example1").DataTable({
    "pageLength": 5,
    "language": {
      "emptyTable": "No hay información",
      "info": "Mostrando _START_ a _END_ de _TOTAL_ Proveedores",
      "infoEmpty": "Mostrando 0 a 0 de 0 Proveedores",
      "infoFiltered": "(Filtrado de _MAX_ total Proveedores)",
      "infoPostFix": "",
      "thousands": ",",
      "lengthMenu": "Mostrar _MENU_ Generar Reportes",
      "loadingRecords": "Cargando...",
      "processing": "Procesando...",
      "search": "Buscador:",
      "zeroRecords": "Sin resultados encontrados",
      "paginate": {
        "first": "Primero",
        "last": "Ultimo",
        "next": "Siguiente",
        "previous": "Anterior"
      }
    },
    "responsive": true,
    "lengthChange": true,
    "autoWidth": false,
    "buttons": ["copy", "csv", "excel", "pdf", "print"]
  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
</script>

<!--modal para registrar proveedores-->
<div class="modal fade" id="modal-create-proveedor">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Crear nuevo proveedor</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../app/controllers/proveedores/create.php" method="post">
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="" class="form-label">Nombre del proveedor:</label><b style="color: red;" class="red">*</b>

                <input type="text" class="form-control" name="nombre_proveedor" id="nombre_proveedor" placeholder="Agrega el nombre del proveedor" required />
                <small style="color:red; display:none;" id="validate_create_proveedor">*Este campo es requerido.</small>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label for="" class="form-label">Celular:</label><b style="color: red;" class="red">*</b>
                <input type="number" class="form-control" name="celular" id="celular" placeholder="Número de celular" required />
                <small style="color:red; display:none;" id="validate_create_celular">*Este campo es requerido.</small>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label for="" class="form-label">Telefono:</label> <b> (Opcional)</b>

                <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Número telefónico" />
              </div>
            </div>


            <div class="col-md-6">
              <div class="mb-3">
                <label for="" class="form-label">Correo electronico:</label> <b> (Opcional)</b>

                <input type="email" class="form-control" name="email_proveedor" id="email_proveedor" placeholder="Correo electrónico" />
              </div>
            </div>


            <div class="col-md-6">
              <div class="mb-3">
                <label for="" class="form-label">Nombre de la empresa:</label><b style="color:red;">*</b>

                <input type="text" class="form-control" name="empresa" id="empresa" placeholder="Empresa" required />
                <small style="color:red; display:none;" id="validate_create_empresa">*Este campo es requerido.</small>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label for="" class="form-label">Dirección:</label><b style="color:red;">*</b>

                <textarea class="form-control" name="direccion" id="direccion" placeholder="Dirección del proveedor" required></textarea>

                <small style="color:red; display:none;" id="validate_create_direccion">*Este campo es requerido.</small>
              </div>
            </div>

          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btn_create_proveedores">Confirmar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          </div>

          <div class="respuesta" id="respuesta"></div>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<script>
  $('#btn_create_proveedores').click(function() {

    var nombre_proveedor = $('#nombre_proveedor').val();
    var celular = $('#celular').val();
    var telefono = $('#telefono').val();
    var direccion = $('#direccion').val();
    var email_proveedor = $('#email_proveedor').val();
    var empresa = $('#empresa').val();


    if (nombre_proveedor == "") {
      $('#nombre_proveedor').focus();
      $('#validate_create_proveedor').css('display', 'block');
    } else if (celular == "") {
      $('#celular').focus();
      $('#validate_create_celular').css('display', 'block');
    } else if (direccion == "") {
      $('#direccion').focus();
      $('#validate_create_direccion').css('display', 'block');
    } else if (empresa == "") {
      $('#empresa').focus();
      $('#validate_create_empresa').css('display', 'block');
    } else {
      /* pendiente de cambios
      var url_proveedores = "../app/controllers/proveedores/create.php";
      $.get(url_proveedores,{nombre_proveedor:nombre_proveedor,celular:celular,telefono:telefono,empresa:empresa,email_proveedor:email_proveedor,direccion:direccion},function (datos) {
                $('#respuesta').html(datos);
            });*/
    }
  });
</script>