<?php 
include('../../config.php');

//UPDATE C-R-U-D
$nombres = $_POST['nombres'];
$email = $_POST['email'];
$password_user = $_POST['password_user'];
$password_repeat = $_POST['password_repeat'];
$id_usuario = $_POST['id_usuario'];

if($password_user == $password_repeat){
    $password_repeat = password_hash($password_user, PASSWORD_DEFAULT);

$sql = $pdo->prepare("UPDATE tb_usuarios SET nombres=:nombres, email=:email, password_user=:password_user, fyh_actualizacion=:fyh_actualizacion WHERE id_usuario=:id_usuario");

$sql->bindParam('nombres', $nombres);
$sql->bindParam('email', $email);
$sql->bindParam('password_user', $password_repeat);
$sql->bindParam('fyh_actualizacion', $fechaHora);
$sql->bindParam('id_usuario', $id_usuario);

$sql->execute();
session_start();
$_SESSION['mensaje'] = "Usuario actualizado correctamente.";
$_SESSION['icono']   = "success";
header('location:'.$url.'usuarios/');


}else{
    session_start();
    $_SESSION['mensaje'] = "Upss, las contraseñas no son iguales";
    $_SESSION['icono']   = "error";
    header('location:'.$url.'usuarios/update.php?id='.$id_usuario.' ');
}

?>