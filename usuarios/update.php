<?php 
include('../app/config.php'); 
include('../app/controllers/usuarios/update_usuario_dao.php');
include('../app/controllers/roles/listado_de_roles.php');
include('../layaout/sesion.php');
include('../auth/index.php');
include('../layaout/parte1.php');
?>





<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Actualizar datos de <?= $nombre_DAO; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Actualizar datos del Usuario</a></li>
              <li class="breadcrumb-item active">Actualización</li>
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
          <div class="card card-primary">
<div class="card-header">
<h3 class="card-title">Llene los datos con cuidado</h3>
</div>


<form class="shadow" action="../app/controllers/usuarios/update.php" method="POST">
<div class="card-body">

<div class="form-group">
<input type="hidden" name="id_usuario" value="<?= $id_usuario; ?>" class="form-control" id="id_usuario" required>
</div>


<div class="form-group">
<label for="nombres">Nombre:</label>
<input type="text" name="nombres" value="<?= $nombre_DAO; ?>" class="form-control" id="nombres" placeholder="Nombre" required>
</div>


<div class="form-group">
<label for="email">Correo:</label>
<input type="email" name="email" value="<?= $correo_DAO; ?>" class="form-control" id="email" placeholder="Correo" required>
</div>

<div class="form-group">
<label for="rol">Rol de usuario:</label>
<select name="rol" class="form-control" id="rol" required>
 <?php foreach($roles_info as $rol_dato){ 
    $rol_id = $rol_dato['id_rol'];
    $rol_tabla = $rol_dato['rol']; ?>
    
   <option value="<?= $rol_id; ?>"
      <?php if($rol_tabla == $rol) { ?>
         selected="selected"
      <?php } ?>
   ><?= $rol_tabla; ?></option>
 <?php } ?>
</select>
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
<button type="submit" class="btn btn-primary">Actualizar usuario</button>
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