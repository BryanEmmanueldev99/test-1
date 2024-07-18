<?php 
include('../../config.php');

$nombre = $_POST['nombre_cliente'];
$nit_ci_cliente = $_POST['nit_ci_cliente'];
$celular_cliente = $_POST['celular_cliente'];
$email_cliente = $_POST['email_cliente'];
$id_cliente = $_POST['id_cliente'];

    $sql = $pdo->prepare("UPDATE tb_clientes SET 
    nombre_cliente=:nombre_cliente,
    nit_ci_cliente=:nit_ci_cliente,
    celular_cliente=:celular_cliente,
    email_cliente=:email_cliente, 
    fyh_actualizacion=:fyh_actualizacion 
    WHERE id_cliente=:id_cliente");
    
    $sql->bindParam('nombre_cliente', $nombre);
    $sql->bindParam('nit_ci_cliente', $nit_ci_cliente);
    $sql->bindParam('celular_cliente', $celular_cliente);
    $sql->bindParam('email_cliente', $email_cliente);
    $sql->bindParam('fyh_actualizacion', $fechaHora);
    $sql->bindParam('id_cliente', $id_cliente);
    
    $sql->execute();
    session_start();
    $_SESSION['mensaje'] = "Cliente actualizado correctamente.";
    $_SESSION['icono']   = "success";
    header('location:'.$url.'client/');
    

?>