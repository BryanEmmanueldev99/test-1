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

          <p>Contenido</p>

          <div class="row">
<div class="col-lg-3 col-6">

<div class="small-box bg-info">
<div class="inner">
<h3><?php echo $total_almacen; ?></h3>
<p>Almacén</p>
</div>
<div class="icon">
<i class="fas fa-shopping-cart"></i>
</div>
<a href="#" class="small-box-footer">
Ver más <i class="fas fa-arrow-circle-right"></i>
</a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-success">
<div class="inner">
<h3><?php echo $total_roles; ?></h3>
<p>Roles registrados</p>
</div>
<a href="<?php echo $url ?>usuarios">
<div class="icon">
<i class="fa fa-user"></i>
</div>
</a>
<a href="<?php echo $url ?>roles" class="small-box-footer">
Ver más <i class="fas fa-arrow-circle-right"></i>
</a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-warning white-color">
<div class="inner">
<h3>
  <?php echo $total_user; ?>
</h3>
<p>Usuarios Registrados</p>
</div>
<a href="<?php echo $url ?>usuarios">
<div class="icon">
  <i class="fas fa-user-plus"></i>
</div>
</a>
<a href="<?php echo $url ?>usuarios" class="small-box-footer">
Ver más <i class="fas fa-arrow-circle-right"></i>
</a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-danger">
<div class="inner">
<h3>65</h3>
<p>Ventas</p>
</div>
<div class="icon">
<i class="fas fa-chart-pie"></i>
</div>
<a href="#" class="small-box-footer">
Ver más <i class="fas fa-arrow-circle-right"></i>
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