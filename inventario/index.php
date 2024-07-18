<?php
include('../app/config.php');
include('../layaout/sesion.php');
include('../auth/staff_de_ventas.php');
include('../app/controllers/almacen/listado_de_productos.php');
include('../layaout/parte1.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Listado de productos</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Listado de productos</a></li>
            <li class="breadcrumb-item active">Ajuste de inventario</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Visualización</h3>
        </div>

        <style>
          .child ul li {
            list-style: none;
          }
        </style>

        <!--new data table-->
        <!-- /.card-header -->
        <div class="card-body shadow-sm rounded almacen table-responsive">
        
          <table id="almacentb" class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <th style="width: 30px">Nro</th>
                <th>Foto</th>
                <th>SKU</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Stock</th>
                <th>Categoría</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $id_front_end = 0;
              foreach ($productos_info as $producto) {
                $id_producto_DAO = $producto['id_producto'];
                $img_producto = $producto['imagen'];
                $file_producto = $url . "almacen/wcstore_img/$img_producto";
              ?>
                <tr>
                  <td><?= $id_front_end = $id_front_end + 1; ?></td>
                  <td>

                    <?php if (empty($file_producto)) {
                      echo "Foto no disponible";
                    } else {
                      echo '<img class="img-fluid img-thumbnail shadow-sm" width="120px" src="' . $file_producto . '" alt="">';
                    }
                    ?>
                  </td>
                  <td>
                    <?= $producto['codigo']; ?>
                  </td>
                  <td><?= $producto['nombre']; ?></td>
                  <td><?= $producto['descripcion']; ?></td>
                  <td>
               
                      
                      <input type="text" id="control-iventario<?= $producto['id_producto']; ?>" class="form-control" value="<?= $producto['stock']; ?>">
                      <input type="text" value="<?= $producto['id_producto']; ?>" id="id_inventario<?= $producto['id_producto']; ?>" hidden>
                      <div class="" id="resultado_inventario<?= $producto['id_producto']; ?>"></div>

                    <script>
                        //AJAX inventario 

                        $(document).ready(function(){                                
                         //comprobamos si se pulsa una tecla
                         $("#control-iventario<?= $producto['id_producto']; ?>").keyup(function(e){

                            //obtenemos el texto introducido en el campo
                           var id_inventario = $("#id_inventario<?= $producto['id_producto']; ?>").val();
                           var act_ajax_stock = $("#control-iventario<?= $producto['id_producto']; ?>").val(); 
                              
                                          $.ajax({
                                                 type: "POST",
                                                 url: "../app/controllers/inventario/update.php",
                                                 data: { id_in: id_inventario, stock_in: act_ajax_stock } ,
                                                 dataType: "html",
                                                 error: function(){
                                                     alert('ajax');
                                                 },
                                                 success: function(data){                                                      
                                                  $("#resultado_inventario<?= $producto['id_producto']; ?>").html(data);                                            
                                                  n();
                                                 }
                                     });
                                                              
                                });
                                                   
                         });
                                             
                 
                    </script>
                    </p>
                  </td>
                  <td><?= $producto['nombre_categoria'] ?></td>

                </tr>
              <?php } ?>

            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
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


<!-- Page specific script -->
<script>
  $("#almacentb").DataTable({
    "pageLength": 5,
    "language": {
      "emptyTable": "No hay información",
      "info": "Mostrando _START_ a _END_ de _TOTAL_ Productos",
      "infoEmpty": "Mostrando 0 a 0 de 0 Productos",
      "infoFiltered": "(Filtrado de _MAX_ total Productos)",
      "infoPostFix": "a",
      "thousands": ",",
      "lengthMenu": "Mostrar _MENU_ Generar Reportes",
      "loadingRecords": "Cargando...",
      "processing": "Procesando...",
      "search": "Buscador:",
      "zeroRecords": "Sin resultados encontrados",
      "paginate": {
        "first": "Primero",
        "last": "Ultimo",
        "next": "Siguiente",
        "previous": "Anterior"
      }
    },
    "responsive": true,
    "lengthChange": true,
    "autoWidth": false,
    "buttons": ["copy", "csv", "excel", "pdf", "print"]
  }).buttons().container().appendTo('#almacentb_wrapper .col-md-6:eq(0)');
</script>