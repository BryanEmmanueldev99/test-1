<?php
//error_reporting(0);

include('../app/config.php');
include('../layaout/sesion.php');
include('../auth/almacen.php');
include('../layaout/parte1.php');
include('../app/controllers/almacen/listado_de_productos.php');
include('../app/controllers/clientes/listado_de_clientes.php');
include('../app/controllers/ventas/recuperar_venta.php');
include('../app/controllers/ventas/carrito/recupera_carrito_show.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0">Estas a punto de cancelar la venta <?= $venta['nro_venta']; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Vista previa venta</a></li>
                        <li class="breadcrumb-item active"><?= $nro_venta ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">

        <div class="container">
            <div class="card-body shadow-sm rounded">
                <!--table venta-->
                <div class="table-responsive mt-2">
                    <strong class="mb-2">Historial del carrito generado por la venta.</strong>
                    <table class="rounded table table-striped table-hover text-center table-responnsive table-sm mt-2">
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
                            $contador_carrito = 0;
                            $cantidad_total = 0;
                            $precio_unitario_total = 0;
                            $precio_total = 0;
                            foreach ($carrito_datos as $row) {
                                $contador_carrito = $contador_carrito + 1;
                                $cantidad_total = $cantidad_total + $row['cantidad'];
                                $precio_unitario_total = $precio_unitario_total + floatval($row['precio']);
                            ?>
                                <tr>
                                    <td scope="row">
                                        <input type="text" value="<?= $row['inventario_minimo']; ?>" hidden>
                                        <input type="text" value="<?= $row['id_producto']; ?>" id="id_producto<?= $contador_carrito; ?>" hidden>
                                        <?= $contador_carrito;  ?>
                                    </td>
                                    <td><?= $row['nombre_producto']; ?></td>
                                    <td> <span id="cantidad_carrito<?= $contador_carrito; ?>"><?= $row['cantidad']; ?></span>
                                        <input type="text" id="stock_inventario<?= $contador_carrito; ?>" value="<?= $row['stock'] ?>" hidden>
                                    </td>
                                    <td>$<?= $row['precio']; ?></td>
                                    <td>
                                    <?php
                                    $cantidad = floatval($row['cantidad']);
                                    $precio = floatval($row['precio']);
                                    echo $subtotal = $cantidad * $precio;
                                    $precio_total = $precio_total + $subtotal;
                                    ?>
                                </td>
                                </tr>
                            
                            <?php  }  ?>

                            <tr>
                                <th colspan="2" style="background-color: #f8f8f8;"></th>
                                <th style="background-color: #f8f8f8;">
                                    
                                </th>
                                <th style="background-color: #f8f8f8;">
                                Total de la venta:
                                </th>
                                <th style="background-color: #f8f8f8;"> $<?= $precio_total; ?></th>
                            </tr>
                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="container-fluid p-4">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card-body shadow-sm rounded">


                                    <div class="row">
                                        <div class="col-md-4 d-flex" style="align-items: center; gap:3px;">
                                            <i class="fas fa-user-minus"></i>
                                            <strong>Datos del cliente</strong>
                                        </div>

                                        <div class="row mt-3 col-md-12">
                                            <div class="col-md-3">
                                                <label for="">Razón social</label>
                                                <input disabled type="text" id="nombre_cliente" class="form-control" value="<?= $venta['nombre_cliente']; ?>">
                                            </div>

                                            <div class="col-md-3">
                                                <label for="">Celular</label>
                                                <input disabled type="text" name="" id="celular_cliente" class="form-control" value="<?= $venta['celular_cliente']; ?>">
                                            </div>

                                            <div class="col-md-3">
                                                <label for="">Correo</label>
                                                <input disabled type="text" value="<?= $venta['email_cliente']; ?>" name="" id="email_cliente" class="form-control">
                                            </div>

                                            <div class="col-md-3">
                                                <label for="">NIC/CI</label>
                                                <input disabled type="text" name="" id="nit_ci_cliente" class="form-control" value="<?= $venta['nit_ci_cliente']; ?>">
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card-body shadow-sm rounded">
                                    <h5>Datos de la operación</h5>

                                    <div class="form-group">
                                        <label for="">Total pagado</label>
                                        <input value="$<?= $venta['total_pagado']; ?>" type="text" class="form-control" disabled>
                                    </div>


                                    <div class="form-group">
                                        <label for="">Cambio</label>
                                        <input value="$<?= $venta['cambio']; ?>" type="text" class="form-control" disabled>
                                    </div>

                                    <div class="form-group">
                                        <form action="" method="get">

                                        </form>
                                        <button id="delete_venta" class="btn btn-primary btn-block mb-3">
                                            Cancelar venta
                                        </button>
                                        <script>
                                            $('#delete_venta').click(function() {

                                                update_stock();
                                                cancelar_venta();

                                                function update_stock() {
                                                    var i = 1;
                                                    var n = '<?php echo $contador_carrito; ?>'
                                                    for (i = 1; i <= n; i++) {
                                                        var a = '#stock_inventario' + i;
                                                        var stock_inventario = $(a).val();
                                                        var b = '#cantidad_carrito' + i;
                                                        var cantidad_carrito = $(b).html();
                                                        var c = '#id_producto' + i;
                                                        var id_producto = $(c).val();
                                                        const stock_calculado = parseFloat(parseInt(stock_inventario) + parseInt(cantidad_carrito));

                                                       
                                                      const url_act_stock = "../app/controllers/ventas/actualizar_stock.php";
                                                        $.get(url_act_stock, {
                                                        id_producto: id_producto,
                                                        stock_calculado: stock_calculado
                                                    }, function(datos) {
                                                       
                                                    });
                                                       
                                                    }
                                                }

                                                function cancelar_venta() {
                                                    const id_venta = "<?= $id_venta_get; ?>";
                                                    const nro_venta = "<?= $venta['nro_venta']; ?>";
                                                    

                                                    const url_delete_venta = "../app/controllers/ventas/delete.php";
                                                        $.get(url_delete_venta, {
                                                        id_venta: id_venta,
                                                        nro_venta: nro_venta
                                                    }, function(datos) {
                                                        $('#respuesta_venta_d').html(datos);
                                                    });
                                                }
                                            });
                                        </script>

                                        <a class="btn btn-default btn-block" href="<?= $url ?>/ventas">
                                            Regresar
                                        </a>

                                        <div class="" id="respuesta_venta_d"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>

        <!-- /.row -->
    </div><!-- /.container-fluid -->

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