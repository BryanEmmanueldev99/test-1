<!DOCTYPE html>
<!--
Cuerpo del documento
-->
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Ventas</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo $url; ?>public/templates/AdminLTE-3.2.0/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $url; ?>public/templates/AdminLTE-3.2.0/AdminLTE-3.2.0/dist/css/adminlte.min.css">

  <!--estilos de la app-->
  <link rel="stylesheet" href="<?php echo $url; ?>public/css/index.css">

  <!--Sweet alert-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo $url;?>public/templeates/AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo $url;?>public/templeates/AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo $url;?>public/templeates/AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!--estilos provicionales-->
  <style>
      a.brand-link.logos_djes:hover {
    background: none !important;
}
  </style>

  <!-- jQuery -->
  <script src="<?php echo $url; ?>public/templates/AdminLTE-3.2.0/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?= $url; ?>" class="nav-link">Inicio</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Buscar" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <!-- Messages Dropdown Menu -->
        
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-danger navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Logo empresa -->
      <a href="<?php echo $url; ?>" class="brand-link logos_djes">
        <img src="<?php echo $url; ?>/public/img/punto_de_venta.png" alt="sistema de ventas" class="mt-3 p-1 img-fluid m-0 admin_thubmnail" style="opacity: .8; width:50px;">
      </a>
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 d-flex">
          <div class="image">
            <img src="<?php echo $url; ?>/public/img/user.svg" class="user__default" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo $sesion_email; ?></a>
          </div>
          
        </div>

        <!-- SidebarSearch Form 
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Buscar" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>-->

        <!-- Sidebar Menu -->
        <nav class="mt-5 pt-2">
        <hr style="width: 80%;">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
              <a href="<?php echo $url; ?>" class="nav-link acitve">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Inicio</p>
              </a>
      </li>
            <!-- lista de modulos template -->
                     <?php include('modulos.php'); ?>
                     
                     <!--cerrar la sesion-->
            <li class="nav-item">
              <a href="<?php echo $url; ?>app/controllers/login/cerrar_sesion.php" class="nav-link acitve">
                <i class="nav-icon fas fa-door-closed"></i>
                <p>Cerrar sesión</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>