<?php  

$count = 2;
$sql_user = " SELECT us.id_usuario as id_usuario, us.nombres as nombres, us.email as email, rol.rol as rol FROM tb_usuarios as us INNER JOIN tb_roles as rol ON us.id_rol = rol.id_rol WHERE rol.id_rol >= '$count'";
$query_usuarios = $pdo->prepare($sql_user);
$query_usuarios->execute();
$total_user = $query_usuarios->rowCount();
//foreach
$usuarios_info = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);

?>