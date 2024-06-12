<?php
include('../app/config.php');
include('../layaout/sesion.php');
include('../app/controllers/compras/listado_de_compras.php');
include('../layaout/parte1.php');
?>

<?php /*
if(isset($_SESSION['mensaje'])){
  $respuesta = $_SESSION['mensaje']; ?>



<script>
    Swal.fire({
  title: "<?php echo $respuesta; ?>",
  icon: "success"
});
</script>

<?php } unset($_SESSION['mensaje']); */ ?>




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Listado de compras</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Compras registradas</a></li>
            <li class="breadcrumb-item active">Compras</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Visualización</h3>
        </div>



        <!--new data table-->
        <!-- /.card-header -->
        <div class="card-body shadow-sm rounded">
          <div class="btn-add mb-4">
            <button type="button" class="btn btn-primary" data-toggle="modal"  data-target="#modal-create-compras">
              <i class="fa fa-plus"></i> Agregar Compra
            </button>
          </div>
          <table id="example1" class="table table-bordered table-striped text-center table-sm">
            <thead>
              <tr>
                <th style="width: 10px">Nro</th>
                <th>Nro de Compra</th>
                <th>Producto</th>
                <th>Fecha de compra</th>
                <th>Proveedor</th>
                <th>Comprobante</th>
                <th>Precio compra</th>
                <th>Lote</th>
                <th>Usuario</th>
                <th>Acciones</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $id_front_end = 0;
              foreach ($compras_datos as $compra_DAO) {
                
              ?>
                <tr>
                  <td><?= $id_front_end = $id_front_end + 1; ?></td>
                  <td><?= $compra_DAO['nro_compra']; ?></td>
                  <td>
                    <a href="<?= $url; ?>/almacen/show.php?id=<?= $compra_DAO['id_producto']; ?>" class="btn">
                      <?= $compra_DAO['id_producto']; ?>
                    </a>
                  </td>
                  <td><?= $compra_DAO['fecha_compra']; ?></td>
                  <td><?= $compra_DAO['nombre_proveedor']; ?></td>
                  <td><?= $compra_DAO['comprobante']; ?></td>
                  <td><?= $compra_DAO['precio_compra']; ?></td>
                  <td><?= $compra_DAO['codigo']; ?></td>
                  <td><?= $compra_DAO['nombres']; ?></td>
                  <td>
                    <div class="btn-group">
                      <a href="<?= $url; ?>proveedores/update.php?id=<?php echo $id_proveedor_DAO; ?>" class="btn btn-primary btn-sm">
                        <i class="fa fa-pencil-alt"></i> Editar
                      </a>
                      <a id="#btn-delete-proveedor" href="<?= $url; ?>proveedores/delete.php?id=<?php echo $id_proveedor_DAO; ?>" class="btn btn-primary btn-sm">
                        <i class="fa fa-trash-alt"></i> Borrar
                      </a>
                    </div>
                  </td>
                </tr>
              <?php } ?>

            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
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


<!-- Page specific script -->
<script>
  $("#example1").DataTable({
    "pageLength": 5,
    "language": {
      "emptyTable": "No hay información",
      "info": "Mostrando _START_ a _END_ de _TOTAL_ Compras",
      "infoEmpty": "Mostrando 0 a 0 de 0 Compras",
      "infoFiltered": "(Filtrado de _MAX_ total Compras)",
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

<!--modal para registrar compras-->
<div class="modal fade" id="modal-create-compras">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Crear nuevo proveedor</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../app/controllers/proveedores/create.php" method="post">
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="" class="form-label">Nombre del proveedor:</label><b style="color: red;" class="red">*</b>

                <input type="text" class="form-control" name="nombre_proveedor" id="nombre_proveedor" placeholder="Agrega el nombre del proveedor" required />
                <small style="color:red; display:none;" id="validate_create_proveedor">*Este campo es requerido.</small>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label for="" class="form-label">Celular:</label><b style="color: red;" class="red">*</b>
                <input type="number" class="form-control" name="celular" id="celular" placeholder="Número de celular" required />
                <small style="color:red; display:none;" id="validate_create_celular">*Este campo es requerido.</small>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label for="" class="form-label">Telefono:</label> <b> (Opcional)</b>

                <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Número telefónico" />
              </div>
            </div>


            <div class="col-md-6">
              <div class="mb-3">
                <label for="" class="form-label">Correo electronico:</label> <b> (Opcional)</b>

                <input type="email" class="form-control" name="email_proveedor" id="email_proveedor" placeholder="Correo electrónico" />
              </div>
            </div>


            <div class="col-md-6">
              <div class="mb-3">
                <label for="" class="form-label">Nombre de la empresa:</label><b style="color:red;">*</b>

                <input type="text" class="form-control" name="empresa" id="empresa" placeholder="Empresa" required />
                <small style="color:red; display:none;" id="validate_create_empresa">*Este campo es requerido.</small>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label for="" class="form-label">Dirección:</label><b style="color:red;">*</b>

                <textarea class="form-control" name="direccion" id="direccion" placeholder="Dirección del proveedor" required></textarea>

                <small style="color:red; display:none;" id="validate_create_direccion">*Este campo es requerido.</small>
              </div>
            </div>

          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btn_create_proveedores">Confirmar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          </div>

          <div class="respuesta" id="respuesta"></div>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!--modal producto-->
<div class="modal fade" id="productosshow<?= $compra_DAO['id_producto']; ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Detalles del producto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <div class="row">
               <div class="col-md-6">
                 <input type="text" disabled value="
                 <?= $compra_DAO['codigo']; ?>" class="form-control">
               </div>
               <div class="col-md-6">
                   <input type="text" disabled value="
                   <?= $compra_DAO['nombre']; ?>" class="form-control">
               </div>
           </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



<script>
  $('#btn_create_proveedores').click(function() {

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