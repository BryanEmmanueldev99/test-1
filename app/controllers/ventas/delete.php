<?php
include('../../config.php');

$id_venta = $_GET['id_venta'];
$estado = 'inactivo';

$pdo->beginTransaction();

    $sql = $pdo->prepare("UPDATE tb_ventas SET status_event_ventas=:status_event_ventas WHERE id_venta=:id_venta");
    $sql->bindParam('status_event_ventas', $estado);
    $sql->bindParam('id_venta', $id_venta);

    if($sql->execute()){


        $pdo->commit();

       session_start();
       $_SESSION['mensaje'] = "Venta borrada correctamente.";
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