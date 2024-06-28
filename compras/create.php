<?php
//error_reporting(0);

include('../app/config.php');
include('../app/controllers/almacen/cargar_producto.php');
include('../app/controllers/categorias/listado_de_categorias.php');
include('../app/controllers/almacen/listado_de_productos.php');
include('../app/controllers/proveedores/listado_de_proveedores.php');
include('../app/controllers/compras/listado_de_compras.php');
include('../app/controllers/usuarios/listado_de_usuarios.php');
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
                    <h1 class="m-0">Crear compra</h1>
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

        <!-- /modals-->
        <?php include('../layaout/modals_create_ajax.php'); ?>

        <div class="row">
            <div class="col-md-9">
                <div class="container-fluid p-4">
                    <div class="card">
                        <form class="shadow" enctype="multipart/form-data">

                            <div class="card-body rounded" style="font-size: 12px;">
                                <div class="container search mb-3 d-flex" style="justify-content:space-around;">
                                    <h5 class="mb-3">Información del producto</h5>
                                    <button type="button" class="btn btn-primary rounded btn-sm" data-toggle="modal" data-target="#modal-buscar-producto">
                                        Buscar producto
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="codigo">SKU:</label>
                                            <input disabled type="text" name="codigo" id="codigo" class="form-control">
                                            <input type="text" id="id_producto" name="id_producto" hidden>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="nombre">Nombre del producto:</label>
                                            <input disabled type="text" name="nombre" class="form-control" id="nombre">
                                        </div>
                                    </div>
                                    <!--fin de la fila-->
                                </div>


                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <label for="stock">Stock:</label>
                                            <input disabled type="number" name="stock" class="form-control" id="stock">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <label for="stock_minimo">Stock minimo:</label>
                                            <input type="number" name="stock_minimo" class="form-control" id="stock_minimo" disabled>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="stock_maximo">Stock máximo:</label>
                                            <input type="number" name="stock_maximo" class="form-control" id="stock_maximo" disabled>
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="">Precio compra:</label>
                                            <input type="text" name="compra_precio" class="form-control" id="compra_precio" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="precio_venta">Precio venta:</label>
                                            <input type="text" name="precio_venta" class="form-control" id="precio_venta" disabled>
                                        </div>
                                    </div>
                                    <!--fin de fila-->
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <label for="fecha_ingreso">Fecha de ingreso:</label>
                                            <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <label for="id_categoria">Categoría:</label>
                                            <input id="nombre_categoria" name="nombre_categoria" class="form-control" type="text" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="descripcion">Descripción del producto:</label>
                                            <textarea name="descripcion" class="form-control" name="descripcion" id="descripcion" disabled></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 text-center">
                                    <label class="bg-info p-2">Imagen del producto:</label>
                                    <img class="img-fluid" width="100px" id="imagen" src="" alt="">
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="container search mb-3 d-flex" style="justify-content:space-around;">
                                        <h5 class="mb-3">Información del proveedor</h5>
                                        <button type="button" class="btn btn-primary rounded btn-sm" data-toggle="modal" data-target="#modal-buscar-proveedor">
                                            Buscar proveedor
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" id="id_proveedor" hidden>
                                        <label for="">Proveedor</label>
                                        <input name="nombre_proveedor" id="nombre_proveedor" class="form-control" disabled type="text">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="">Celular</label>
                                        <input class="form-control" name="celular" id="celular" disabled type="text">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="">Telefono</label>
                                        <input class="form-control" name="telefono" id="telefono" disabled type="text">
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <label for="">Empresa</label>
                                        <input class="form-control" name="empresa" id="empresa" disabled type="text">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Correo Eléctronico</label>
                                        <input class="form-control" name="email_proveedor" id="email_proveedor" disabled type="text">
                                    </div>

                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 container">
            <div class="container mt-4 rounded pt-3 pb-3 p-1 shadow-sm bg-white">
                <div class="col-md-12">
                    <?php

                    $contador_num_compras = 1;
                    foreach ($compras_datos as $compras_dato) {
                        $contador_num_compras = $contador_num_compras + 1;
                    } ?>
                    <label for="">Nro. de compra</label>
                    <input value="<?php echo $contador_num_compras; ?>" class="form-control" type="number" name="" id="nro_compra" hidden>
                    <input value="<?php echo $contador_num_compras; ?>" class="form-control" type="number" disabled>
                </div>

                <div class="col-md-12">
                    <label for="">Fecha de la compra</label>
                    <input class="form-control" type="date" name="" id="fecha_compra">
                </div>

                <div class="col-md-12">
                    <label for="">Precio de la compra</label>
                    <input class="form-control" type="text" id="precio_de_compra">
                </div>

                <div class="col-md-12">
                    <label for="">Comprobante de la compra</label>
                    <input class="form-control" type="text" id="comprobante">
                </div>


                <div class="row">
                    <div class="col-md-6 text-center">
                        <label for="">Stock actual</label>
                        <input style="background-color:#ecf7e7; color: #3b4e36; border:none;" class="form-control text-center" type="number" name="stock_actual" id="stock_actual" disabled>
                    </div>
                    <div class="col-md-6 text-center">
                        <label for="">Total de stock</label>
                        <input class="form-control text-center" type="number" id="stock_total" disabled>
                    </div>
                </div>

                <div class="col-md-12 text-center">
                    <label for="">Cantidad de la compra</label>
                    <input class="form-control" type="number" name="cantidad_compra" id="cantidad_compra">
                    <script>
                        $('#cantidad_compra').keyup(function() {
                            const stock_actual = $('#stock_actual').val();
                            const stock_compra = $('#cantidad_compra').val();

                            const total_stock_compra = parseInt(stock_actual) + parseInt(stock_compra);
                            $('#stock_total').val(total_stock_compra);
                        });
                    </script>
                </div>


                <div class="col-md-12 mb-3">
                    <label for="">Usuario</label>
                    <input type="text" class="form-control" id="" value="<?php echo $nombre_sesion; ?>" disabled>
                    <input type="text" id="id_usuario" value="<?php echo $id_sesion_usuario; ?>" hidden>
                </div>

                <div class="col-md-12 mb-2">
                    <button id="generar-compra" class="btn btn-primary btn-block">Generar compra</button>
                    <script>
                        $('#generar-compra').click(function() {

                            const id_producto = $('#id_producto').val();
                            const nro_compra = $('#nro_compra').val();
                            const fecha_compra = $('#fecha_compra').val();
                            const id_proveedor = $('#id_proveedor').val();
                            const comprobante = $('#comprobante').val();
                            const id_usuario = "<?php echo $id_sesion_usuario; ?>";
                            const precio_de_compra = $('#precio_de_compra').val();
                            const cantidad_compra = $('#cantidad_compra').val();
                            const stock_total = $('#stock_total').val();
                            //alert(stock_total)

                            if (id_producto == "") {
                               $('#id_producto').focus();
                               alert('Debe llenar todos los campos.');
                            } 
                            else if(fecha_compra == ""){
                                $('#fecha_compra').focus();
                               alert('Debe llenar todos los campos.');
                            }
                            else if(comprobante == ""){
                                $('#comprobante').focus();
                               alert('Debe llenar todos los campos.');
                            }
                            else if(id_usuario == ""){
                                $('#id_usuario').focus();
                               alert('Debe llenar todos los campos.');
                            }
                            else if(precio_de_compra == ""){
                                $('#precio_de_compra').focus();
                               alert('Debe llenar todos los campos.');
                            }
                            else if(cantidad_compra == ""){
                                $('#cantidad_compra').focus();
                               alert('Debe llenar todos los campos.');
                            }
                            else {

                                var url = "../app/controllers/compras/create.php";
                                $.get(url, {id_proveedor:id_proveedor,nro_compra:nro_compra,id_producto:id_producto,fecha_compra:fecha_compra,comprobante:comprobante,id_usuario:id_usuario,precio_de_compra:precio_de_compra,cantidad_compra:cantidad_compra,stock_total:stock_total}, function (datos) {
                                $('#respuesta_compras').html(datos);
                                });
                                //alert('enviando')
                            }
                        });
                    </script>
                </div>
                <div class="col-md-12 mb-2">
                    <a href="<?= $url;  ?>compras/" class="btn btn-default btn-block ">Regresar</a>
                </div>
                <div class="container" id="respuesta_compras"></div>
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