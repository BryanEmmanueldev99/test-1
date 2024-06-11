<?php 
include('../app/config.php'); 
include('../layaout/sesion.php');
include('../app/controllers/categorias/listado_de_categorias.php');
include('../layaout/parte1.php'); 
?>

<?php /* sesion reactivar cuando se requiera
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
            <h1 class="m-0">Listado de categorías</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Categorías registradas</a></li>
              <li class="breadcrumb-item active">Categorías</li>
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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
                  <i class="fa fa-plus"></i>  Agregar Categoría
                </button>
              </div>
                <table id="example1" class="table table-bordered table-striped text-center">
                <thead>
<tr>
<th style="width: 10px">ID</th>
<th>Nombre de la categoría</th>
<th>Acciones</th>

</tr>
</thead>

 <tbody>
  <?php 
  $id_front_end = 0;
  foreach($categorias_info as $categoria) { 
     $id_categoria_DAO = $categoria['id_categoria'];
     $categoria_DAO = $categoria['nombre_categoria'];
    ?>
<tr>
<td><?php echo $id_front_end = $id_front_end + 1; ?></td>
<td><?php echo $categoria['nombre_categoria']; ?></td>

<td>
   <div class="btn-group">
     
      <button type="button" class="btn btn-primary rounded" data-toggle="modal" data-target="#modal-update<?php echo $id_categoria_DAO; ?>">
                <i class="fa fa-pencil-alt"></i> Editar
      </button>

      <!--modal para actualizar categoria-->
       <div class="modal fade" id="modal-update<?php echo $id_categoria_DAO; ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Actualizar categoría</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <form action="" method="get">
                  <div class="mb-3">
                    <label for="" class="form-label">Nombre de la Categoría: <b style="color:red;">*</b> </label>
                    <input
                      type="text"
                      class="form-control"
                      id="nombre_categoria<?php echo $id_categoria_DAO; ?>"
                      value="<?php echo $categoria_DAO; ?>"
                    />
                    <small style="color:red; display:none;" id="update_categoria_validate<?php echo $id_categoria_DAO; ?>">*Este campo es requerido.</small>
                  </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary" id="btn_update<?php echo $id_categoria_DAO; ?>">Actualizar la categoría</button>
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
        $('#btn_update<?php echo $id_categoria_DAO; ?>').click(function () { 
          var nombre_categoria = $('#nombre_categoria<?php echo $id_categoria_DAO; ?>').val();
          var id_categoria = '<?php echo $id_categoria_DAO; ?>';
          
          if(nombre_categoria == ""){
           $('#nombre_categoria<?php echo $id_categoria_DAO; ?>').focus();
           $('#update_categoria_validate<?php echo $id_categoria_DAO; ?>').css('display','block');
           //alert('*Este campo es requerido');
       }else{
          var url = "../app/controllers/categorias/update_categoria.php";
          $.get(url, {nombre_categoria:nombre_categoria, id_categoria:id_categoria}, function (datos) {
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Categorías",
                "infoEmpty": "Mostrando 0 a 0 de 0 Categorías",
                "infoFiltered": "(Filtrado de _MAX_ total Categorías)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Categorías",
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
      "responsive": true, "lengthChange": true, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
</script>

<!--modal para registrar categorias-->
  <div class="modal fade" id="modal-create">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Crear nueva categoría</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <form action="" method="get">
                  <div class="mb-3">
                    <label for="" class="form-label">Nombre de la Categoría:</label><b style="color: red;" class="red">*</b>

                    <input
                      type="text"
                      class="form-control"
                      name="nombre_categoria"
                      id="nombre_categoria"
                      placeholder="Agrega un nombre para la categoría"
                      required
                    />
                    <small style="color:red; display:none;" id="validate_create_categoria">*Este campo es requerido.</small>
                  </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary" id="btn_create">Confirmar</button>
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
   $('#btn_create').click(function () {
       //alert('funcioando...');
       var nombre_categoria = $('#nombre_categoria').val();
       if(nombre_categoria == ""){
           $('#nombre_categoria').focus();
           $('#validate_create_categoria').css('display','block');
       }else{
        var url = "../app/controllers/categorias/registro_categorias.php";
        $.get(url, {nombre_categoria:nombre_categoria}, function (datos) {
             $('#respuesta').html(datos);
       });
       }
   });
</script>


