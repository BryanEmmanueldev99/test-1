<?php 
include('../app/config.php'); 
include('../layaout/sesion.php');
include('../app/controllers/almacen/listado_de_productos.php');
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
            <h1 class="m-0">Listado de productos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Listado de productos</a></li>
              <li class="breadcrumb-item active">Productos</li>
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

<style>
.child ul li {
    list-style: none;
}
</style>

<!--new data table-->
              <!-- /.card-header -->
              <div class="card-body shadow-sm rounded almacen table-responsive">
                <table id="almacentb" class="table table-bordered table-striped table-responsive table-sm text-center">
              <thead>
<tr>
<th style="width: 30px">Nro</th>
<th>Foto</th>
<th>SKU</th>
<th>Nombre</th>
<th>Descripción</th>
<th>Stock</th>
<th>Precio Compra</th>
<th>Precio Venta</th>
<th>Fecha de ingreso</th>
<th>Categoría:</th>
<th>Acciones</th>
</tr>
</thead>

 <tbody>
  <?php 
  $id_front_end = 0;
  foreach($productos_info as $producto) { 
     $id_producto_DAO = $producto['id_producto'];
     $img_producto = $producto['imagen'];
     $file_producto = $url."almacen/wc_img_productos/$img_producto";
  ?>
<tr>
<td><?php echo $id_front_end = $id_front_end + 1; ?></td>
<td>
  <img class="img-fluid img-thumbnail shadow-sm" width="100px" src="<?= $file_producto; ?>" 
  alt="<?= $producto['nombre']; ?>"> 
</td>
<td><?php echo $producto['codigo'] ?></td>
<td><?php echo $producto['nombre'] ?></td>
<td><?php echo $producto['descripcion'] ?></td>
<td><?php echo $producto['stock'] ?></td>
<td><?php echo $producto['precio_compra'] ?></td>
<td><?php echo $producto['precio_venta'] ?></td>
<td><?php echo $producto['fecha_ingreso'] ?></td>
<td><?php echo $producto['nombre_categoria'] ?></td>

<td>
   <div class="btn-group">
   <a href="<?php echo $url; ?>almacen/show.php?id=<?php echo $id_producto_DAO; ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Ver</a>
   <a href="<?php echo $url; ?>almacen/update.php?id=<?php echo $id_producto_DAO; ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil-alt"></i> Editar</a>
   <a href="<?php echo $url; ?>almacen/delete.php?id=<?php echo $id_producto_DAO; ?>" class="btn btn-primary btn-sm"><i class="fa fa-trash"></i> Borrar</a>
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
    $("#almacentb").DataTable({
      "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Productos",
                "infoEmpty": "Mostrando 0 a 0 de 0 Productos",
                "infoFiltered": "(Filtrado de _MAX_ total Productos)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Productos",
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
    }).buttons().container().appendTo('#almacentb_wrapper .col-md-6:eq(0)');
</script> 


