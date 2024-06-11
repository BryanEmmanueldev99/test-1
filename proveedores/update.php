<?php
include('../app/config.php');
include('../app/controllers/proveedores/update_proveedores.php');
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
                    <h1 class="m-0"><?= $proveedor_DAO['nombre_proveedor']; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Actualizar Proveedor</a></li>
                        <li class="breadcrumb-item active">Actualizar</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row-6 col-6 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Llene los datos con cuidado</h3>
                    </div>

                    <form class="shadow p-3 bg-white" action="../app/controllers/proveedores/update.php" method="post">
                    <input type="text" name="id_proveedor" value="<?= $proveedor_DAO['id_proveedor']; ?>" hidden>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Nombre del proveedor:</label><b style="color: red;" class="red">*</b>

                                    <input type="text" class="form-control" name="nombre_proveedor" id="nombre_proveedor" value="<?= $proveedor_DAO['nombre_proveedor']; ?>" required />
                                    <small style="color:red; display:none;" id="validate_create_proveedor">*Este campo es requerido.</small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Celular:</label><b style="color: red;" class="red">*</b>
                                    <input type="number" class="form-control" name="celular" id="celular" 
                                    value="<?= $proveedor_DAO['celular']; ?>" required />
                                    <small style="color:red; display:none;" id="validate_create_celular">*Este campo es requerido.</small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Telefono:</label> <b> (Opcional)</b>

                                    <input type="number" class="form-control" name="telefono" id="telefono" value="<?= $proveedor_DAO['telefono']; ?>" />
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Correo electronico:</label> <b> (Opcional)</b>

                                    <input type="email" class="form-control" name="email_proveedor" id="email_proveedor" value="<?= $proveedor_DAO['email_proveedor']; ?>" />
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Nombre de la empresa:</label><b style="color:red;">*</b>

                                    <input type="text" class="form-control" name="empresa" id="empresa" value="<?= $proveedor_DAO['empresa']; ?>" required />
                                    <small style="color:red; display:none;" id="validate_create_empresa">*Este campo es requerido.</small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Dirección:</label><b style="color:red;">*</b>

                                    <textarea class="form-control" name="direccion" id="direccion" required><?= $proveedor_DAO['direccion']; ?></textarea>

                                    <small style="color:red; display:none;" id="validate_create_direccion">*Este campo es requerido.</small>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" id="btn_update_proveedores">Actualizar proveedor</button>
                            <a href="<?php echo $url;  ?>proveedores" class="btn btn-default">Regresar</a>
                        </div>
                    </form>

                </div>
            </div>

            <script>
                $('#btn_update_proveedores').click(function() {

                    var nombre_proveedor = $('#nombre_proveedor').val();
                    var celular = $('#celular').val();
                    var telefono = $('#telefono').val();
                    var direccion = $('#direccion').val();
                    var email_proveedor = $('#email_proveedor').val();
                    var empresa = $('#empresa').val();


                    if (nombre_proveedor == "") {
                        $('#nombre_proveedor').focus();
                        $('#validate_create_proveedor').css('display', 'block');
                    } else if (celular == "") {
                        $('#celular').focus();
                        $('#validate_create_celular').css('display', 'block');
                    } else if (direccion == "") {
                        $('#direccion').focus();
                        $('#validate_create_direccion').css('display', 'block');
                    } else if (empresa == "") {
                        $('#empresa').focus();
                        $('#validate_create_empresa').css('display', 'block');
                    } else {

                    }
                });
            </script>

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
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
<!-- /.control-sidebar -->




<?php
include('../layaout/mensajes.php');
include('../layaout/parte2.php');
?>