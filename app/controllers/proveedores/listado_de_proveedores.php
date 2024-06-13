<?php

$sql_proveedores = " SELECT * FROM tb_proveedores ";
$query_proveedores = $pdo->prepare($sql_proveedores);
$query_proveedores->execute();
$total_proveedores = $query_proveedores->rowCount();
//foreach
$proveedores_info = $query_proveedores->fetchAll(PDO::FETCH_ASSOC);


?>