<!--modal para buscador productos-->
<div class="modal fade" id="modal-buscar-cliente">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Busca algún cliente</h4>
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
                                <th>Nombre del cliente</th>
                                <th>NIT/CI</th>
                                <th>Celular</th>
                                <th>Correo</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $contador_cliente = 0;
                            $id_front_end = 0;
                            foreach ($clientes_info as $cliente_DAO) {
                                $id_cliente = $cliente_DAO['id_cliente'];
                            ?>
                                <tr>
                                    <td><?php echo $id_front_end = $id_front_end + 1; ?></td>
                                    <td>
                                        <button type="button" id="btn_selecionar_cliente<?php echo $id_cliente; ?>" class="btn btn-primary">Seleccionar</button>
                                    </td>
                                    <td><?= $cliente_DAO['nombre_cliente']; ?></td>
                                    <td><?= $cliente_DAO['nit_ci_cliente']; ?></td>
                                    <td><?= $cliente_DAO['celular_cliente']; ?></td>
                                    <td><?= $cliente_DAO['email_cliente']; ?></td>
                                </tr>

                                <script>
                                    $('#btn_selecionar_cliente<?php echo $id_cliente; ?>').click(function() {

                                        const nombre_cliente = "<?php echo $cliente_DAO['nombre_cliente'] ?>";
                                        $('#nombre_cliente').val(nombre_cliente);
                                        const celular_cliente = "<?php echo $cliente_DAO['celular_cliente'] ?>";
                                        $('#celular_cliente').val(celular_cliente);
                                        const email_cliente = "<?php echo $cliente_DAO['email_cliente'] ?>";
                                        $('#email_cliente').val(email_cliente);
                                        const nit_ci_cliente = "<?php echo $cliente_DAO['nit_ci_cliente'] ?>";
                                        $('#nit_ci_cliente').val(nit_ci_cliente);

                                        //cierra el modal al seleccionar un producto
                                        $('#modal-buscar-cliente').modal('toggle');
                                    });
                                </script>
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