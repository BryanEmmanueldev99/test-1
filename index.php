<?php
include('app/config.php');
include('layaout/sesion.php');
include('app/controllers/usuarios/listado_de_usuarios.php');
include('app/controllers/roles/listado_de_roles.php');
include('app/controllers/almacen/listado_de_productos.php');
?>


<?php include('layaout/parte1.php'); ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 fs-4">Hola <?php echo $nombre_sesion; ?> - <span><?php echo $rol_sesion ?></span> </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
            <li class="breadcrumb-item active">Pagina de inicio</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <h3 class="p-2 bg-info">Mis módulos.</h3>

      <div class="row">

        <div class="col-md-3 small-box shadow-none text-center p-3">
          <div class="inner">
            <a href="<?= $url; ?>almacen/" class="modulos-acceso">
              <img class="img-fluid modulos-iconos" src="<?= $url; ?>public/img/almacen.png" alt="almacen">
              <p>Almacén</p>
              <strong>Total: <?php echo $total_almacen; ?></strong>
              <div class="ver-mas-modulos">
                Ver más <i class="fas fa-arrow-circle-right"></i>
              </div>
            </a>
          </div>
        </div>



        <div class="col-md-3 small-box shadow-none text-center p-3">
          <div class="inner">
            <a href="<?= $url; ?>compras/" class="modulos-acceso">
              <img class="img-fluid modulos-iconos" src="<?= $url; ?>public/img/compras.png" alt="almacen">
              <p>Compras</p>
              <strong>Total: <?php echo $total_almacen; ?></strong>
              <div class="ver-mas-modulos">
                Ver más <i class="fas fa-arrow-circle-right"></i>
              </div>
            </a>
          </div>
        </div>

        <div class="col-md-3 small-box shadow-none text-center p-3">
          <div class="inner">
            <a href="<?= $url; ?>roles/" class="modulos-acceso">
              <img class="img-fluid modulos-iconos" src="<?= $url; ?>public/img/roles.png" alt="roles">
              <p>Roles</p>
              <strong>Total: <?php echo $total_roles; ?></strong>
              <div class="ver-mas-modulos">
                Ver más <i class="fas fa-arrow-circle-right"></i>
              </div>
            </a>
          </div>
        </div>

        <div class="col-md-3 small-box shadow-none text-center p-3">
          <div class="inner">
            <a href="<?= $url; ?>usuarios/" class="modulos-acceso">
              <img class="img-fluid modulos-iconos" src="<?= $url; ?>public/img/usuarios.png" alt="usuarios">
              <p>Usuarios</p>
              <strong>Total: <?php echo $total_user; ?></strong>
              <div class="ver-mas-modulos">
                Ver más <i class="fas fa-arrow-circle-right"></i>
              </div>
            </a>
          </div>
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
    <h5>Proximamente</h5>
    <p>Sidebar content</p>
  </div>
</aside>
<!-- /.control-sidebar -->

<?php include('layaout/parte2.php'); ?>