<?php

$id_proveedor_get_DAO = $_GET['id'];
$sql_proveedores = "SELECT * FROM tb_proveedores WHERE id_proveedor = '$id_proveedor_get_DAO'";

$query_proveedores = $pdo->prepare($sql_proveedores);
$query_proveedores->execute();
$proveedores_datos = $query_proveedores->fetchAll(PDO::FETCH_ASSOC);

foreach ($proveedores_datos as $proveedor_DAO){
       
}


?>