<?php
//error_reporting(0);

include('../app/config.php');
include('../layaout/sesion.php');
include('../auth/almacen.php');
include('../layaout/parte1.php');
include('../app/controllers/almacen/listado_de_productos.php');
include('../app/controllers/clientes/listado_de_clientes.php');
include('../app/controllers/ventas/recuperar_venta.php');





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


    <?php
                                  $nro_venta;
                                  $contador_ventas = 0;
                                  $contador_carrito = 0;
                                  $cantidad_total = 0;
                                  $precio_unitario_total = 0;
                                  $precio_total = 0;
                                  
$sql_carrito = "SELECT *, producto.nombre AS nombre_producto, producto.precio_venta AS precio, producto.stock AS stock, producto.id_producto AS id_producto, producto.stock_minimo AS inventario_minimo
FROM tb_carrito AS carrito INNER JOIN tb_almacen AS producto 
ON carrito.id_producto = producto.id_producto WHERE nro_venta = '$nro_venta'";
$query_carrito = $pdo->prepare($sql_carrito);
$query_carrito->execute();
$carrito_datos = $query_carrito->fetchAll(PDO::FETCH_ASSOC);


                                  foreach ($carrito_datos as $item) { 
                                    $contador_carrito = $contador_carrito + 1;
                                    $cantidad_total = $cantidad_total + $item['cantidad'];
                                    $precio_unitario_total = $precio_unitario_total + floatval($item['precio']);
                                    $id_producto = $item['id_producto']; ?>

<li style="list-style: none;">
    <input type="text" value="<?= $id_producto; ?>" hidden>
</li>
                              <?php    } ?>

    
                      
        <?php

        $sql_carrito = "SELECT *, producto.nombre AS nombre_producto, producto.precio_venta AS precio, producto.stock AS stock, producto.id_producto AS id_producto, producto.stock_minimo AS inventario_minimo, 
           producto.imagen AS Foto
           FROM tb_carrito AS carrito INNER JOIN tb_almacen AS producto 
           ON carrito.id_producto = producto.id_producto WHERE nro_venta = '$nro_venta'";
        $query_carrito = $pdo->prepare($sql_carrito);
        $query_carrito->execute();
        $carrito_datos = $query_carrito->fetchAll(PDO::FETCH_ASSOC);

        //$contador_ventas = 0;
        foreach ($carrito_datos as $row_carro) {
        }

        ?>






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
                                                const id_venta = "<?= $id_venta_get ?>"
                                                const url_venta_delete = "../app/controllers/ventas/delete.php";
                                                $.get(url_venta_delete, {
                                                    id_venta:id_venta
                                                }, function(datos) {
                                                    $('#respuesta_venta_d').html(datos);
                                                });
                                                // alert("")
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