<?php 
include('../../config.php');

 $id_producto = $_POST['id_producto'];
 $image_text = $_POST['imagen'];


  
    $location = "../../../almacen/wcstore_img/".$image_text;
    unlink($location);


$sql = $pdo->prepare("DELETE FROM tb_almacen WHERE id_producto=:id_producto");
$sql->bindParam('id_producto', $id_producto);



if($sql->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Producto eliminado.";
    $_SESSION['icono']   = "success";
    header('location:'.$url.'almacen/');
}else{
    session_start();
    $_SESSION['mensaje'] = "Algo salio mal: el producto no se elimino.";
    $_SESSION['icono']   = "error";
    header('location:'.$url.'almacen/');
}

?>