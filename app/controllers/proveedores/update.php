<?php
include('../../config.php');

$id_proveedor = $_POST['id_proveedor'];
$nombre_proveedor = $_POST['nombre_proveedor'];
$celular = $_POST['celular'];
$telefono = $_POST['telefono'];
$email_proveedor = $_POST['email_proveedor'];
$empresa = $_POST['empresa'];
$direccion = $_POST['direccion'];

$sql = $pdo->prepare
  ("UPDATE tb_proveedores 
  SET nombre_proveedor=:nombre_proveedor,
  celular=:celular,
  telefono=:telefono,
  email_proveedor=:email_proveedor,
  empresa=:empresa,
  direccion=:direccion,
  fyh_actualizacion=:fyh_actualizacion 
  WHERE id_proveedor=:id_proveedor");
    
    $sql->bindParam('nombre_proveedor', $nombre_proveedor);
    $sql->bindParam('celular', $celular);
    $sql->bindParam('telefono', $telefono);
    $sql->bindParam('email_proveedor', $email_proveedor);
    $sql->bindParam('empresa', $empresa);
    $sql->bindParam('direccion', $direccion);
    $sql->bindParam('fyh_actualizacion', $fechaHora);
    $sql->bindParam('id_proveedor', $id_proveedor);
    
    if($sql->execute()){
       session_start();
       $_SESSION['mensaje'] = "Proveedor actualizado correctamente.";
       $_SESSION['icono']   = "success";
       header('location:'.$url.'proveedores/');
    }else{
        session_start();
        $_SESSION['mensaje'] = "Algo salio mal: el proveedor no se actualizo.";
        $_SESSION['icono']   = "error";
        header('location:'.$url.'proveedores/update.php?id='.$id_proveedor.'');
    }

?>