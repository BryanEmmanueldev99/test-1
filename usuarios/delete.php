<?php 
include('../app/config.php'); 
include('../app/funciones/funciones.php');
include('../app/controllers/usuarios/show_usuario_dao.php');
include('../layaout/sesion.php');
include('../auth/index.php');
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

      <div class="w-50 card-fluid-responsive mx-auto">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">¿Deseas eliminar este usuario?</h3>
          </div>


          <form class="shadow" action="../app/controllers/usuarios/delete-usario-dao.php" method="POST">
            <div class="card-body">
              <div class="form-group">

                <input type="hidden" name="id_usuario" id="id_usuario" class="form-control" value="<?= openssl_encrypt($id_usuario_get_DAO,AES,KEY); ?> ">

                <label for="nombres">Nombre:</label>
                <input type="text" name="nombres" value="<?= $nombre_DAO; ?>" class="form-control" id="nombres" placeholder="Nombre" disabled>
              </div>

              <div class="form-group">
                <label for="email">Correo:</label>
                <input type="email" name="email" value="<?= $correo_DAO; ?>" class="form-control" id="email" placeholder="Correo" disabled>
              </div>


              <div class="form-group">
                <label for="rol">Rol de usuario:</label>
                <input type="text" name="rol" value="<?= $rol; ?>" class="form-control" id="rol" placeholder="Rol" disabled>
              </div>

            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Confirmar</button>
              <a href="<?= $url;  ?>usuarios" class="btn btn-default">Regresar</a>
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