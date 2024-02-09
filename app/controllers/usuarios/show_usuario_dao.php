<?php  

$id_usuario_get_DAO = $_GET['id'];

$sql_user = " SELECT * FROM tb_usuarios WHERE id_usuario = '$id_usuario_get_DAO' ";
$query_usuarios = $pdo->prepare($sql_user);
$query_usuarios->execute();
$usuarios_info = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);

foreach ($usuarios_info as $usuario_DAO){
    $nombre_DAO = $usuario_DAO['nombres'];
    $correo_DAO = $usuario_DAO['email'];
}

?>