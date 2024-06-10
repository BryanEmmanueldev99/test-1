<?php

$sql_almacen = " SELECT *, cat.nombre_categoria as categoria, u.email as email
 FROM tb_almacen as a INNER JOIN tb_categoria as cat ON a.id_categoria = cat.id_categoria 
 INNER JOIN tb_usuarios as u ON u.id_usuario = a.id_usuario";
$query_productos = $pdo->prepare($sql_almacen);
$query_productos->execute();
$total_almacen = $query_productos->rowCount();
//foreach
$productos_info = $query_productos->fetchAll(PDO::FETCH_ASSOC);

?>