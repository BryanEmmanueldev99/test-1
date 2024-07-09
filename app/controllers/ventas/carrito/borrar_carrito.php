<?php 
include('../../../config.php');

   if(isset($_GET['id_carrito'])){
   
    $id_carrito = $_GET['id_carrito'];
    $sql = $pdo->prepare("DELETE FROM tb_carrito WHERE id_carrito=:id_carrito");
    $sql->bindParam('id_carrito', $id_carrito);

if($sql->execute()){
    ?>
      <script>
         location.href = "<?php echo $url; ?>ventas/create.php" ;
      </script>
    <?php
 }else{
     session_start();
     $_SESSION['mensaje'] = "Algo salio mal: no se pudo borrar el producto";
     $_SESSION['icono']   = "error";
     ?>
      <script>
        location.href = "<?php echo $url; ?>ventas/create.php" ;
      </script>
     <?php
 }
   }

?>