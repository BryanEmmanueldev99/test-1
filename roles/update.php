<?php 
include('../app/config.php'); 
include('../app/controllers/roles/update_roles.php');
include('../layaout/sesion.php');
include('../layaout/parte1.php');
?>





<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Actualizar Rol</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Actualizar Rol</a></li>
              <li class="breadcrumb-item active">Actualizar</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

          <div class="row-6 col-6 mx-auto">
          <div class="card card-primary">
<div class="card-header">
<h3 class="card-title">Llene los datos con cuidado</h3>
</div>


<form class="shadow" action="../app/controllers/roles/update.php" method="POST">
<div class="card-body">

<div class="form-group">
<input type="hidden" name="id_rol" value="<?php echo $id_get_rol; ?>" class="form-control" id="id_rol">
</div>

<div class="form-group">
<label for="rol">Rol:</label>
<input type="text" name="rol" value="<?php echo $nombre_rol; ?>" class="form-control" id="rol" placeholder="rol" required>
</div>


</div>

<div class="card-footer">
<button type="submit" class="btn btn-primary">Actualizar el rol</button>
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