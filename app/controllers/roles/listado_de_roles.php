<?php

$sql_roles = " SELECT * FROM tb_roles ";
$query_roles = $pdo->prepare($sql_roles);
$query_roles->execute();
$total_roles = $query_roles->rowCount();
//foreach
$roles_info = $query_roles->fetchAll(PDO::FETCH_ASSOC);

?>