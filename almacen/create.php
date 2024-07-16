<?php
include('../app/config.php');
include('../layaout/sesion.php');
include('../auth/staff_de_ventas.php');
include('../app/controllers/almacen/listado_de_productos.php');
include('../app/controllers/categorias/listado_de_categorias.php');
?>


<?php include('../layaout/parte1.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Crear producto</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Creación de nuevo producto</a></li>
            <li class="breadcrumb-item active">Crear producto</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">

      <div class="w-75 container-fluid">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Llene los datos con cuidado.</h3>
          </div>


          <!--modal para registrar categorias-->
          <div class="modal fade" id="modal-create">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Crear nueva categoría</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="" method="get">
                    <div class="mb-3">
                      <label for="" class="form-label">Nombre de la Categoría:</label><b style="color: red;" class="red">*</b>

                      <input type="text" class="form-control" name="nombre_categoria" id="nombre_categoria" placeholder="Agrega un nombre para la categoría" required />
                      <small style="color:red; display:none;" id="validate_create_categoria">*Este campo es requerido.</small>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                      <button type="button" class="btn btn-primary" id="btn_create">Confirmar</button>
                      <div class="respuesta" id="respuesta"></div>
                    </div>

                  </form>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
          <script>
            $('#btn_create').click(function() {
              //alert('funcioando...');
              var nombre_categoria_form = $('#nombre_categoria').val();
              if (nombre_categoria_form == "") {
                $('#nombre_categoria').focus();
                $('#validate_create_categoria').css('display', 'block');
              } else {
                var url = "../app/controllers/categorias/form_categoria_producto_create.php";
                $.get(url, {
                  nombre_categoria: nombre_categoria_form
                }, function(datos) {
                  $('#respuesta').html(datos);
                });
              }
            });
          </script>


          <form class="shadow" action="../app/controllers/almacen/create.php" method="POST" enctype="multipart/form-data">
            <div class="card-body">

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="codigo">SKU:</label>
                    
                    <?php

                   /* function ceros($numero)
                    {
                      $len = 0;
                      $cantidad_ceros = 5;
                      $aux = $numero;
                      $pos = strlen($numero);
                      $len = $cantidad_ceros - $pos;
                      for ($i = 0; $i < $len; $i++) {
                        $aux = "0" . $aux;
                      }
                      return $aux;
                    }*/

                    $contador_id_producto = 1;
                    if($productos_info <= 0){
                      foreach ($productos_info as $producto) {
                        $contador_id_producto = $contador_id_producto + 1;
                      }
                    }
                    
                    ?>
                    <input type="number" name="codigo" id="sku_validate" class="form-control" required>
                    <div id="resultado"></div>
                       <script>
$(document).ready(function(){
                         
      var verify_sku;
             
      //hacemos focus
      $("#sku_validate").focus();
                                                 
      //comprobamos si se pulsa una tecla
      $("#sku_validate").keyup(function(e){
             //obtenemos el texto introducido en el campo
             verify_sku = $("#sku_validate").val();
             //hace la búsqueda
             $("#resultado").delay(1000).queue(function(n) {      
                                           
                  $("#resultado").html('<img width="30px" class="img-fluid" src="<?= $url;  ?>public/img/ajax_loader.gif" />');
                                           
                       $.ajax({
                              type: "POST",
                              url: "../app/controllers/almacen/provider_sku.php",
                              data: "sku_verify="+verify_sku,
                              dataType: "html",
                              error: function(){
                                    alert("error en la petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });
                          
});
                       </script>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="nombre">Nombre del producto:</label>
                    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre de producto" required>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="descripcion">Descripción del producto:</label>
                    <textarea name="descripcion" class="form-control" id="descripcion" placeholder="..."></textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="stock">Categoría:</label>
                    <div class="d-flex">
                      <button type="button" data-toggle="modal" data-target="#modal-create" class="btn btn-primary shadow" style="border-radius: 50%; border:3px solid #fff;"><i class="fa fa-plus"></i></button>
                      <select name="id_categoria" id="id_categoria" class="form-control">
                        <?php foreach ($categorias_info as $categorias) { ?>
                          <option value="<?php echo $categorias['id_categoria']; ?>"><?php echo $categorias['nombre_categoria']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="stock">Stock:</label>
                    <input type="number" name="stock" class="form-control" id="stock" placeholder="Existencias" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="stock_minimo">Stock minimo:</label>
                    <input type="number" name="stock_minimo" class="form-control" id="stock_minimo" placeholder="Pocas existencias">
                  </div>
                </div>


                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="stock_maximo">Stock máximo:</label>
                    <input type="number" name="stock_maximo" class="form-control" id="stock_maximo" placeholder="Stock lleno">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="precio_compra">Precio compra:</label>
                    <input type="number" name="precio_compra" class="form-control" id="precio_compra" required>
                  </div>
                </div>


                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="precio_venta">Precio venta:</label>
                    <input type="number" name="precio_venta"  class="form-control" id="precio_venta"  required>
                  </div>

                </div>
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="fecha_ingreso">Fecha de ingreso:</label>
                    <input type="date" name="fecha_ingreso" class="form-control" id="fecha_ingreso">
                  </div>
                </div>


                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="id_usuario">Usuario</label>
                    <input type="text" class="form-control" value="<?php echo $sesion_email; ?>" disabled>
                    <input type="text" value="<?php echo $id_sesion_usuario; ?>" name="id_usuario" id="id_usuario" hidden>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="imagen">Cargar una foto del producto</label>
                    <input type="file" name="imagen" id="file" class="form-control" id="imagen">
                    <output id="list" style="text-align: center;"></output>
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
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Confirmar</button>
              <a href="<?php echo $url;  ?>almacen" class="btn btn-default">Regresar</a>
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