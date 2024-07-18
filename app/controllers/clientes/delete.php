<?php 
include('../../config.php');

echo $id_cliente = $_GET['id'];
echo $estado = 'inactivo';

    $sql = $pdo->prepare("UPDATE tb_clientes SET  
    status_event_cliente=:status_event_cliente 
    WHERE id_cliente=:id_cliente");
    
    $sql->bindParam('status_event_cliente', $estado);
    $sql->bindParam('id_cliente', $id_cliente);
    
        if($sql->execute()){
            session_start();
    $_SESSION['mensaje'] = "Cliente borrado correctamente.";
    $_SESSION['icono']   = "success";
    header('location:'.$url.'client/');
        }else{
            session_start();
    $_SESSION['mensaje'] = "Upss, algo salio mal.";
    $_SESSION['icono']   = "error";
    header('location:'.$url.'client/');
        }
    
    

?>