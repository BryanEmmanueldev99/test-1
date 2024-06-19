<?php
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
          <h1 class="m-0">Actualizar datos del producto</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Actualizar datos del producto</a></li>
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
            <h3 class="card-title">Llene los datos con cuidado</h3>
          </div>


          <form class="shadow" action="../app/controllers/almacen/update.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="id_producto" id="id_producto" class="form-control" value="<?= $producto_DAO['id_producto']; ?>" hidden>
            <div class="card-body">

              <!--INICIO FILA 1 -->
              <div class="row">
                
                  <div class="col-md-3 form-group mb-3">
                    <label for="codigo">SKU:</label>
                    <input type="number" disabled class="form-control" value="<?= $producto_DAO['codigo']; ?>">
                  </div>

                  <div class="col-md-4 form-group mb-3">
                    <label for="fecha_ingreso">Fecha de ingreso:</label>
                    <input type="date" name="fecha_ingreso" class="form-control" value="<?= $producto_DAO['fecha_ingreso']; ?>" id="fecha_ingreso" required>
                  </div>

                  <div class="col-md-5 form-group mb-3">
                    <label for="nombre">Nombre del producto:</label>
                    <input type="text" name="nombre" class="form-control" id="nombre" value="<?= $producto_DAO['nombre']; ?>" required>
                  </div>
                
                <!--fin de la fila-->
              </div>

              <!--INICIO FILA 2-->
              <div class="row">

                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="descripcion">Descripción del producto:</label>
                    <textarea name="descripcion" class="form-control" id="descripcion"><?= $producto_DAO['descripcion']; ?></textarea>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="id_categoria">Categoría:</label>
                    <select class="form-control" name="id_categoria" id="id_categoria">
                      <?php foreach ($categorias_info as $categoria) {
                        $nombre_categoria_tabla = $categoria['nombre_categoria'];
                        $id_categoria = $categoria['id_categoria'];
                      ?>
                        <option value="<?= $id_categoria; ?>" <?php if ($nombre_categoria_tabla == $show_categoria) { ?> selected="selected" <?php } ?>>
                          <?= $nombre_categoria_tabla; ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>


              <!--FILA 3 INICIO-->
              <div class="row">
              <div class="col-md-3">
                  <div class="form-group mb-3">
                    <label for="precio_compra">Precio compra:</label>
                    <input type="text" name="precio_compra" class="form-control" id="precio_compra" value="<?= $producto_DAO['precio_compra']; ?>" required>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group mb-3">
                    <label for="precio_venta">Precio venta:</label>
                    <input type="text" name="precio_venta" class="form-control" id="precio_venta" value="<?= $producto_DAO['precio_venta']; ?>" required>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="precio_venta">Usuario</label>
                    <input type="text" class="form-control" value="<?= $sesion_email; ?>" disabled>
                    <input type="text" name="id_usuario" class="form-control" id="id_usuario" value="<?= $id_usuario; ?>" hidden>
                  </div>
                </div>
                <!--fin de fila-->
              </div>

              <!--FILA 4 INICIO-->
              <div class="row">
                

                  <div class="col-md-3 form-group mb-3">
                    <label for="stock">Stock:</label>
                    <input type="number" name="stock" class="form-control" id="stock" value="<?= $producto_DAO['stock']; ?>" required>
                  </div>


                  <div class="col-md-3 form-group mb-3">
                    <label for="stock_minimo">Stock minimo:</label>
                    <input type="number" name="stock_minimo" class="form-control" id="stock_minimo" value="<?= $producto_DAO['stock_minimo']; ?>">
                  </div>

                  
                  <div class="col-md-6 form-group mb-3">
                    <label for="stock_maximo">Stock máximo:</label>
                    <input type="number" name="stock_maximo" class="form-control" id="stock_maximo" value="<?= $producto_DAO['stock_maximo']; ?>">
                  </div>
                
                <!--fin de fila-->
              </div>


              <div class="col-md-12 text-center">
                <div class="form-group mb-3">
                  <label for="imagen">Cargar una foto del producto</label>
                  <input type="file" name="imagen" id="file" class="form-control" id="imagen">
                  <input type="text" name="imagen_ruta" id="imagen_ruta" class="form-control" value="<?= $producto_DAO['imagen']; ?>" hidden>
                  <output id="list" style="text-align: center;">
                    <img class="img-fluid p-0" width="70%" src="<?= $url . 'almacen/wc_img_productos/' . $producto_DAO['imagen']; ?>" alt="<?= $producto_DAO['imagen']; ?>">
                  </output>
                  <script>
                    function archivo(evt) {
                      var files = evt.target.files; // FileList object
                      // Obtenemos la imagen del campo "file".
                      for (var i = 0, f; f = files[i]; i++) {
                        //Solo admitimos imágenes.
                        if (!f.type.match('image.*')) {
                          continue;
                        }
                        var reader = new FileReader();
                        reader.onload = (function(theFile) {
                          return function(e) {
                            // Insertamos la imagen
                            document.getElementById("list").innerHTML = ['<img class="thumb thumbnail mt-2" src="', e.target.result, '" width="50%" title="', escape(theFile.name), '"/>'].join('');
                          };
                        })(f);
                        reader.readAsDataURL(f);
                      }
                    }
                    document.getElementById('file').addEventListener('change', archivo, false);
                  </script>
                </div>
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