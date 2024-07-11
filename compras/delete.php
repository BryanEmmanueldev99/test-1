<?php

include('../app/config.php');
include('../app/controllers/compras/recuperar_compra.php');
include('../layaout/sesion.php');
include('../auth/staff_de_ventas.php');
include('../layaout/parte1.php');

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> ¿Estas seguro de borrar esta compra? </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Vista previa</a></li>
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

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="codigo">SKU:</label>
                                            <input disabled type="text" value="<?= $detalle_compra['codigo']; ?>" class="form-control">

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="nombre">Nombre del producto:</label>
                                            <input disabled type="text" class="form-control" value="<?= $detalle_compra['nombre_producto']; ?>">
                                            <input id="id_producto" type="text" hidden value="<?= $detalle_compra['id_producto'];  ?>">
                                        </div>
                                    </div>
                                    <!--fin de la fila-->
                                </div>


                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <label for="stock">Stock:</label>
                                            <input disabled type="number" style="border:none; background-color: #cff4fc; color: #055160;" class="form-control" value="<?= $detalle_compra['stock']; ?>">
                                            <small style="color:#055160;">Esta información puede variar</small>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <label for="stock_minimo">Stock minimo:</label>
                                            <input type="number" class="form-control" value="<?= $detalle_compra['stock_minimo']; ?>" disabled>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="stock_maximo">Stock máximo:</label>
                                            <input type="number" class="form-control" value="<?= $detalle_compra['stock_maximo']; ?>" disabled>
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="">Precio compra:</label>
                                            <input type="text" class="form-control" value="<?= $detalle_compra['precio_compra']; ?>" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="precio_venta">Precio venta:</label>
                                            <input type="text" class="form-control" value="<?= $detalle_compra['precio_compra']; ?>" disabled>
                                        </div>
                                    </div>
                                    <!--fin de fila-->
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <label for="fecha_ingreso">Fecha de ingreso:</label>
                                            <input type="date" class="form-control" value="<?= $detalle_compra['fecha_ingreso']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <label for="id_categoria">Categoría:</label>
                                            <input value="<?= $detalle_compra['nombre_categoria']; ?>" class="form-control" type="text" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="descripcion">Descripción del producto:</label>
                                            <textarea name="descripcion" class="form-control" disabled><?= $detalle_compra['nombre_producto']; ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 text-center">
                                    <label class="bg-info p-2">Imagen del producto:</label>
                                    <img class="img-fluid" width="100px" src="<?= $url; ?>almacen/wcstore_img/<?= $detalle_compra['imagen']; ?>" alt="<?= $detalle_compra['imagen']; ?>">
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="container search mb-3 d-flex" style="justify-content:space-around;">
                                        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Proveedor</label>
                                        <input value="<?= $detalle_compra['nombre_proveedor']; ?>" class="form-control" disabled type="text">
                                        <input type="text" id="id_compra" hidden value="<?= $detalle_compra['id_compra'];  ?>">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="">Celular</label>
                                        <input class="form-control" value="<?= $detalle_compra['celular']; ?>" disabled type="text">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="">Telefono</label>
                                        <input class="form-control" value="<?= $detalle_compra['telefono']; ?>" disabled type="text">
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <label for="">Empresa</label>
                                        <input class="form-control" value="<?= $detalle_compra['empresa']; ?>" disabled type="text">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Correo Eléctronico</label>
                                        <input class="form-control" value="<?= $detalle_compra['email_proveedor']; ?>" disabled type="text">
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
                    <label for="">Fecha de la compra</label>
                    <input class="form-control" type="date" value="<?= $detalle_compra['fecha_compra']; ?>" disabled>
                </div>

                <div class="col-md-12">
                    <label for="">Precio de la compra</label>
                    <input class="form-control" type="text" disabled value="<?= $detalle_compra['precio_compra']; ?>">
                </div>

                <div class="col-md-12">
                    <label for="">Comprobante de la compra</label>
                    <input class="form-control" type="text" disabled value="<?= $detalle_compra['comprobante']; ?>">
                </div>



                <div class="col-md-12 text-center">
                    <label for="">Cantidad de la compra</label>
                    <input class="form-control" type="number" value="<?= $detalle_compra['cantidad']; ?>" name="cantidad_compra" id="cantidad_compra" disabled>
                </div>

                
                <div class="col-md-12 mb-3">
                    <label for="">Usuario</label>
                    <input type="text" class="form-control" value="<?= $detalle_compra['nombres']; ?>" disabled>
                </div>

                
                <div class="col-md-12 mb-2">
                    <button id="borrar_compra" class="btn btn-primary btn-block">Borrar compra</button>
                    <a href="<?= $url;  ?>compras/" class="btn btn-default btn-block ">Regresar</a>
                </div>
                <div class="container" id="respuesta_delete"></div>

                       <script>
                           $('#borrar_compra').click(function () {
                                                var id_compra = '<?php echo $detalle_compra['id_compra']; ?>';
                                                var id_producto = $('#id_producto').val();
                                                var cantidad_compra = '<?= $detalle_compra['cantidad']; ?>';
                                                var stock_actual = '<?= $detalle_compra['stock']; ?>';

                                                
                                                var url = "../app/controllers/compras/delete.php";
                                                    $.get(url,{id_compra:id_compra,id_producto:id_producto,cantidad_compra:cantidad_compra,stock_actual:stock_actual},function (datos) {
                                                        $('#respuesta_delete').html(datos);
                                                    });
                                                
                                            });
                       </script>

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

