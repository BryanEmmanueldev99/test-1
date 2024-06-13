<?php

if(isset($_GET['id'])){

$id_proveedor_get = $_GET['id'];
$sql_proveedores = "SELECT * FROM tb_proveedores WHERE id_proveedor = '$id_proveedor_get'";

$query_proveedores = $pdo->prepare($sql_proveedores);
$query_proveedores->execute();
$proveedores_datos = $query_proveedores->fetchAll(PDO::FETCH_ASSOC);

foreach ($proveedores_datos as $proveedor_DAO){
       
}

//SI NO EXISTE O NO ES IGUAL AL VALOR DEL CAMPO DE LA BASE DE DATOS
if($_GET['id'] == $proveedor_DAO['id_proveedor']){
         
}else{
 session_start();
 $_SESSION['mensaje'] = "No se encontro el proveedor.";
 $_SESSION['icono']   = "info";
 
 header('location: '.$url.'proveedores/ ');
}

}

?>