<?php 
include('../app/config.php'); 
include('../layaout/sesion.php');
include('../app/controllers/usuarios/listado_de_usuarios.php');
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
            <h1 class="m-0">Listado de Usuarios</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Listado de Usuarios</a></li>
              <li class="breadcrumb-item active">Usuarios</li>
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



<!--new data table-
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped text-center">
                <thead>
<tr>
<th style="width: 10px">ID</th>
<th>Nombres</th>
<th>correo</th>
<th>Acciones</th>
</tr>
</thead>

 <tbody>
  <?php 
  $id_front_end = 0;
  foreach($usuarios_info as $user_info) { 
     $id_usuario_DAO = $user_info['id_usuario'];
    ?>
<tr>
<td><?php echo $id_front_end = $id_front_end + 1; ?></td>
<td><?php echo $user_info['nombres']; ?></td>
<td><?php echo $user_info['email']; ?></td>
<td>
   <div class="btn-group">
   <a href="/usuarios/show.php?id=<?php echo $id_usuario_DAO; ?>" class="btn btn-primary"><i class="fa fa-eye"></i> Ver</a>
   <a href="/usuarios/update.php?id=<?php echo $id_usuario_DAO; ?>" class="btn btn-primary"><i class="fa fa-pencil-alt"></i> Editar</a>
   <a href="" class="btn btn-primary"><i class="fa fa-trash"></i> Borrar</a>
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
                "lengthMenu": "Mostrar _MENU_ Usuarios",
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
      "responsive": true, "lengthChange": true, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
</script> 


