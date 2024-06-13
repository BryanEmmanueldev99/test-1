<?php
//error_reporting(0);

include('../app/config.php');
include('../app/controllers/almacen/cargar_producto.php');
include('../app/controllers/categorias/listado_de_categorias.php');
include('../app/controllers/almacen/listado_de_productos.php');
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
                    <h1 class="m-0">Vista previa de <?= $producto_DAO['nombre']; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Vista previa</a></li>
                        <li class="breadcrumb-item active"><?= $producto_DAO['nombre']; ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="w-75 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Datos del producto</h3>
                    </div>


                    <!--modal para buscador productos-->
                    <div class="modal fade" id="modal-buscar-producto">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Busca algún producto</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- /.card-header -->
                                    <div class="card-body shadow rounded almacen table-responsive mb-5 mt-5">
                                        <table id="almacentb_m" class="table table-bordered table-striped table-responsive text-center">
                                            <thead>
                                                <tr>
                                                    <th style="width: 30px">Nro</th>
                                                    <th>Foto</th>
                                                    <th>SKU</th>
                                                    <th>Nombre</th>
                                                    <th>Seleccionar</th>
                                                    <th>Stock</th>
                                                    <th>Precio Compra</th>
                                                    <th>Precio Venta</th>
                                                    <th>Fecha de ingreso</th>
                                                    <th>Categoría:</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $id_front_end = 0;
                                                foreach ($productos_info as $producto) {
                                                    $id_producto_DAO = $producto['id_producto'];
                                                    $img_producto = $producto['imagen'];
                                                    $file_producto = $url . "almacen/wc_img_productos/$img_producto";
                                                ?>
                                                    <tr>
                                                        <td><?php echo $id_front_end = $id_front_end + 1; ?></td>
                                                        <td>
                                                            <button id="btn-seleccionar"<?= $id_producto_DAO; ?> class="btn btn-primary">Seleccionar</button>
                                                        </td>
                                                        <td>
                                                            <img class="img-fluid img-thumbnail shadow-sm" width="100px" src="<?= $file_producto; ?>" alt="<?= $producto['nombre']; ?>">
                                                        </td>
                                                        <td><?php echo $producto['codigo'] ?></td>
                                                        <td><?php echo $producto['nombre'] ?></td>
                                                        <td><?php echo $producto['stock'] ?></td>
                                                        <td><?php echo $producto['precio_compra'] ?></td>
                                                        <td><?php echo $producto['precio_venta'] ?></td>
                                                        <td><?php echo $producto['fecha_ingreso'] ?></td>
                                                        <td><?php echo $producto['nombre_categoria'] ?></td>
                                                    </tr>
                                                <?php } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->


                    <form class="shadow" enctype="multipart/form-data">

                        <div class="card-body">
                            <div class="container search mb-2">
                                <button type="button" class="btn btn-primary rounded" data-toggle="modal" data-target="#modal-buscar-producto">
                                    Buscar producto
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>

                            <div class="row">
                                <div class="respuesta_update" id="respuesta_update<?php echo $id_categoria_DAO; ?>"></div>


                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="codigo">SKU:</label>
                                        <input type="text" name="codigo" id="codigo" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="nombre">Nombre del producto:</label>
                                        <input type="text" name="nombre" class="form-control" id="nombre">
                                    </div>
                                </div>
                                <!--fin de la fila-->
                            </div>


                            <div class="form-group mb-3">
                                <label for="descripcion">Descripción del producto:</label>
                                <textarea disabled name="descripcion" class="form-control" id="descripcion"><?= $producto_DAO['descripcion']; ?></textarea>
                            </div>



                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="stock">Stock:</label>
                                        <input type="number" name="stock" class="form-control" id="stock" value="<?= $producto_DAO['stock']; ?>" disabled>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="stock_minimo">Stock minimo:</label>
                                        <input type="number" name="stock_minimo" class="form-control" id="stock_minimo" value="<?= $producto_DAO['stock_minimo']; ?>" disabled>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="stock_maximo">Stock máximo:</label>
                                        <input type="number" name="stock_maximo" class="form-control" id="stock_maximo" value="<?= $producto_DAO['stock_maximo']; ?>" disabled>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="precio_compra">Precio compra:</label>
                                        <input type="number" name="precio_compra" class="form-control" id="precio_compra" value="<?= $producto_DAO['precio_compra']; ?>" disabled>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="precio_venta">Precio venta:</label>
                                        <input type="number" name="precio_venta" class="form-control" id="precio_venta" value="<?= $producto_DAO['precio_venta']; ?>" disabled>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="precio_venta">Precio venta:</label>
                                        <input type="number" name="precio_venta" class="form-control" id="precio_venta" >
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="fecha_ingreso">Fecha de ingreso:</label>
                                        <input type="date" name="fecha_ingreso" class="form-control" >
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="precio_venta">Usuario</label>
                                        <input type="text" class="form-control">
                                        <input type="text" name="id_usuario" class="form-control" id="id_usuario">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="id_categoria">Categoría:</label>
                                        <input class="form-control" type="text">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">

                                        <img class="img-fluid" width="100%" src="" alt="...">

                                    </div>
                                </div>

                                <!--fin de fila-->
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Actualizar producto</button>
                            <a href="<?= $url;  ?>almacen" class="btn btn-default">Regresar</a>
                        </div>
                    </form>
                </div>




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
    $("#almacentb_m").DataTable({
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