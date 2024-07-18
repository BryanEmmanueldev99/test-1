<?php 
include('../../config.php');
$id_producto = $_POST['id_in'];
$stock = $_POST['stock_in'];

    $sql = $pdo->prepare("UPDATE tb_almacen SET  
    stock=:stock,
    fyh_actualizacion=:fyh_actualizacion
    WHERE id_producto=:id_producto");
    $sql->bindParam('stock', $stock);
    $sql->bindParam('id_producto', $id_producto);
    $sql->bindParam('fyh_actualizacion', $fechaHora);
    
    if($sql->execute()){
        echo '<div class="alert alert-stock mt-2 mb-1 alert-dismissible fade show" style="
    color: #4d5954;
    background-color: #c7e5ce;
    border-color: #c7e5ce;" 
    role="alert">
  <i class="fa fa-check-circle"></i> <strong>¡Actualizado correctamente!</strong>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
</button>
</div>';
    }else{
        echo '<div class="alert alert-danger-error-wcstore mt-2 mb-1 alert-dismissible fade show" role="alert">
  <i class="fa fa-exclamation-circle"></i> <strong>¡Actualización fallida!</strong> Status: error desconocido.
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
</button>
</div>';
    }
    

?>