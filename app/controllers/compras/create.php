<?php

include('../../config.php');

error_reporting(0);

$id_producto = $_GET['id_producto'];
$nro_compra = $_GET['nro_compra'];
$fecha_compra = $_GET['fecha_compra'];
$id_proveedor = $_GET['id_proveedor'];
$comprobante = $_GET['comprobante'];
$id_usuario = $_GET['id_usuario'];
$precio_compra = $_GET['precio_compra'];
$cantidad_compra = $_GET['cantidad_compra'];
$stock_total =$_GET['stock_total'];

     if(!$id_proveedor or !$id_producto){
        session_start();
        $_SESSION['mensaje'] = "Por favor selecciona un proveedor o producto.";
        $_SESSION['icono']   = "error";
         
         ?>
           <script>
              location.href = "<?php echo $url; ?>compras/create.php" ;
           </script>
         <?php
    }
     
    $pdo->beginTransaction();
                        
    $sql = $pdo->prepare("INSERT INTO tb_compras(id_producto, nro_compra, fecha_compra, id_proveedor, comprobante, id_usuario, precio_compra, cantidad, fyh_creacion) 
    VALUES(:id_producto,:nro_compra,:fecha_compra,:id_proveedor,:comprobante,:id_usuario,:precio_compra,:cantidad,:fyh_creacion)");
    
    
    $sql->bindParam('id_producto', $id_producto);
    $sql->bindParam('nro_compra', $nro_compra);
    $sql->bindParam('fecha_compra', $fecha_compra);
    $sql->bindParam('id_proveedor', $id_proveedor);
    $sql->bindParam('precio_compra', $precio_compra);
    $sql->bindParam('comprobante', $comprobante);
    $sql->bindParam('id_usuario', $id_usuario);
    $sql->bindParam('cantidad', $cantidad_compra);
    $sql->bindParam('fyh_creacion', $fechaHora);
      

    if( $sql->execute() ){
        //si todo sale bien, entonces ejecutame esta consulta y actualiza el stock
            $sql = $pdo->prepare("UPDATE tb_almacen
        SET 
              stock=:stock,
              fyh_actualizacion=:fyh_actualizacion 
        WHERE id_producto = :id_producto ");

       $sql->bindParam('stock',$stock_total);
       $sql->bindParam('fyh_actualizacion',$fechaHora);
       $sql->bindParam('id_producto',$id_producto);
       $sql->execute();

       $pdo->commit();

        session_start();
        $_SESSION['mensaje'] = "Compra agregada correctamente.";
        $_SESSION['icono']   = "success";
         
         ?>
           <script>
              location.href = "<?php echo $url; ?>compras/" ;
           </script>
         <?php
    }else{
        $pdo->rollBack();
        session_start();
        $_SESSION['mensaje'] = "Algo salio mal: No se agrego la compra.";
        $_SESSION['icono']   = "error";
       //header('location:'.$url.'categorias/');
       ?>
          <script>
              location.href = "<?php echo $url; ?>compras/create.php" ;
          </script>
       <?php 
    }


?>