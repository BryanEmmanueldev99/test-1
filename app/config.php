<?php  

//Conexión a la BASE DE DATOS del sistema de ventas
$servidor='localhost';
$pass = '';
$usuario = 'root';
$db = 'sistemadeventas';
$url = 'http://localhost/desarrollo-php/www.sisventasfarmaciasdjesphp.mx/';


//public/templates/AdminLTE-3.2.0/plugins/

try{
    $pdo = new PDO("mysql:host=$servidor;dbname=$db;",$usuario,$pass);
 // echo "La conexion a la base de datos fue exitosa";
}catch (PDOException $e){
    //print_r($e);
    echo "Error al conectar a la base de datos";
}

date_default_timezone_set("America/Mexico_City");
$fechaHora = date('Y-m-d h:i:s');



