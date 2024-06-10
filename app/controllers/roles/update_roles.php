<?php  

$id_get_rol = $_GET['id'];

$sql_rol = " SELECT * FROM tb_roles WHERE id_rol = '$id_get_rol' ";
$query_roles = $pdo->prepare($sql_rol);
$query_roles->execute();
$roles_info = $query_roles->fetchAll(PDO::FETCH_ASSOC);

foreach ($roles_info as $rol_DAO){
    $nombre_rol = $rol_DAO['rol'];
}


?>