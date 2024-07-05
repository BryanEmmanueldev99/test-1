<?php 
include('../../config.php');

//DELETE C-R-U-D

$id_usuario = $_GET['id_usuario'];

$sql = $pdo->prepare("DELETE FROM tb_usuarios WHERE id_usuario=:id_usuario");
$sql->bindParam('id_usuario', $id_usuario);

$sql->execute();
session_start();
$_SESSION['mensaje'] = "Usuario eliminado.";
$_SESSION['icono']   = "success";
header('location:'.$url.'usuarios/');

?>