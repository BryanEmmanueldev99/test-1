<?php  

$id_producto_get_DAO = $_GET['id'];

$sql_productos = "SELECT *, cat.nombre_categoria as categoria, u.email as email, 
                  u.id_usuario as id_usuario
                  FROM tb_almacen as a INNER JOIN tb_categoria as cat ON a.id_categoria = cat.id_categoria 
                  INNER JOIN tb_usuarios as u ON u.id_usuario = a.id_usuario WHERE id_producto = '$id_producto_get_DAO'";


$query_productos = $pdo->prepare($sql_productos);
$query_productos->execute();
$productos_datos = $query_productos->fetchAll(PDO::FETCH_ASSOC);


foreach ($productos_datos as $producto_DAO){
       $show_categoria = $producto_DAO['nombre_categoria'];
       $id_usuario = $producto_DAO['id_usuario'];
}


?>