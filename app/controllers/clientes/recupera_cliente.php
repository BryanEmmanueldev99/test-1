<?php  

$estado = "activo";
if(isset($_GET['id'])){
    $id_cliente_get = $_GET['id'];

$sql_clientes = " SELECT * FROM tb_clientes WHERE id_cliente = '$id_cliente_get' AND status_event_cliente = '$estado' ";
$query_clientes = $pdo->prepare($sql_clientes);
$query_clientes->execute();
$clientes_info = $query_clientes->fetchAll(PDO::FETCH_ASSOC);

foreach ($clientes_info as $cliente_DAO){
    $id_cliente = $cliente_DAO['id_cliente'];
}

     //SI NO EXISTE O NO ES IGUAL AL VALOR DEL CAMPO DE LA BASE DE DATOS
if($_GET['id'] == $cliente_DAO['id_cliente']){
         
}else{
 session_start();
 $_SESSION['mensaje'] = "No se encontro el cliente.";
 $_SESSION['icono']   = "info";
 
 header('location: '.$url.'client/ ');
}

}


?>