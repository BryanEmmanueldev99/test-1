<?php
include('../../config.php');


$nombre_proveedor = $_POST['nombre_proveedor'];
$celular = $_POST['celular'];
$telefono = $_POST['telefono'];
$email_proveedor = $_POST['email_proveedor'];
$direccion = $_POST['direccion'];
$empresa = $_POST['empresa'];


$sql = $pdo->prepare("INSERT INTO tb_proveedores(nombre_proveedor, celular, telefono, empresa, email_proveedor, direccion, fyh_creacion) 
VALUES(:nombre_proveedor,:celular,:telefono,:empresa,:email_proveedor,:direccion,:fyh_creacion)");

$sql->bindParam('nombre_proveedor', $nombre_proveedor);
$sql->bindParam('celular', $celular);
$sql->bindParam('telefono', $telefono);
$sql->bindParam('empresa', $empresa);
$sql->bindParam('email_proveedor', $email_proveedor);
$sql->bindParam('direccion', $direccion);
$sql->bindParam('fyh_creacion', $fechaHora);


//INSERT PAGINA CREATE PROVEEDORES
if( $sql->execute() ){
    session_start();
    $_SESSION['mensaje'] = "Proveedor agregado correctamente.";
    $_SESSION['icono']   = "success";
    header('location:'.$url.'proveedores/');
}else{
    session_start();
    $_SESSION['mensaje'] = "Algo salio mal: No se agrego el proveedor";
    $_SESSION['icono']   = "error";
    header('location:'.$url.'proveedores/');
}


?>