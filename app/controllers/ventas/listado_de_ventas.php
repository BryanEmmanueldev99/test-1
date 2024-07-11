<?php   

$activo = 'activo';
$sql_ventas = "SELECT *, cliente.nombre_cliente AS cliente 
FROM tb_ventas AS ventas INNER JOIN tb_clientes AS cliente ON ventas.id_cliente = cliente.id_cliente
WHERE status_event_ventas = '$activo'
ORDER BY id_venta DESC";

$query_ventas = $pdo->prepare($sql_ventas);
$query_ventas->execute();
$ventas_datos = $query_ventas->fetchAll(PDO::FETCH_ASSOC);


?>