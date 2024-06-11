<?php

include('../app/config.php');
include('../app/controllers/proveedores/update_proveedores.php');
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
          <h1 class="m-0"><?= $proveedor_DAO['nombre_proveedor']; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Borrar proveedor</a></li>
            <li class="breadcrumb-item active">Borrar</li>
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
            <h3 class="card-title">¿Deseas eliminar este proveedor?</h3>
          </div>


          <form class="shadow" action="../app/controllers/proveedores/delete.php" method="POST">
            <div class="card-body">
            <input type="text" name="id_proveedor" value="<?= $proveedor_DAO['id_proveedor']; ?>" hidden>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Nombre del proveedor:</label>
                                    <input type="text" class="form-control" name="nombre_proveedor" id="nombre_proveedor" value="<?= $proveedor_DAO['nombre_proveedor']; ?>" disabled />
                                    
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Celular:</label>
                                    <input type="number" class="form-control" name="celular" id="celular" 
                                    value="<?= $proveedor_DAO['celular']; ?>" disabled />
                                    
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Telefono:</label>

                                    <input type="number" class="form-control" name="telefono" id="telefono" value="<?= $proveedor_DAO['telefono']; ?>" disabled />
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Correo electronico:</label>

                                    <input type="email" class="form-control" name="email_proveedor" id="email_proveedor" value="<?= $proveedor_DAO['email_proveedor']; ?>" disabled />
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Nombre de la empresa:</label>

                                    <input type="text" class="form-control" name="empresa" id="empresa" value="<?= $proveedor_DAO['empresa']; ?>" disabled />
                                    
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Dirección:</label><b style="color:red;">*</b>

                                    <textarea class="form-control" name="direccion" id="direccion" disabled><?= $proveedor_DAO['direccion']; ?></textarea>

                                   
                                </div>
                            </div>
                        </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-danger">Confirmar</button>
              <a href="<?php echo $url;  ?>usuarios" class="btn btn-default">Regresar</a>
            </div>
          </form>
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
    <h5>Title</h5>
    <p>Sidebar content</p>
  </div>
</aside>
<!-- /.control-sidebar -->




<?php
include('../layaout/mensajes.php');
include('../layaout/parte2.php');
?>