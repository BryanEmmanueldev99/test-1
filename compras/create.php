<?php
//error_reporting(0);

include('../app/config.php');
include('../app/controllers/almacen/cargar_producto.php');
include('../app/controllers/categorias/listado_de_categorias.php');
include('../app/controllers/almacen/listado_de_productos.php');
include('../app/controllers/proveedores/listado_de_proveedores.php');
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

                            <div class="card-body" style="font-size: 12px;">
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
                                            <label for="precio_compra">Precio compra:</label>
                                            <input type="number" name="precio_compra" class="form-control" id="precio_compra" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="precio_venta">Precio venta:</label>
                                            <input type="number" name="precio_venta" class="form-control" id="precio_venta" disabled>
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
                                

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Actualizar producto</button>
                                    <a href="<?= $url;  ?>almacen" class="btn btn-default">Regresar</a>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 container">
            <div class="col-md-12">
                <label for="">Nro. de compra</label>
                <input class="form-control" type="number" name="" id="">
            </div>

            <div class="col-md-12">
                <label for="">Fecha de la compra</label>
                <input class="form-control" type="date" name="" id="">
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