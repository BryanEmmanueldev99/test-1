<?php  

if(isset($_GET['id'])){

    $id_get_rol = $_GET['id'];

$sql_rol = " SELECT * FROM tb_roles WHERE id_rol = '$id_get_rol' ";
$query_roles = $pdo->prepare($sql_rol);
$query_roles->execute();
$roles_info = $query_roles->fetchAll(PDO::FETCH_ASSOC);

foreach ($roles_info as $rol_DAO){
    $nombre_rol = $rol_DAO['rol'];
}

   //SI NO EXISTE O NO ES IGUAL AL VALOR DEL CAMPO DE LA BASE DE DATOS
   if($_GET['id'] == $rol_DAO['id_rol']){
         
   }else{
    session_start();
    $_SESSION['mensaje'] = "No se encontro el rol.";
    $_SESSION['icono']   = "info";
    header('location: '.$url.'roles/ ');
   }

}


?>