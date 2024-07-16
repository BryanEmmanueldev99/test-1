<?php
include('../../config.php');

$id_venta = $_GET['id_venta'];
$nro_venta = $_GET['nro_venta'];
$estado = 'inactivo';
$estado_carro = 'inactivo';


$pdo->beginTransaction();

    $sql = $pdo->prepare("UPDATE tb_ventas SET status_event_ventas=:status_event_ventas WHERE id_venta=:id_venta");
    $sql->bindParam('status_event_ventas', $estado);
    $sql->bindParam('id_venta', $id_venta);

    if($sql->execute()){


      $sql = $pdo->prepare("UPDATE tb_carrito SET status_event_carrito=:status_event_carrito WHERE nro_venta=:nro_venta");
      $sql->bindParam('status_event_carrito', $estado_carro);
      $sql->bindParam('nro_venta', $nro_venta);
      $sql->execute();
      
        $pdo->commit();

       session_start();
       $_SESSION['mensaje'] = "Venta cancelada correctamente.";
       $_SESSION['icono']   = "success";
       
       ?>
         <script>
          location.href = "<?php echo $url; ?>ventas/" ;
         </script>
       <?php
    }else{
        $pdo->rollBack();

        session_start();
        $_SESSION['mensaje'] = "Algo salio mal: la venta no se borro correctamente";
        $_SESSION['icono']   = "error";
        
        ?>
         <script>
           location.href = "<?php echo $url; ?>ventas/" ;
         </script>
        <?php
    }

?>