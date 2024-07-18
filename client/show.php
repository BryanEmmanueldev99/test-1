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
                    <h1 class="m-0"><?= $cliente_DAO['nombre_cliente']; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Vista previa</a></li>
                        <li class="breadcrumb-item active"><?= $cliente_DAO['nombre_cliente']; ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div>
                <div class="card-body shadow-sm rounded w-50 mx-auto card-show-responsive">
                    
                        <div>
                            <div class="form-group">
                                <label for="nombre_cliente">Razón social:</label>
                                <input type="text" class="form-control" value="<?= $cliente_DAO['nombre_cliente']; ?>" disabled>
                            </div>



                            <div class="form-group">
                                <label for="email_cliente">Correo:</label>
                                <input type="email" class="form-control" id="email_cliente"  value="<?= $cliente_DAO['email_cliente']; ?>" disabled>
                            </div>



                            <div class="form-group">
                                <label for="rol">NIT/CI:</label>
                                <input type="text" class="form-control" value="<?= $cliente_DAO['nit_ci_cliente']; ?>" disabled>
                            </div>

                            <div class="form-group">
                                <label for="celular_cliente">Celular del cliente:</label>
                                <input type="text" value="<?= $cliente_DAO['celular_cliente']; ?>"  class="form-control" disabled>
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