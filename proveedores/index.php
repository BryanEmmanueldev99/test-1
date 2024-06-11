<?php
include('../app/config.php');
include('../layaout/sesion.php');
include('../app/controllers/proveedores/listado_de_proveedores.php');
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
          <h1 class="m-0">Listado de proveedores</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Proveedores registrados</a></li>
            <li class="breadcrumb-item active">Proveedores</li>
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-proveedor">
              <i class="fa fa-plus"></i> Agregar Proveedor
            </button>
          </div>
          <table id="example1" class="table table-bordered table-striped text-center responsive table-sm">
            <thead>
              <tr>
                <th style="width: 10px">Nro</th>
                <th>Nombre del proveedor</th>
                <th>Celular</th>
                <th>Telefono</th>
                <th>Empresa</th>
                <th>Correo electrónico</th>
                <th>Dirección</th>
                <th>Acciones</th>

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
                  <td><?= $proveedor['nombre_proveedor']; ?></td>
                  <td><?= $proveedor['celular']; ?></td>
                  <td><?= $proveedor['telefono']; ?></td>
                  <td><?= $proveedor['empresa']; ?></td>
                  <td><?= $proveedor['email_proveedor']; ?></td>
                  <td><?= $proveedor['direccion']; ?></td>

                  <td>
                    <div class="btn-group">

                      <button type="button" class="btn btn-primary rounded" data-toggle="modal" data-target="#modal-update<?php echo $id_proveedor_DAO; ?>">
                        <i class="fa fa-pencil-alt"></i> Editar
                      </button>

                      <!--modal para actualizar proveedor-->
                      <div class="modal fade" id="modal-proveedores<?php echo $id_proveedor_DAO; ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Actualizar proveedor</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="" method="get">
                                <div class="mb-3">
                                  <label for="" class="form-label">Nombre del proveedor: <b style="color:red;">*</b> </label>
                                  <input type="text" class="form-control" id="nombre_categoria<?php echo $id_proveedor_DAO; ?>" value="<?php echo $proveedor_DAO; ?>" />
                                  <small style="color:red; display:none;" id="update_categoria_validate<?php echo $id_proveedor_DAO; ?>">*Este campo es requerido.</small>
                                </div>

                                <div class="modal-footer justify-content-between">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                  <button type="button" class="btn btn-primary" id="btn_update<?php echo $id_proveedor_DAO; ?>">Actualizar la categoría</button>
                                  <div class="respuesta" id="respuesta"></div>
                                </div>

                              </form>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->

                      <script>
                        $('#btn_update<?php echo $id_categoria_DAO; ?>').click(function() {
                          var nombre_categoria = $('#nombre_categoria<?php echo $id_categoria_DAO; ?>').val();
                          var id_categoria = '<?php echo $id_categoria_DAO; ?>';

                          if (nombre_categoria == "") {
                            $('#nombre_categoria<?php echo $id_categoria_DAO; ?>').focus();
                            $('#update_categoria_validate<?php echo $id_categoria_DAO; ?>').css('display', 'block');
                            //alert('*Este campo es requerido');
                          } else {
                            var url = "../app/controllers/proveedores/update_categoria.php";
                            $.get(url, {
                              nombre_categoria: nombre_categoria,
                              id_categoria: id_categoria
                            }, function(datos) {
                              $('#respuesta_update<?php echo $id_categoria_DAO; ?>').html(datos);
                            });
                          }
                        });
                      </script>
                      <div class="respuesta_update" id="respuesta_update<?php echo $id_categoria_DAO; ?>"></div>

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
      "info": "Mostrando _START_ a _END_ de _TOTAL_ Proveedores",
      "infoEmpty": "Mostrando 0 a 0 de 0 Proveedores",
      "infoFiltered": "(Filtrado de _MAX_ total Proveedores)",
      "infoPostFix": "",
      "thousands": ",",
      "lengthMenu": "Mostrar _MENU_ Proveedores",
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

<!--modal para registrar categorias-->
<div class="modal fade" id="modal-create-proveedor">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Crear nuevo proveedor</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="get">
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
                <input type="text" class="form-control" name="celular" id="celular" placeholder="Número de celular" required />
                <small style="color:red; display:none;" id="validate_create_proveedor">*Este campo es requerido.</small>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label for="" class="form-label">Telefono:</label> <b> (Opcional)</b>

                <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Número telefónico" />
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
                <small style="color:red; display:none;" id="validate_create_proveedor">*Este campo es requerido.</small>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label for="" class="form-label">Dirección:</label><b style="color:red;">*</b>

                <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección del proveedor" required />
                <small style="color:red; display:none;" id="validate_create_proveedor">*Este campo es requerido.</small>
              </div>
            </div>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btn_create">Confirmar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <div class="respuesta" id="respuesta"></div>
          </div>

        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



<script>
  $('#btn_create').click(function() {
    //alert('funcioando...');
    const nombre_proveedor = $('#nombre_proveedor').val();
    if (nombre_proveedor == "") {
      $('#nombre_proveedor').focus();
      $('#validate_create_proveedor').css('display', 'block');
    } else {
      const url = "../app/controllers/proveedores/registro_proveedores.php";
      $.get(url, {
        nombre_proveedor: nombre_proveedor
      }, function(datos) {
        $('#respuesta').html(datos);
      });
    }
  });
</script>