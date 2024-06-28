<?php

include ('../../config.php');

echo $id_compra = $_GET['id_compra'];
echo $id_producto = $_GET['id_producto'];
echo $cantidad_compra = $_GET['cantidad_compra'];
echo $stock_actual = $_GET['stock_actual'];

//echo $id_compra." - ".$id_producto." - ".$cantidad_compra." - ".$stock_actual;

$pdo->beginTransaction();

$sentencia = $pdo->prepare("DELETE FROM tb_compras WHERE id_compra=:id_compra");

$sentencia->bindParam('id_compra',$id_compra);

if($sentencia->execute()){

    //actualiza el stock desde la compra
    $stock = $stock_actual - $cantidad_compra;
    $sentencia = $pdo->prepare("UPDATE tb_almacen SET stock=:stock WHERE id_producto = :id_producto ");
    $sentencia->bindParam('stock',$stock);
    $sentencia->bindParam('id_producto',$id_producto);
    $sentencia->execute();

    $pdo->commit();

    session_start();
    // echo "se registro correctamente";
    $_SESSION['mensaje'] = "Se borro la compra correctamente";
    $_SESSION['icono'] = "success";
    // header('Location: '.$URL.'/categorias/');
    ?>
    <script>
        location.href = "<?php echo $url;?>/compras";
    </script>
    <?php
}else{


    $pdo->rollBack();

    session_start();
    $_SESSION['mensaje'] = "Error no se pudo actualizar en la base de datos";
    $_SESSION['icono'] = "error";
    //  header('Location: '.$URL.'/categorias');
    ?>
    <script>
        location.href = "<?php echo $url;?>/compras";
    </script>
    <?php
}

?>