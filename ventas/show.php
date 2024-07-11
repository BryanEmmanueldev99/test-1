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
                    <h1 class="m-0">Detalles de la venta <?= $venta['nro_venta']; ?></h1>
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
           
           $sql_carrito = "SELECT *, producto.nombre AS nombre_producto, producto.precio_venta AS precio, producto.stock AS stock, producto.id_producto AS id_producto, producto.stock_minimo AS inventario_minimo, 
           producto.imagen AS Foto
           FROM tb_carrito AS carrito INNER JOIN tb_almacen AS producto 
           ON carrito.id_producto = producto.id_producto WHERE nro_venta = '$nro_venta'";
           $query_carrito = $pdo->prepare($sql_carrito);
           $query_carrito->execute();
           $carrito_datos = $query_carrito->fetchAll(PDO::FETCH_ASSOC);

           foreach($carrito_datos as $row_carro){
                 
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
                                        <a class="btn btn-default btn-block" href="<?= $url ?>/ventas">
                                           Regresar
                                        </a>
                                       
                                       
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