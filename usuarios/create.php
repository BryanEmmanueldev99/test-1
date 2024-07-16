<?php 
include('../app/config.php'); 
include('../layaout/sesion.php');
include('../auth/index.php');
include('../app/controllers/roles/listado_de_roles.php');
?>


<?php  include('../layaout/parte1.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Crear Usuario</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Crear Usuario</a></li>
              <li class="breadcrumb-item active">Crear</li>
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


<form class="shadow" action="../app/controllers/usuarios/create.php" method="POST">
<div class="card-body">
<div class="form-group">
<label for="nombres">Nombre:</label>
<input type="text" name="nombres" class="form-control" id="nombres" placeholder="Nombre" required>
</div>



<div class="form-group">
<label for="email">Correo:</label>
<input type="email" name="email" class="form-control" id="email" placeholder="Correo" required>

<div class="" id="resultado"></div>
<script>
$(document).ready(function(){
                         
      var verify_user_sesion_email;
                                             
      //comprobamos si se pulsa una tecla
      $("#email").keyup(function(e){
             //obtenemos el texto introducido en el campo
             verify_user_sesion_email = $("#email").val();
             //hace la búsqueda
             $("#resultado").delay(1000).queue(function(n) {      
                                           
                  $("#resultado").html('<img width="30px" class="img-fluid" src="<?= $url;  ?>public/img/ajax_loader.gif" />');
                                           
                       $.ajax({
                              type: "POST",
                              url: "../app/controllers/usuarios/provider_email_sesion.php",
                              data: "u="+verify_user_sesion_email,
                              dataType: "html",
                              error: function(){
                                    alert("error en la petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });
                          
});
                       </script>
</div>



<div class="form-group">
<label for="rol">Rol de usuario:</label>
<select name="rol" class="form-control" id="rol" required>
 <?php foreach($roles_info as $rol){ ?>
   <option value="<?php echo $rol['id_rol']; ?>"><?php echo $rol['rol']; ?></option>
 <?php } ?>
</select>
</div>

<div class="form-group">
<label for="password_user">Contraseña:</label>
<input type="text" name="password_user" class="form-control" id="password_user" placeholder="Password" required>
</div>

<div class="form-group">
<label for="password_repeat">Confirmar la Contraseña:</label>
<input type="text" class="form-control" name="password_repeat" id="password_repeat" required>
</div>

</div>

<div class="card-footer">
<button type="submit" class="btn btn-primary">Confirmar</button>
<a href="<?php echo $url;  ?>usuarios" class="btn btn-default">Regresar</a>
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