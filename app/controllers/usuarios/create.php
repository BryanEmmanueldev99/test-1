<?php 
include('../../config.php');

//INSER INTO C-R-U-D
$nombres = $_POST['nombres'];
$email = $_POST['email'];
$rol = $_POST['rol'];
$password_user = $_POST['password_user'];
$password_repeat = $_POST['password_repeat'];

$query = "SELECT COUNT(*) FROM tb_usuarios WHERE email= ?";
$sql_email = $pdo->prepare($query);
$sql_email->execute(array($email));

$emailExistencia = $sql_email->fetchColumn();

if ($emailExistencia > 0) {
    session_start();
    $_SESSION['mensaje'] = "El correo electrónico {$email}  ya existe, prueba con otro.";
    $_SESSION['icono']   = "error";
    header('location:'.$url.'usuarios/create.php');
} else {
    /*
        Aquí procede la alta del usuario
    */
    if($password_user == $password_repeat){
        $password_repeat = password_hash($password_user, PASSWORD_DEFAULT);
    
    $sql = $pdo->prepare("INSERT INTO tb_usuarios(nombres, email, id_rol, password_user, fyh_creacion) 
    VALUES(:nombres, :email, :id_rol, :password_user, :fyh_creacion)");
    
    $sql->bindParam('nombres', $nombres);
    $sql->bindParam('email', $email);
    $sql->bindParam('id_rol', $rol);
    $sql->bindParam('password_user', $password_repeat);
    $sql->bindParam('fyh_creacion', $fechaHora);
    
    if($sql->execute()){
        session_start();
        $_SESSION['mensaje'] = "Usuario agregado correctamente.";
        $_SESSION['icono']   = "success";
        header('location:'.$url.'usuarios/');
        
        }else{
            session_start();
        $_SESSION['mensaje'] = "Error desconocido, intente de nuevo.";
        $_SESSION['icono']   = "error";
        header('location:'.$url.'usuarios/create.php');
        }
    }else{
        session_start();
        $_SESSION['mensaje'] = "Upss, las contraseñas no son iguales";
        $_SESSION['icono']   = "error";
        header('location:'.$url.'usuarios/create.php');
    }
    
}




?>