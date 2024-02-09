<?php
/**
 * LINCENSE BRYAN
 */

include('../app/config.php'); 
include('../app/controllers/usuarios/show_usuario_dao.php');
include('../layaout/sesion.php');
?>

<?php include('../layaout/parte1.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Borrar Usuario</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Crear Usuario</a></li>
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

          <div class="row-6 col-6 mx-auto">
          <div class="card card-danger">
<div class="card-header">
<h3 class="card-title">¿Deseas eliminar este usuario?</h3>
</div>


<form action="../app/controllers/usuarios/delete-usario-dao.php" method="POST">
<div class="card-body">
<div class="form-group">

<input type="text" name="id_usuario" id="id_usuario" class="form-control" value="<?php echo $id_usuario_get_DAO; ?> " disabled>

<label for="nombres">Nombre:</label>
<input type="text" name="nombres" value="<?php echo $nombre_DAO; ?>" class="form-control" id="nombres" placeholder="Nombre" disabled>
</div>

<div class="form-group">
<label for="email">Correo:</label>
<input type="email" name="email" value="<?php echo $correo_DAO; ?>" class="form-control" id="email" placeholder="Correo" disabled>
</div>

</div>

<div class="card-footer">
<button class="btn btn-danger">Confirmar</button>
<a href="<?php echo $url;  ?>usuarios" class="btn">Regresar</a>
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