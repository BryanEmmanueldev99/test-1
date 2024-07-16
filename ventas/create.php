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
                                            $contador_carrito = $contador_carrito +1;
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
                                                <td>

                                                <form method="get">
                                                        <input type="text" name="id_carrito" id="id_carrito<?php echo $item['id_carrito']; ?>" value="<?= $item['id_carrito']; ?>" hidden>
                                                        <button type="button" class="btn btn-primary btn-sm" id="btn_delete_carrito_item<?php echo $item['id_carrito']; ?>"> <i class="fa fa-trash"></i> Eliminar</button>
                                                        <div id="respuesta_carro<?php echo $item['id_carrito']; ?>"></div>
                                                    </form>


                                                    <script>
            $(document).ready(function(){
                $("#btn_delete_carrito_item<?php echo $item['id_carrito']; ?>").click(function(){
                    const id_carrito=$("#id_carrito<?php echo $item['id_carrito']; ?>").val();
                    
                    

                    $.ajax({
                              type: "POST",
                              url: "../app/controllers/ventas/carrito/borrar_carrito.php",
                              data: {
                                id_carrito:id_carrito,
                              },
                              dataType: "html",
                              error: function(){
                                    alert("error en la petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#respuesta_carro<?php echo $item['id_carrito']; ?>").html(data);
                                   // n();
                              }
                });
            });
            });
        </script>
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

                        <div class="row">
                            <div class="col-md-8">
                                <div class="card-body shadow-sm rounded mt-5">
                                    <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show w-75" style="gap: 5px;" role="alert">
                                        <i class="fa fa-heart p-0 m-0"></i>
                                        <p class="p-0 m-0 alert-add-cliente">¿Cliente nuevo? Presiona el botón para agregar uno nuevo.</p>

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modal-default-clients"><i class="fa fa-user-plus"></i> Agregar cliente</button>
                                    <!--modal para agregar clientes-->
                                    <?php include('../layaout/modal_add_clients.php'); ?>
                                    <div class="row mb-2 mt-5">
                                        <div class="col-md-4 d-flex" style="align-items: center; gap:3px;">
                                            <i class="fas fa-user-minus"></i>
                                            <strong>Datos del cliente</strong>
                                        </div>

                                        <div class="col-md-7">
                                            <button type="button" class="btn btn-primary rounded btn-block" data-toggle="modal" data-target="#modal-buscar-cliente">
                                                Buscar cliente
                                                <i class="fa fa-search"></i>
                                            </button>
                                            <?php include('../layaout/modal_cliente.php'); ?>
                                        </div>


                                        <div class="row mt-3 col-md-12">
                                            <div class="col-md-3">
                                                <label for="">Razón social</label>
                                                <input disabled type="text" id="nombre_cliente" class="form-control">
                                                <input type="text" id="id_cliente" hidden>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="">Celular</label>
                                                <input disabled type="text" name="" id="celular_cliente" class="form-control">
                                            </div>

                                            <div class="col-md-3">
                                                <label for="">Correo</label>
                                                <input disabled type="text" name="" id="email_cliente" class="form-control">
                                            </div>

                                            <div class="col-md-3">
                                                <label for="">NIC/CI</label>
                                                <input disabled type="text" name="" id="nit_ci_cliente" class="form-control">
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mt-5">
                                <div class="card-body shadow-sm rounded">
                                    <h5>Crear compra</h5>

                                    <?php $folio_venta = mt_rand(); ?>
                                    <input type="text" id="folio" hidden value="<?= $folio_venta; ?>">

                                    <div class="form-group">
                                        <label for="">Monto a cancelar</label>
                                        <input id="monto_a_cancelar" type="text" class="form-control" style="border:1px solid #e8f0fe;  background-color: #e8f0fe; color: #1a73e8; font-weight: 600;" value="<?= $precio_total; ?>" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Total pagado</label>
                                        <input id="total_pagado" type="text" class="form-control">
                                    </div>

                                    <script>
                                        $('#total_pagado').keyup(function() {
                                            const total_pagado = $('#total_pagado').val();
                                            const monto_a_cancelar = $('#monto_a_cancelar').val();
                                            const cambio = parseFloat(total_pagado) - parseFloat(monto_a_cancelar);
                                            $('#cambio').val(cambio);
                                        });
                                    </script>

                                    <div class="form-group">
                                        <label for="">Cambio</label>
                                        <input id="cambio" type="text" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <button id="generar_venta" class="btn btn-primary btn-block">
                                            <i class="fa fa-comments-dollar"></i> Generar Venta
                                        </button>

                                        <a class="btn btn-default btn-block mt-3" href="<?= $url ?>/ventas">
                                            Regresar
                                        </a>
                                        <div class="respuesta_generar_venta" id="respuesta_generar_venta"></div>
                                        <script>
                                            $('#generar_venta').click(function() {
                                                const nro_venta = "<?php echo $contador_ventas + 1; ?>";
                                                const id_cliente = $('#id_cliente').val();
                                                const monto_a_cancelar = $('#monto_a_cancelar').val();
                                                const cambio = $('#cambio').val();
                                                const folio_venta = $('#folio').val();

                                                if (id_cliente == '') {
                                                    Swal.fire({
                                                        title: "Error",
                                                        text: "Selecciona un cliente",
                                                        icon: "error"
                                                    });
                                                } else if (folio_venta == '') {
                                                    Swal.fire({
                                                        title: "Algo salio mal",
                                                        text: "No se encontró el número del folio para la venta.",
                                                        icon: "error"
                                                    });
                                                } else if (nro_venta == '') {
                                                    Swal.fire({
                                                        title: "Algo salio mal",
                                                        text: "No se encontró el número de venta referenciado.",
                                                        icon: "error"
                                                    });
                                                } else if (monto_a_cancelar == '') {
                                                    Swal.fire({
                                                        title: "Error",
                                                        text: "El monto a cancelar es requerido.",
                                                        icon: "error"
                                                    });
                                                } else {
                                                    update_stock();
                                                    guardar_la_venta();
                                                }


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
                                                        const stock_calculado = parseFloat(stock_inventario - cantidad_carrito);

                                                        const url_act_stock = "../app/controllers/ventas/actualizar_stock.php";
                                                        $.get(url_act_stock, {
                                                            id_producto: id_producto,
                                                            stock_calculado: stock_calculado
                                                        }, function(datos) {

                                                        });

                                                    }
                                                }

                                                function guardar_la_venta() {
                                                    var url_venta = "../app/controllers/ventas/generar_venta.php";
                                                    $.get(url_venta, {
                                                        id_cliente: id_cliente,
                                                        nro_venta: nro_venta,
                                                        monto_a_cancelar: monto_a_cancelar,
                                                        folio_venta: folio_venta,
                                                        cambio: cambio
                                                    }, function(datos) {
                                                        $('#respuesta_generar_venta').html(datos);
                                                    });
                                                }
                                            });
                                        </script>
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



<!-- Page specific script -->
<script>
    $("#tbclients").DataTable({
        "pageLength": 5,
        "language": {
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Clientes",
            "infoEmpty": "Mostrando 0 a 0 de 0 Clientes",
            "infoFiltered": "(Filtrado de _MAX_ total Clientes)",
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
    }).buttons().container().appendTo('#tbclients_wrapper .col-md-6:eq(0)');
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