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

                                        <?php include('recupera_productos.php') ?>
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
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!--modal para buscador productos-->
<div class="modal fade" id="modal-buscar-proveedor">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Buscar algún proveedor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background-color: ghostwhite;">
                <!-- /.card-header -->
                <div class="card-body shadow-sm rounded almacen table-responsive mb-5 mt-5">
                    <table id="example1" class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th style="width: 10px">Nro</th>
                                <th>
                                    Acción
                                </th>
                                <th>Nombre del proveedor</th>
                                <th>Celular</th>
                                <th>Telefono</th>
                                <th>Empresa</th>
                                <th>Correo electrónico</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $id_front_end = 0;
                            foreach ($proveedores_info as $proveedor) {
                                $id_proveedor_DAO = $proveedor['id_proveedor'];
                                $proveedor_DAO = $proveedor['nombre_proveedor'];
                            ?>
                                <tr>
                                    <td><?= $id_front_end = $id_front_end + 1; ?></td>
                                    <td>
                                        <button class="btn btn-primary" id="btn_selecionar_proveedor<?php echo $proveedor['id_proveedor']; ?>">
                                            Seleccionar
                                        </button>

                                        <?php include('recupera_proveedores.php');  ?>
                                    </td>
                                    <td><?= $proveedor['nombre_proveedor']; ?></td>
                                    <td>
                                        <div class="d-flex" style="gap: 5px; justify-content:center;">
                                            <p><?= $proveedor['celular']; ?></p>
                                            <a href="https://wa.me/<?= $proveedor['celular']; ?>" target="_blank" rel="noopener noreferrer">
                                                <svg class="icono-proveedor-ws" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                    <path fill="#09be88" d="M92.1 254.6c0 24.9 7 49.2 20.2 70.1l3.1 5-13.3 48.6L152 365.2l4.8 2.9c20.2 12 43.4 18.4 67.1 18.4h.1c72.6 0 133.3-59.1 133.3-131.8c0-35.2-15.2-68.3-40.1-93.2c-25-25-58-38.7-93.2-38.7c-72.7 0-131.8 59.1-131.9 131.8zM274.8 330c-12.6 1.9-22.4 .9-47.5-9.9c-36.8-15.9-61.8-51.5-66.9-58.7c-.4-.6-.7-.9-.8-1.1c-2-2.6-16.2-21.5-16.2-41c0-18.4 9-27.9 13.2-32.3c.3-.3 .5-.5 .7-.8c3.6-4 7.9-5 10.6-5c2.6 0 5.3 0 7.6 .1c.3 0 .5 0 .8 0c2.3 0 5.2 0 8.1 6.8c1.2 2.9 3 7.3 4.9 11.8c3.3 8 6.7 16.3 7.3 17.6c1 2 1.7 4.3 .3 6.9c-3.4 6.8-6.9 10.4-9.3 13c-3.1 3.2-4.5 4.7-2.3 8.6c15.3 26.3 30.6 35.4 53.9 47.1c4 2 6.3 1.7 8.6-1c2.3-2.6 9.9-11.6 12.5-15.5c2.6-4 5.3-3.3 8.9-2s23.1 10.9 27.1 12.9c.8 .4 1.5 .7 2.1 1c2.8 1.4 4.7 2.3 5.5 3.6c.9 1.9 .9 9.9-2.4 19.1c-3.3 9.3-19.1 17.7-26.7 18.8zM448 96c0-35.3-28.7-64-64-64H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96zM148.1 393.9L64 416l22.5-82.2c-13.9-24-21.2-51.3-21.2-79.3C65.4 167.1 136.5 96 223.9 96c42.4 0 82.2 16.5 112.2 46.5c29.9 30 47.9 69.8 47.9 112.2c0 87.4-72.7 158.5-160.1 158.5c-26.6 0-52.7-6.7-75.8-19.3z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                    <td><?= $proveedor['telefono']; ?></td>
                                    <td><?= $proveedor['empresa']; ?></td>
                                    <td><?= $proveedor['email_proveedor']; ?></td>

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