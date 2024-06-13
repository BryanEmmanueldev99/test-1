<?php  

if(isset($_GET['id'])){
    $id_usuario_get = $_GET['id'];

$sql_user = " SELECT us.id_usuario as id_usuario, us.nombres as nombres, us.email as email, rol.rol as rol FROM tb_usuarios as us INNER JOIN tb_roles as rol ON us.id_rol = rol.id_rol WHERE id_usuario = '$id_usuario_get' ";
$query_usuarios = $pdo->prepare($sql_user);
$query_usuarios->execute();
$usuarios_info = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);

foreach ($usuarios_info as $usuario_DAO){
    $id_usuario = $usuario_DAO['id_usuario'];
    $nombre_DAO = $usuario_DAO['nombres'];
    $correo_DAO = $usuario_DAO['email'];
    $rol = $usuario_DAO['rol'];
}

     //SI NO EXISTE O NO ES IGUAL AL VALOR DEL CAMPO DE LA BASE DE DATOS
if($_GET['id'] == $usuario_DAO['id_usuario']){
         
}else{
 session_start();
 $_SESSION['mensaje'] = "No se encontro el usuario.";
 $_SESSION['icono']   = "info";
 
 header('location: '.$url.'usuarios/ ');
}

}


?>