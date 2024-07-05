<?php
include('../../config.php');

$nombre_categoria = $_GET['nombre_categoria'];

$sql = $pdo->prepare("INSERT INTO tb_categoria(nombre_categoria, fyh_creacion) 
VALUES(:nombre_categoria, :fyh_creacion)");
$sql->bindParam('nombre_categoria', $nombre_categoria);
$sql->bindParam('fyh_creacion', $fechaHora);



//INSERT PAGINA CREATE CATEGORIAS
if( $sql->execute() ){
    session_start();
    $_SESSION['mensaje'] = "Categoría agregada correctamente.";
    $_SESSION['icono']   = "success";
     // header('location:'.$url.'categorias/');
     ?>
       <script>
          location.href = "<?php echo $url; ?>/categorias" ;
       </script>
     <?php
}else{
    session_start();
    $_SESSION['mensaje'] = "Algo salio mal: No se agrego la categoría";
    $_SESSION['icono']   = "error";
   // header('location:'.$url.'categorias/');
   ?>
      <script>
          location.href = "<?php echo $url; ?>/categorias" ;
      </script>
   <?php 
}


?>