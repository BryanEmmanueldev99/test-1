<?php  

  if(isset($_GET['id'])){
     $id_producto_get = $_GET['id'];

     $sql_productos = "SELECT *, cat.nombre_categoria as categoria, u.email as email, 
                  u.id_usuario as id_usuario
                  FROM tb_almacen as a INNER JOIN tb_categoria as cat ON a.id_categoria = cat.id_categoria 
                  INNER JOIN tb_usuarios as u ON u.id_usuario = a.id_usuario WHERE id_producto = '$id_producto_get'";

              
$query_productos = $pdo->prepare($sql_productos);
$query_productos->execute();
$productos_datos = $query_productos->fetchAll(PDO::FETCH_ASSOC);


      foreach ($productos_datos as $producto_DAO){
       
       $show_categoria = $producto_DAO['nombre_categoria'];
       $id_usuario = $producto_DAO['id_usuario'];
     }
 
       //SI NO EXISTE O NO ES IGUAL AL VALOR DEL CAMPO DE LA BASE DE DATOS
       if($_GET['id'] == $producto_DAO['id_producto']){
         
      }else{
       session_start();
       $_SESSION['mensaje'] = "No se encontro el producto.";
       $_SESSION['icono']   = "info";
       header('location: '.$url.'almacen/ ');
      }
}



?>