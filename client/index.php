<?php
include('../app/config.php');
include('../layaout/sesion.php');
include('../auth/index.php');
include('../layaout/parte1.php');
include('../app/controllers/clientes/listado_de_clientes.php');
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Listado de clientes</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Listado de clientes</a></li>
            <li class="breadcrumb-item active">Clientes</li>
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
          
          <table id="example1" class="table table-bordered table-striped text-center table-sm">
            <thead>
              <tr>
                <th style="width: 10px">Nro</th>
                <th>Razón social</th>
                <th>NIT/CI</th>
                <th>correo</th>
                <th>Celular</th>
                <th>Acciones</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $id_front_end = 0;
              foreach ($clientes_info as $cliente) {
                $id_cliente_DAO = $cliente['id_cliente'];
              ?>
                <tr>
                  <td><?= $id_front_end = $id_front_end + 1; ?></td>
                  <td><?= $cliente['nombre_cliente']; ?></td>
                  <td><?= $cliente['nit_ci_cliente']; ?></td>
                  <td><?= $cliente['email_cliente']; ?></td>
                  <td><?= $cliente['celular_cliente']; ?></td>
                  <td>
                    <div class="btn-group">
                      <a href="<?= $url; ?>client/show.php?id=<?= $id_cliente_DAO; ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Ver</a>
                      <a href="<?= $url; ?>client/update.php?id=<?= $id_cliente_DAO; ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil-alt"></i> Editar</a>
                      <a onclick="delete_client()" href="<?= $url; ?>app/controllers/clientes/delete.php?id=<?= $id_cliente_DAO; ?>" class="btn btn-primary btn-sm"><i class="fa fa-trash"></i> Borrar</a>
                      <script>
                          function delete_client() {
                              alert("Estas seguro de borrar a <?= $cliente['nombre_cliente']; ?>")
                          }
                      </script>
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
      "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
      "infoEmpty": "Mostrando 0 a 0 de 0 Usuarios",
      "infoFiltered": "(Filtrado de _MAX_ total Usuarios)",
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