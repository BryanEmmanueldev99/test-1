<?php 
include('../../config.php');

//INSER INTO C-R-U-D
$rol_peticion = $_POST['rol'];


$sql = $pdo->prepare("INSERT INTO tb_roles(rol, fyh_creacion) 
VALUES(:rol, :fyh_creacion)");

$sql->bindParam('rol', $rol_peticion);
$sql->bindParam('fyh_creacion', $fechaHora);


if( $sql->execute() ){
    session_start();
    $_SESSION['mensaje'] = "Rol agregado correctamente.";
    $_SESSION['icono']   = "success";
    header('location:'.$url.'roles/');
}else{
    session_start();
    $_SESSION['mensaje'] = "Algo salio mal: No se agrego el rol";
    $_SESSION['icono']   = "error";
    header('location:'.$url.'roles/create.php');
}


?>