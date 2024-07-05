<?php   

$nro_venta = $contador_ventas + 1;
$sql_carrito = "SELECT *, producto.nombre AS nombre_producto, producto.precio_venta AS precio FROM tb_carrito AS carrito INNER JOIN tb_almacen AS producto 
ON carrito.id_producto = producto.id_producto WHERE nro_venta = '$nro_venta' ORDER BY id_carrito ASC ";
$query_carrito = $pdo->prepare($sql_carrito);
$query_carrito->execute();
$carrito_datos = $query_carrito->fetchAll(PDO::FETCH_ASSOC);

?>