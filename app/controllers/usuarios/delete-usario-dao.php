<?php 
include('../../config.php');
include('../../funciones/funciones.php');

//DELETE C-R-U-D

$id_usuario = openssl_decrypt($_POST['id_usuario'],AES,KEY);

$sql = $pdo->prepare("DELETE FROM tb_usuarios WHERE id_usuario=:id_usuario");
$sql->bindParam('id_usuario', $id_usuario);

$sql->execute();
session_start();
$_SESSION['mensaje'] = "Usuario eliminado.";
$_SESSION['icono']   = "success";
header('location:'.$url.'usuarios/');

?>