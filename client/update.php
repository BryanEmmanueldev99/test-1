<?php
include('../app/config.php');
include('../layaout/sesion.php');
include('../auth/index.php');
include('../app/controllers/clientes/recupera_cliente.php');
?>


<?php include('../layaout/parte1.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Actualizar cliente</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Actualizar cliente</a></li>
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
                        <h3 class="card-title">Introduzca los datos cuidadosamente</h3>
                    </div>


                    <form class="shadow" action="../app/controllers/clientes/update.php" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nombre_cliente">Razón social:</label>
                                <input type="text" name="nombre_cliente" class="form-control" id="nombre_cliente" placeholder="Nombre" value="<?= $cliente_DAO['nombre_cliente']; ?>" required>
                            </div>



                            <div class="form-group">
                                <label for="email_cliente">Correo:</label>
                                <input type="text" value="<?= $id_cliente; ?>" name="id_cliente" hidden>
                                <input type="email" name="email_cliente" class="form-control" id="email_cliente" placeholder="Correo" value="<?= $cliente_DAO['email_cliente']; ?>" required>
                            </div>



                            <div class="form-group">
                                <label for="rol">NIT/CI:</label>
                                <input type="text" class="form-control" value="<?= $cliente_DAO['nit_ci_cliente']; ?>" name="nit_ci_cliente" id="nit_ci_cliente" required>
                            </div>

                            <div class="form-group">
                                <label for="celular_cliente">Celular del cliente:</label>
                                <input type="text" value="<?= $cliente_DAO['celular_cliente']; ?>" name="celular_cliente" class="form-control" id="celular_cliente" placeholder="Password" required>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Confirmar</button>
                            <a href="<?php echo $url;  ?>client/" class="btn btn-default">Regresar</a>
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
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
<!-- /.control-sidebar -->




<?php
include('../layaout/mensajes.php');
include('../layaout/parte2.php');
?>