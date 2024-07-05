<?php
//error_reporting(0);

include('../app/config.php');
include('../app/controllers/ventas/listado_de_ventas.php');
include('../layaout/sesion.php');
include('../auth/almacen.php');
include('../layaout/parte1.php');
include('../app/controllers/almacen/listado_de_productos.php');
include('../app/controllers/clientes/listado_de_clientes.php');


?>





<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Crear venta</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">crear</a></li>
                        <li class="breadcrumb-item active">compras</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="container-fluid p-4">
                    <div class="card">

                        <?php
                        $contador_ventas = 0;
                        $precio_total = 0;
                        foreach ($ventas_datos as $venta_DAO) {
                            $contador_ventas = $contador_ventas + 1;
                        }

                        ?>
                        <!-- /modals-->
                        <?php include('../layaout/modal_venta_productos.php'); ?>


                        <div class="card-body rounded shadow-sm" style="font-size: 12px;">
                            <div class="row mb-2">
                                <div class="col-md-3">
                                    <h5>Venta número: <?= $contador_ventas + 1; ?> </h5>
                                    <input class="form-control" hidden value="<?= $contador_ventas + 1; ?>" type="text">
                                </div>

                                <div class="col-md-9">
                                    <button type="button" class="btn btn-primary rounded btn-block" data-toggle="modal" data-target="#modal-buscar-producto">
                                        Buscar producto
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>

                            <hr>

                            <!--table venta-->
                            <div class="table-responsive mt-2 rounded">
                                <table class="rounded table table-striped table-hover text-center table-sm">
                                    <thead>
                                        <caption>
                                            Detalles de la venta
                                        </caption>
                                        <tr>
                                            <th>Nro</th>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Precio unitario</th>
                                            <th>Subtotal</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        <?php
                                        $contador_carrito = 0;
                                        $cantidad_total = 0;
                                        $precio_unitario_total = 0;
                                        $precio_total = 0;
                                        //$precio_total = 0;
                                        include('../app/controllers/ventas/carrito/recuperar_carrito.php');
                                        foreach ($carrito_datos as $item) {
                                            $contador_carrito = $contador_carrito + 1;
                                            $cantidad_total = $cantidad_total + $item['cantidad'];
                                            $precio_unitario_total = $precio_unitario_total + floatval($item['precio']);

                                        ?>

                                            <tr>
                                                <td scope="row"><?= $contador_carrito; ?></td>
                                                <td><?= $item['nombre_producto']; ?></td>
                                                <td><?= $item['cantidad']; ?></td>
                                                <td>$<?= $item['precio']; ?></td>
                                                <td>
                                                    <?php
                                                    $cantidad = floatval($item['cantidad']);
                                                    $precio = floatval($item['precio']);
                                                    echo '$' . $subtotal = $cantidad * $precio;
                                                    $precio_total = $precio_total + $subtotal;
                                                    ?>
                                                </td>
                                                <td>
                                                    <form action="../app/controllers/ventas/carrito/borrar_carrito.php" method="post">
                                                        <input type="text" name="id_carrito" value="<?= $item['id_carrito']; ?>" hidden>
                                                        <button class="btn btn-primary btn-sm" type="submit"> <i class="fa fa-trash"></i> Eliminar</button>
                                                    </form>
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

                        <div class="card-body shadow-sm rounded mt-5">
                            <div class="row mb-2">
                                <div class="col-md-3 d-flex" style="align-items: center; gap:3px;">
                                    <i class="fas fa-user-minus"></i>
                                    <h5> Datos del cliente</h5>
                                </div>

                                <div class="col-md-9">
                                    <?php include('../layaout/modal_cliente.php'); ?>
                                    <button type="button" class="btn btn-primary rounded btn-block" data-toggle="modal" data-target="#modal-buscar-cliente">
                                        Buscar cliente
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>

                                <div class="row mt-3 col-md-12">
                                    <div class="col-md-3">
                                        <label for="">Nombre del cliente</label>
                                        <input type="text" name="" id="nombre_cliente" class="form-control">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="">Celular</label>
                                        <input type="text" name="" id="celular_cliente" class="form-control">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="">Correo</label>
                                        <input type="text" name="" id="email_cliente" class="form-control">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="">NIC/CI</label>
                                        <input type="text" name="" id="nit_ci_cliente" class="form-control">
                                    </div>

                                </div>
                            </div>
                            <hr>
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

<!-- Page specific script -->
<script>
    $("#example1").DataTable({
        "pageLength": 5,
        "language": {
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Proveedores",
            "infoEmpty": "Mostrando 0 a 0 de 0 Proveedores",
            "infoFiltered": "(Filtrado de _MAX_ total Proveedores)",
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

<!-- Page specific script -->
<script>
    $("#almacentb").DataTable({
        "pageLength": 5,
        "language": {
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Productos",
            "infoEmpty": "Mostrando 0 a 0 de 0 Productos",
            "infoFiltered": "(Filtrado de _MAX_ total Productos)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Todos los productos",
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