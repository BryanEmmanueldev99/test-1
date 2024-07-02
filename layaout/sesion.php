<?php 
//error_reporting(0); ACTIVAR EN PRODUCCION
session_start();
if (isset($_SESSION['session_email'])){

  $sesion_email = $_SESSION['session_email'];
  $sql = " SELECT us.id_usuario as id_usuario, us.nombres as nombres, us.email as email, rol.rol as rol, rol.id_rol as id_rol FROM tb_usuarios as us INNER JOIN tb_roles as rol ON us.id_rol = rol.id_rol WHERE email = '$sesion_email' ";
$query = $pdo->prepare($sql);
$query->execute();

//foreach
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

//identificacion del ID del WC ADMIN
$WC_Admin = 1;

foreach ($usuarios as $usuario) {
   $id_sesion_usuario = $usuario['id_usuario'];
   $nombre_sesion = $usuario['nombres'];
   $rol_sesion = $usuario['rol'];
   $id_rol_sesion = $usuario['id_rol'];
}

}else{
  echo "No existe la sesion, vuelva a ingresar en el login por favor.";
  header('location:'.$url.'login/index.php');
}







