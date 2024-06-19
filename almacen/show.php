<?php
//error_reporting(0);

include('../app/config.php');
include('../app/controllers/almacen/cargar_producto.php');
include('../app/controllers/categorias/listado_de_categorias.php');
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
          <h1 class="m-0">Vista previa de <?= $producto_DAO['nombre']; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Vista previa</a></li>
            <li class="breadcrumb-item active"><?= $producto_DAO['nombre']; ?></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">

      <div class="w-75 mx-auto">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Datos del producto</h3>
          </div>


          <form class="shadow" enctype="multipart/form-data">
            
            <div class="card-body">

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="codigo">SKU:</label>
                    <input type="text" name="codigo" id="codigo" class="form-control" value="<?= $producto_DAO['codigo']; ?>" disabled>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="nombre">Nombre del producto:</label>
                    <input type="text" name="nombre" class="form-control" id="nombre" value="<?= $producto_DAO['nombre']; ?>" disabled>
                  </div>
                </div>
                <!--fin de la fila-->
              </div>


              <div class="form-group mb-3">
                <label for="descripcion">Descripción del producto:</label>
                <textarea disabled name="descripcion" class="form-control" id="descripcion"><?= $producto_DAO['descripcion']; ?></textarea>
              </div>



              <div class="row">
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="stock">Stock:</label>
                    <input type="number" name="stock" class="form-control" id="stock" value="<?= $producto_DAO['stock']; ?>" disabled>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="stock_minimo">Stock minimo:</label>
                    <input type="number" name="stock_minimo" class="form-control" id="stock_minimo" value="<?= $producto_DAO['stock_minimo']; ?>" disabled >
                  </div>
                </div>


                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="stock_maximo">Stock máximo:</label>
                    <input type="number" name="stock_maximo" class="form-control" id="stock_maximo" value="<?= $producto_DAO['stock_maximo']; ?>" disabled>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="precio_compra">Precio compra:</label>
                    <input type="text" name="precio_compra" class="form-control" id="precio_compra" value="<?= $producto_DAO['precio_compra']; ?>" disabled>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="precio_venta">Precio venta:</label>
                    <input type="text" name="precio_venta" class="form-control" id="precio_venta" value="<?= $producto_DAO['precio_venta']; ?>" disabled>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="precio_venta">Precio venta:</label>
                    <input type="number" name="precio_venta" class="form-control" id="precio_venta" value="<?= $producto_DAO['precio_venta']; ?>" disabled>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="fecha_ingreso">Fecha de ingreso:</label>
                    <input type="date" name="fecha_ingreso" class="form-control" value="<?= $producto_DAO['fecha_ingreso']; ?>" id="fecha_ingreso" disabled>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="precio_venta">Usuario</label>
                    <input type="text" class="form-control" value="<?= $sesion_email; ?>" disabled>
                    <input type="text" name="id_usuario" class="form-control" id="id_usuario" value="<?= $id_usuario; ?>" hidden>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="id_categoria">Categoría:</label>
                    <input class="form-control" type="text" value="<?= $producto_DAO['nombre_categoria']; ?>" disabled>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group mb-3">
                        
                      <img class="img-fluid" width="100%" src="<?= $url . 'almacen/wc_img_productos/' . $producto_DAO['imagen']; ?>" alt="<?= $producto_DAO['imagen']; ?>">
                      
                  </div>
                </div>

                <!--fin de fila-->
              </div>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Actualizar producto</button>
              <a href="<?= $url;  ?>almacen" class="btn btn-default">Regresar</a>
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
    <h5>Más opciones</h5>
    <p>Proximamente...</p>
  </div>
</aside>
<!-- /.control-sidebar -->




<?php
include('../layaout/mensajes.php');
include('../layaout/parte2.php');
?>