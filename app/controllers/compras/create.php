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

     if(!$id_proveedor or $id_producto){
        session_start();
        $_SESSION['mensaje'] = "Por favor selecciona un proveedor o producto.";
        $_SESSION['icono']   = "error";
         
         ?>
           <script>
              location.href = "<?php echo $url; ?>compras/create.php" ;
           </script>
         <?php
    }
     
                        
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
        session_start();
        $_SESSION['mensaje'] = "Compra agregada correctamente.";
        $_SESSION['icono']   = "success";
         
         ?>
           <script>
              location.href = "<?php echo $url; ?>compras/" ;
           </script>
         <?php
    }else{
        session_start();
        $_SESSION['mensaje'] = "Algo salio mal: No se agrego la compra.";
        $_SESSION['icono']   = "error";
       // header('location:'.$url.'categorias/');
       ?>
          <script>
              location.href = "<?php echo $url; ?>compras/create.php" ;
          </script>
       <?php 
    }


?>