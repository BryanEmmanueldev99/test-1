<?php 
include('../../config.php');

//UPDATE C-R-U-D
$rol = $_POST['rol'];
$id_rol = $_POST['id_rol'];


    $sql = $pdo->prepare("UPDATE tb_roles SET rol=:rol, fyh_actualizacion=:fyh_actualizacion WHERE id_rol=:id_rol");
    
    $sql->bindParam('rol', $rol);
    $sql->bindParam('fyh_actualizacion', $fechaHora);
    $sql->bindParam('id_rol', $id_rol);
    
    if($sql->execute()){
       session_start();
       $_SESSION['mensaje'] = "Rol actualizado correctamente.";
       $_SESSION['icono']   = "success";
       header('location:'.$url.'roles/');
    }else{
        session_start();
        $_SESSION['mensaje'] = "Algo salio mal: el rol no se actualizo";
        $_SESSION['icono']   = "error";
        header('location:'.$url.'roles/update.php?id='.$id_rol.'');
    }
    
    
   




?>