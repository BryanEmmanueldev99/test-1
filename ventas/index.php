<?php
include('../app/config.php');
include('../layaout/sesion.php');
include('../auth/staff_de_ventas.php');
include('../app/controllers/compras/listado_de_compras.php');
include('../app/controllers/ventas/listado_de_ventas.php');
include('../layaout/parte1.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Listado de ventas</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Ventas registradas</a></li>
            <li class="breadcrumb-item active">Ventas</li>
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



        <!--new data table-->
        <!-- /.card-header -->
        <div class="card-body shadow-sm rounded">
          <div class="btn-add mb-4">
            <a href="<?= $url; ?>ventas/create.php" class="btn btn-primary">
              <i class="fa fa-plus"></i> Agregar nueva venta
           </a>
          </div>
          <table id="example1" class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <th style="width: 10px">Nro</th>
                <th>Nro de venta</th>
                <th>Cliente</th>
                <th>Total Pagado</th>
                <th>Acciones</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $id_front_end = 0;
              foreach ($ventas_datos as $venta_DAO) {
               $nro_venta_DAO = $venta_DAO['nro_venta'];
              ?>
                <tr>
                  <td><?= $id_front_end = $id_front_end + 1; ?></td>
                  <td>
                    <button data-toggle="modal" data-target="#modal-venta-productos<?= $venta_DAO['id_venta']; ?>" class="btn btn-default">Ver más</button>



                    <!--modal detalles de los productos de la venta-->
<div class="modal fade show" id="modal-venta-productos<?= $venta_DAO['id_venta']; ?>" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detalles de la venta <?= $nro_venta_DAO; ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <!--table venta-->
                <div class="table-responsive mt-2 rounded">
                                <table class="rounded table table-striped table-hover text-center table-sm">
                                    <thead>
                                        <tr>
                                            <th>Nro</th>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Precio unitario</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        <?php
                                        $contador_ventas = 0;
                                        $contador_carrito = 0;
                                        $cantidad_total = 0;
                                        $precio_unitario_total = 0;
                                        $precio_total = 0;
                                        //$precio_total = 0;
                                        include('../app/controllers/ventas/carrito/reporte_venta.php');
                                        foreach ($carrito_datos as $item) {
                                            $contador_carrito = $contador_carrito + 1;
                                            $cantidad_total = $cantidad_total + $item['cantidad'];
                                            $precio_unitario_total = $precio_unitario_total + floatval($item['precio']);

                                        ?>

                                            <tr>
                                                <td scope="row">
                                                    <input type="text" value="<?= $item['inventario_minimo']; ?>" hidden>
                                                    <input type="text" value="<?= $item['id_producto']; ?>" id="id_producto<?= $contador_carrito; ?>" hidden>
                                                    <?= $contador_carrito; ?>
                                                </td>
                                                <td>
                                                    <?= $item['nombre_producto']; ?>
                                                </td>
                                                <td>
                                                <span id="cantidad_carrito<?= $contador_carrito; ?>"><?= $item['cantidad']; ?></span>
                                                <input type="text" id="stock_inventario<?= $contador_carrito; ?>" value="<?= $item['stock'] ?>" hidden>  
                                                </td>
                                                <td>$<?= $item['precio']; ?></td>
                                                <td>
                                                    <?php
                                                    $cantidad = floatval($item['cantidad']);
                                                    $precio = floatval($item['precio']);
                                                    echo '$' . $subtotal = $cantidad * $precio;
                                                    $precio_total = $precio_total + $subtotal;
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <tr>
                                            <th colspan="2" style="background-color: #f8f8f8;">Total</th>
                                            <th style="background-color: #f8f8f8;">
                                                <?php echo $cantidad_total;  ?>
                                            </th>
                                            <th style="background-color: #f8f8f8;">
                                                $<?php echo $precio_unitario_total; ?>
                                            </th>
                                            <th style="background-color: #f8f8f8;">$<?= $precio_total; ?></th>
                                        </tr>
                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                            </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Regresar</button>
            </div>
            </form>
        </div>

    </div>

</div>
                </td>
                  <td><?= $venta_DAO['cliente']; ?></td>
                  <td>$<?= $venta_DAO['total_pagado']; ?></td>
                  <td>
                    <div class="btn-group">
                      <a href="<?php echo $url; ?>compras/show.php?id=<?php echo $compra_DAO['id_compra']; ?>" class="btn btn-primary">
                        <i class="fa fa-eye"></i> Ver
                      </a>
                      <a href="<?= $url; ?>compras/update.php?id=<?php echo $compra_DAO['id_compra']; ?>" class="btn btn-primary">
                        <i class="fa fa-pencil-alt"></i> Editar
                      </a>
                      <a href="<?= $url; ?>compras/delete.php?id=<?php echo $compra_DAO['id_compra']; ?>" class="btn btn-primary">
                        <i class="fa fa-trash-alt"></i> Borrar
                      </a>
                    </div>
                  </td>
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
  $("#example1").DataTable({
    "pageLength": 5,
    "language": {
      "emptyTable": "No hay información",
      "info": "Mostrando _START_ a _END_ de _TOTAL_ Ventas",
      "infoEmpty": "Mostrando 0 a 0 de 0 Ventas",
      "infoFiltered": "(Filtrado de _MAX_ total Ventas)",
      "infoPostFix": "",
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
  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
</script>





