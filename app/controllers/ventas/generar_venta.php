<?php 
include('../../config.php');

   if(isset($_GET['id_cliente'])){
   
    $id_cliente = $_GET['id_cliente'];
    $monto_a_cancelar = $_GET['monto_a_cancelar'];
    $nro_venta = $_GET['nro_venta'];

    $pdo->beginTransaction();              
    $sql = $pdo->prepare("INSERT INTO tb_ventas(id_cliente, nro_venta, total_pagado, fyh_creacion) 
    VALUES(:id_cliente,:nro_venta,:total_pagado,:fyh_creacion)");

   $sql->bindParam('id_cliente', $id_cliente);
   $sql->bindParam('nro_venta', $nro_venta);
   $sql->bindParam('total_pagado', $monto_a_cancelar);
   $sql->bindParam('fyh_creacion', $fechaHora);

   if( $sql->execute() ){

    $pdo->commit();
    session_start();
    $_SESSION['mensaje'] = "Venta agregada correctamente.";
    $_SESSION['icono']   = "success";
     
     ?>
       <script>
         location.href = "<?php echo $url; ?>ventas" ;
      </script>
     <?php
}else{
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = "Algo salio mal: No se agrego la venta.";
    $_SESSION['icono']   = "error";
   ?>
      <script>
         location.href = "<?php echo $url; ?>ventas/create.php" ;
      </script>
   <?php 
}
   }

?>