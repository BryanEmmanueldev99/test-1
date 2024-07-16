
<?php
include('../../config.php');

$nro_venta = $_GET['nro_venta'];
$id_producto = $_GET['id_producto'];
$cantidad = $_GET['cantidad'];
$status_event_carrito = 'activo';
//SELECT * FROM `tb_carrito` WHERE `status_event_carrito` = 'activo'
$sql = $pdo->prepare("INSERT INTO tb_carrito(nro_venta,id_producto,cantidad,status_event_carrito,fyh_creacion) 
VALUES(:nro_venta,:id_producto,:cantidad,:status_event_carrito,:fyh_creacion)");

$sql->bindParam('nro_venta', $nro_venta);
$sql->bindParam('id_producto', $id_producto);
$sql->bindParam('cantidad',$cantidad);
$sql->bindParam('status_event_carrito',$status_event_carrito);
$sql->bindParam('fyh_creacion', $fechaHora);



//INSERT PAGINA CREATE CATEGORIAS
if( $sql->execute() ){ ?>
       <script>
          location.href = "<?php echo $url; ?>ventas/create.php" ;
       </script>
     <?php
}else{
    session_start();
    $_SESSION['mensaje'] = "Algo salio mal: No se agregaron los productos";
    $_SESSION['icono']   = "error";
   ?>
      <script>
          location.href = "<?php echo $url; ?>ventas/create.php" ;
      </script>
   <?php 
}


?>
