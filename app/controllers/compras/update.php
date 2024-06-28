<?php

include('../../config.php');

$id_compra = $_GET['id_compra'];
$id_producto = $_GET['id_producto'];
$nro_compra = $_GET['nro_compra'];
$fecha_compra = $_GET['fecha_compra'];
$id_proveedor = $_GET['id_proveedor'];
$comprobante = $_GET['comprobante'];
$id_usuario = $_GET['id_usuario'];
$precio_de_compra = $_GET['precio_de_compra'];
$cantidad_compra = $_GET['cantidad_compra'];
$stock_total =$_GET['stock_total'];

     if(!$id_proveedor or !$id_producto){
        session_start();
        $_SESSION['mensaje'] = "Por favor selecciona un proveedor o producto.";
        $_SESSION['icono']   = "error";
         
         ?>
           <script>
              location.href = "<?php echo $url; ?>compras/update.php?id=<?= $id_compra; ?>";
           </script>
         <?php
    }
     
    $pdo->beginTransaction();
                        
    $sql = $pdo->prepare("UPDATE tb_compras SET 
    id_producto=:id_producto,
    nro_compra=:nro_compra,
    fecha_compra=:fecha_compra,
    id_proveedor=:id_proveedor,
    comprobante=:comprobante,
    id_usuario=:id_usuario,
    precio_de_compra=:precio_de_compra,
    cantidad=:cantidad, 
    fyh_actualizacion=:fyh_actualizacion WHERE id_compra = :id_compra ");
    
    $sql->bindParam('id_compra', $id_compra);
    $sql->bindParam('id_producto', $id_producto);
    $sql->bindParam('nro_compra', $nro_compra);
    $sql->bindParam('fecha_compra', $fecha_compra);
    $sql->bindParam('id_proveedor', $id_proveedor);
    $sql->bindParam('precio_de_compra', $precio_de_compra);
    $sql->bindParam('comprobante', $comprobante);
    $sql->bindParam('id_usuario', $id_usuario);
    $sql->bindParam('cantidad', $cantidad_compra);
    $sql->bindParam('fyh_actualizacion', $fechaHora);
      

    if( $sql->execute() ){
        //si todo sale bien, entonces ejecutame esta consulta y actualiza el stock pero si se deja vacio el campo, entonces ya no actualices el stock
            if($stock_total == ''){

            }else{
               $sql = $pdo->prepare("UPDATE tb_almacen
            SET 
                  stock=:stock,
                  fyh_actualizacion=:fyh_actualizacion 
            WHERE id_producto = :id_producto ");
    
           $sql->bindParam('stock',$stock_total);
           $sql->bindParam('fyh_actualizacion',$fechaHora);
           $sql->bindParam('id_producto',$id_producto);
           $sql->execute();
            }
     
           $pdo->commit();

         session_start();
         $_SESSION['mensaje'] = "Compra actualizada correctamente.";
         $_SESSION['icono']   = "success";
         
          ?>
            <script>
               location.href = "<?php echo $url; ?>compras/" ;
            </script>
         <?php
    }else{
        $pdo->rollBack();
        session_start();
        $_SESSION['mensaje'] = "Algo salio mal: No se pudo actualizar la compra.";
        $_SESSION['icono']   = "error";
       //header('location:'.$url.'categorias/');
       ?>
          <script>
              location.href = "<?php echo $url; ?>compras/create.php" ;
          </script>
       <?php 
    }

?>