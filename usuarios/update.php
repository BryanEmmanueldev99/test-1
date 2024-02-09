<?php 
include('../app/config.php'); 
include('../app/controllers/usuarios/update_usuario_dao.php');
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
            <h1 class="m-0">Actualizar datos del Usuario</h1>
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
          <div class="card card-primary">
<div class="card-header">
<h3 class="card-title">Llene los datos con cuidado</h3>
</div>


<form action="../app/controllers/usuarios/update.php" method="POST">
<div class="card-body">

<div class="form-group">
<input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>" class="form-control" id="id_usuario">
</div>

<div class="form-group">
<label for="nombres">Nombre:</label>
<input type="text" name="nombres" value="<?php echo $nombre_DAO; ?>" class="form-control" id="nombres" placeholder="Nombre">
</div>

<div class="form-group">
<label for="email">Correo:</label>
<input type="email" name="email" value="<?php echo $correo_DAO; ?>" class="form-control" id="email" placeholder="Correo">
</div>

<div class="form-group">
<label for="password_user">Contraseña:</label>
<input type="text" name="password_user" class="form-control" id="password_user" placeholder="Password">
</div>

<div class="form-group">
<label for="password_repeat">Confirmar la Contraseña:</label>
<input type="text" class="form-control" name="password_repeat" id="password_repeat">
</div>

</div>

<div class="card-footer">
<button type="submit" class="btn btn-success">Guardar</button>
<a href="<?php echo $url;  ?>usuarios" class="btn btn-secondary">Regresar</a>
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