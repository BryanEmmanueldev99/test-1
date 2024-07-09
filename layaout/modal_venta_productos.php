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
            <div class="modal-body" style="background-color: ghostwhite;">
                <!-- /.card-header -->
                <div class="card-body shadow-sm rounded almacen table-responsive mb-5 mt-5">
                    <table id="almacentb" class="table table-bordered table-striped table-sm text-center">
                        <thead>
                            <tr>
                                <th style="width: 30px">Nro</th>
                                <th>Acción</th>
                                <th>Foto</th>
                                <th>SKU</th>
                                <th>Nombre</th>
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
                                        <button type="button" id="btn_selecionar<?php echo $id_producto_DAO; ?>" class="btn btn-primary">Seleccionar</button>

                                        <?php include('productos_ventas.php') ?>
                                    </td>
                                    <td>
                                        <img class="img-fluid img-thumbnail shadow-sm" width="100px" src="<?= $file_producto; ?>" alt="<?= $producto['nombre']; ?>">
                                    </td>
                                    <td><?= $producto['codigo'] ?></td>
                                    <td><?= $producto['nombre'] ?></td>
                                    <td><?= $producto['stock'] ?></td>
                                    <td><?= $producto['precio_compra'] ?></td>
                                    <td><?= $producto['precio_venta'] ?></td>
                                    <td><?= $producto['fecha_ingreso'] ?></td>
                                    <td><?= $producto['nombre_categoria'] ?></td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col-md-5">
                            <label for="">Producto</label>
                            <input type="text" id="producto" class="form-control" disabled>
                        </div>

                        <div class="col-md-3">
                            <label for="">Categoria</label>
                            <input type="text" id="categoria" class="form-control" disabled>
                        </div>

                        <div class="col-md-2">
                            <label for="">Cantidad</label>
                            <input type="number" id="cantidad" required class="form-control">
                        </div>

                        <div class="col-md-2">
                            <label for="">Precio unitario</label>
                            <input type="text" id="precio_unitario" class="form-control" disabled>
                            <input type="text" id="id_producto" class="form-control" hidden>
                        </div>
                    </div>

                    <div class="container mt-3">
                        <button class="btn btn-primary" id="btn_add_carrito"><i class="fa fa-shopping-cart"></i> Agregar producto al carrito</button>
                    </div>

                    <div class="data_carrito" id="respuesta_carrito"></div>

                    <script>
                        $('#btn_add_carrito').click(function() {
                            const nro_venta = '<?php echo $contador_ventas + 1; ?>';
                            const id_producto = $('#id_producto').val();
                            const cantidad = $('#cantidad').val();
                            const nombre_c_cantidad = "cantidad";

                            if (id_producto == '') {
                                Swal.fire({
                                    title: "¡Campos Vacios!",
                                    text: "Debes llenar todos los campos",
                                    icon: "error"
                                });
                            } else if (cantidad == '') {
                                Swal.fire({
                                    title: "¡Campo Vacio!",
                                    text: "El campo "+nombre_c_cantidad+" es requerido.",
                                    icon: "error"
                                });
                            } else {
                                const url_carrito = "../app/controllers/ventas/agregar_al_carrito.php";
                                $.get(url_carrito, {
                                    nro_venta:nro_venta,
                                    id_producto:id_producto,
                                    cantidad:cantidad
                                }, function (datos) {
                                $('#respuesta_carrito').html(datos);
                                });
                            }
                        });
                    </script>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->