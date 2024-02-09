<?php  

$sql_user = " SELECT * FROM tb_usuarios ";
$query_usuarios = $pdo->prepare($sql_user);
$query_usuarios->execute();
//foreach
$usuarios_info = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);

?>