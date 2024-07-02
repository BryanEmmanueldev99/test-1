<?php
include('../app/config.php');
include('../layaout/sesion.php');
include('../auth/index.php');
include('../app/controllers/roles/listado_de_roles.php');
include('../layaout/parte1.php');
?>

<?php /*
if(isset($_SESSION['mensaje'])){
  $respuesta = $_SESSION['mensaje']; ?>



<script>
    Swal.fire({
  title: "<?php echo $respuesta; ?>",
  icon: "success"
});
</script>

<?php } unset($_SESSION['mensaje']); */ ?>




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Listado de roles</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Roles registrados</a></li>
            <li class="breadcrumb-item active">roles</li>
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
          <a href="<?= $url; ?>roles/create.php" class="btn btn-primary">
            <i class="fa fa-plus"></i> Agregar Rol
          </a>
          <table id="example1" class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <th style="width: 10px">ID</th>
                <th>Rol</th>
                <th>Acciones</th>

              </tr>
            </thead>

            <tbody>
              <?php
              $id_front_end = 0;
              foreach ($roles_info as $rol) {
                $id_rol_DAO = $rol['id_rol'];
              ?>
                <tr>
                  <td><?php echo $id_front_end = $id_front_end + 1; ?></td>
                  <td><?php echo $rol['rol']; ?></td>

                  <td>
                    <div class="btn-group">
                      <a href="<?php echo $url; ?>roles/update.php?id=<?php echo $id_rol_DAO; ?>" class="btn btn-primary"><i class="fa fa-pencil-alt"></i> Editar</a>
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
      "info": "Mostrando _START_ a _END_ de _TOTAL_ Roles",
      "infoEmpty": "Mostrando 0 a 0 de 0 Roles",
      "infoFiltered": "(Filtrado de _MAX_ total Roles)",
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