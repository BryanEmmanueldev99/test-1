<?php

include('../../config.php');

$id_producto = $_GET['id_producto'];
$stock_calculado =$_GET['stock_calculado'];

                        
    $sql = $pdo->prepare("UPDATE tb_almacen SET stock=:stock WHERE id_producto = :id_producto ");

    $sql->bindParam('stock',$stock_calculado);
    $sql->bindParam('id_producto',$id_producto);
      

    if( $sql->execute() ){
          //no hara nada, ejecutamos el sql solamente.
    }else{
        session_start();
        $_SESSION['mensaje'] = "Algo salió mal: falló al actualizar el stock calculado.";
        $_SESSION['icono']   = "error";
       ?>
          <script>
              location.href = "<?php echo $url; ?>ventas/create.php" ;
          </script>
       <?php 
    }

?>