<?php 
include('../app/config.php'); 
include('../layaout/sesion.php');
include('../auth/index.php');
?>


<?php  include('../layaout/parte1.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Crear Rol</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Creación de Rol</a></li>
              <li class="breadcrumb-item active">Crear</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

          <div class="w-50 card-fluid-responsive mx-auto rounded p-0 shadow-lg card card-body">
          <div class="card card-primary">
<div class="card-header">
<h3 class="card-title">Agregar rol nuevo al punto de venta.</h3>
</div>


<form action="../app/controllers/roles/create.php" method="POST">
  <div class="card-body">
   <div class="form-group">
    <label for="rol">Nombre del rol:</label>
    <input type="text" name="rol" class="form-control" id="rol" placeholder="nombre del rol" required>
   </div>
  </div>

  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Confirmar</button>
     <a href="<?php echo $url;  ?>roles" class="btn btn-default">Regresar</a>
  </div>
 </form>
</div>
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