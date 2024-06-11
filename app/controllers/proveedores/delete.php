<?php 

include('../../config.php');
$id_proveedor = $_POST['id_proveedor'];

$sql = $pdo->prepare("DELETE FROM tb_proveedores WHERE id_proveedor=:id_proveedor");
$sql->bindParam('id_proveedor', $id_proveedor);

if($sql->execute()){
    session_start();
    $_SESSION['mensaje'] = "Proveedor eliminado.";
    $_SESSION['icono']   = "success";
    header('location:'.$url.'proveedores/');
}else{
    session_start();
   $_SESSION['mensaje'] = "Algo salio mal";
   $_SESSION['icono']   = "error";
   header('location:'.$url.'proveedores/');
}


?>