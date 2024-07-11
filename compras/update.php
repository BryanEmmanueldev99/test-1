<?php

include('../app/config.php');
include('../app/controllers/compras/recuperar_compra.php');
include('../layaout/sesion.php');
include('../auth/staff_de_ventas.php');
include('../layaout/parte1.php');
include('../app/controllers/almacen/listado_de_productos.php');
include('../app/controllers/proveedores/listado_de_proveedores.php');

?>

<!-- /modals-->
<?php include('../layaout/modals_create_ajax.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Actualizar datos de la compra </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Actualizar</a></li>
                        <li class="breadcrumb-item active"><?= $detalle_compra['nro_compra']; ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">

        <div class="row">
            <div class="col-md-9">
                <div class="container-fluid p-4">
                    <div class="card">
                        <form class="shadow" enctype="multipart/form-data">

                            <div class="card-body rounded" style="font-size: 12px;">
                                <div class="container search mb-3 d-flex" style="justify-content:space-around;">
                                    <h5 class="mb-3">Llene los datos con cuidado</h5>
                                    <button type="button" class="btn btn-primary rounded btn-sm" data-toggle="modal" data-target="#modal-buscar-producto">
                                        Buscar producto
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <input type="text" id="id_producto" value="<?= $detalle_compra['id_producto']; ?>" hidden>
                                            <label for="codigo">SKU:</label>
                                            <input id="codigo" type="text" value="<?= $detalle_compra['codigo']; ?>" class="form-control" disabled>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="nombre">Nombre del producto:</label>
                                            <input id="nombre" type="text" class="form-control" value="<?= $detalle_compra['nombre_producto']; ?>" disabled>
                                        </div>
                                    </div>
                                    <!--fin de la fila-->
                                </div>


                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <label for="stock">Stock:</label>
                                            <input  type="number" style="border:none; background-color: #cff4fc; color: #055160;" class="form-control" id="stock" value="<?= $detalle_compra['stock']; ?>" disabled>
                                            <small style="color:#055160;">Esta información puede variar</small>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <label for="stock_minimo">Stock minimo:</label>
                                            <input type="number" id="stock_minimo" class="form-control" value="<?= $detalle_compra['stock_minimo']; ?>" disabled>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="stock_maximo">Stock máximo:</label>
                                            <input type="number" id="stock_maximo" class="form-control" value="<?= $detalle_compra['stock_maximo']; ?>" disabled>
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="">Precio compra:</label>
                                            <input  id="compra_precio" type="text" class="form-control" value="<?= $detalle_compra['precio_compra']; ?>" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="precio_venta">Precio venta:</label>
                                            <input id="compra_venta" type="text" class="form-control" value="<?= $detalle_compra['precio_compra']; ?>" disabled>
                                        </div>
                                    </div>
                                    <!--fin de fila-->
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <label for="fecha_ingreso">Fecha de ingreso:</label>
                                            <input id="fecha_ingreso" type="date" class="form-control" value="<?= $detalle_compra['fecha_ingreso']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <label for="id_categoria">Categoría:</label>
                                            <input id="nombre_categoria"  value="<?= $detalle_compra['nombre_categoria']; ?>" class="form-control" disabled type="text">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="descripcion">Descripción del producto:</label>
                                            <textarea
                                            disabled
                                            id="descripcion" 
                                            name="descripcion" class="form-control"><?= $detalle_compra['descripcion']; ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 text-center">
                                    <label class="bg-info p-2">Imagen del producto:</label>
                                    <img id="imagen" class="img-fluid" width="100px" src="<?= $url; ?>almacen/wcstore_img/<?= $detalle_compra['imagen']; ?>" alt="<?= $detalle_compra['imagen']; ?>">
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="container search mb-3 d-flex" style="justify-content:space-around;">

                                    </div>
                                </div>

                                <div class="row">

                                    <div class="container search mb-3 d-flex" style="justify-content:space-around;">
                                        <h5 class="mb-3">Información del proveedor</h5>
                                        <button type="button" class="btn btn-primary rounded btn-sm" data-toggle="modal" data-target="#modal-buscar-proveedor">
                                            Buscar proveedor
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>


                                    <div class="col-md-6">
                                        <label for="">Proveedor</label>
                                        <input type="text" id="id_proveedor" value="<?= $detalle_compra['id_proveedor']; ?>" hidden>
                                        <input id="nombre_proveedor" disabled value="<?= $detalle_compra['nombre_proveedor']; ?>" class="form-control" type="text">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="">Celular</label>
                                        <input class="form-control" id="celular" disabled value="<?= $detalle_compra['celular']; ?>" type="text">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="">Telefono</label>
                                        <input class="form-control" disabled id="telefono" value="<?= $detalle_compra['telefono']; ?>" type="text">
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <label for="">Empresa</label>
                                        <input disabled id="empresa" class="form-control" value="<?= $detalle_compra['empresa']; ?>" type="text">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Correo Eléctronico</label>
                                        <input id="email_proveedor" disabled class="form-control" value="<?= $detalle_compra['email_proveedor']; ?>" type="text">
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
                    <label for="">Nro de compra</label>
                    <input class="form-control" type="number" id="nro_compra" name="nro_compra" value="<?= $detalle_compra['nro_compra']; ?>">
            </div>

                <div class="col-md-12">
                    <label for="">Fecha de la compra</label>
                    <input class="form-control" type="date" id="fecha_compra" value="<?= $detalle_compra['fecha_compra']; ?>">
                </div>

                <div class="col-md-12">
                    <label for="">Precio de la compra</label>
                    <input class="form-control" id="precio_de_compra" type="text" value="<?= $detalle_compra['precio_de_compra']; ?>">
                </div>

                <div class="col-md-12">
                    <label for="">Comprobante de la compra</label>
                    <input class="form-control" id="comprobante" type="text" value="<?= $detalle_compra['comprobante']; ?>">
                </div>


                <div class="row">
                    <div class="col-md-6 text-center">
                        <label for="">Stock actual</label>
                        <input style="background-color:#ecf7e7; color: #3b4e36; border:none;" class="form-control text-center" type="number" value="<?php echo $detalle_compra['stock']; ?>" name="stock_actual" id="stock_actual" disabled>
                    </div>
                    <div class="col-md-6 text-center">
                        <label for="">Total de stock</label>
                        <input class="form-control text-center"   type="number" id="stock_total" disabled>
                    </div>
                </div>

                <div class="col-md-12 text-center">
                    <label for="">Cantidad de la compra</label>
                    <input class="form-control" type="number" value="<?= $detalle_compra['cantidad']; ?>" name="cantidad_compra" id="cantidad_compra">
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
                    <input type="text" class="form-control" value="<?= $detalle_compra['nombres']; ?>" disabled>
                </div>


                <input type="hidden" id="id_compra" value="<?php echo $detalle_compra['id_compra']; ?>">

                <div class="col-md-12 mb-2">
                    <button id="actualizar-compra" class="btn btn-primary btn-block">Actualizar compra</button>
                    <script>
                        $('#actualizar-compra').click(function() {
                            
                            const id_compra = <?php echo $detalle_compra['id_compra']; ?>;
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
                            } else if (fecha_compra == "") {
                                $('#fecha_compra').focus();
                                alert('Debe llenar todos los campos.');
                            } else if (comprobante == "") {
                                $('#comprobante').focus();
                                alert('Debe llenar todos los campos.');
                            } else if (id_usuario == "") {
                                $('#id_usuario').focus();
                                alert('Debe llenar todos los campos.');
                            } else if (precio_de_compra == "") {
                                $('#precio_de_compra').focus();
                                alert('Debe llenar todos los campos.');
                            } else if (cantidad_compra == "") {
                                $('#cantidad_compra').focus();
                                alert('Debe llenar todos los campos.');
                            } else {

                                var url = "../app/controllers/compras/update.php";
                                $.get(url, {
                                    id_compra:id_compra,
                                    id_proveedor: id_proveedor,
                                    nro_compra: nro_compra,
                                    id_producto: id_producto,
                                    fecha_compra: fecha_compra,
                                    comprobante: comprobante,
                                    id_usuario: id_usuario,
                                    precio_de_compra: precio_de_compra,
                                    cantidad_compra: cantidad_compra,
                                    stock_total: stock_total
                                }, function(datos) {
                                    $('#respuesta_compras_actualizacion').html(datos);
                                });
                                //alert('enviando')
                            }
                        });
                    </script>
                </div>
                <div class="col-md-12 mb-2">
                    <a href="<?= $url;  ?>compras/" class="btn btn-default btn-block ">Regresar</a>
                </div>
                <div class="container" id="respuesta_compras_actualizacion"></div>
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