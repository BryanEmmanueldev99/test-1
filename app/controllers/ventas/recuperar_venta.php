<?php   

if(isset($_GET['id'])){
$id_venta_get = $_GET['id'];
$activo = 'activo';
$sql_venta = "SELECT *, cliente.nombre_cliente AS cliente 
FROM tb_ventas AS ventas INNER JOIN tb_clientes AS cliente ON ventas.id_cliente = cliente.id_cliente
WHERE id_venta = '$id_venta_get'";

$query_venta = $pdo->prepare($sql_venta);
$query_venta->execute();
$venta_datos = $query_venta->fetchAll(PDO::FETCH_ASSOC);


   foreach($venta_datos as $venta){
        $nro_venta = $venta['nro_venta'];
   }

}

?>