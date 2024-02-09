<?php

//incluyo mi archivo de configuracion donde esta la conexión
include('../../config.php');

//Recupero los valores del formulario
$email = $_POST['email'];
$password_user = $_POST['password_user'];

//defino el valor de mi contador
$contador = 0;

//Ahora agrego una setencia SQL y la ejecuto
$sql = " SELECT * FROM tb_usuarios WHERE email = '$email' ";
$query = $pdo->prepare($sql);
$query->execute();

//Recupero mis registros por el ciclo foreach
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($usuarios as $row_user ) {
    $contador     = $contador + 1;
    $email_tabla  = $row_user['email'];
    $nombre_tabla = $row_user['nombres'];
    //importante recuperar la contraseña, ya que esta encriptada y la usare para usarla como parametro en el if, de lo contrario la consulta no encontrara la contraseña apesar de ser correcta
    $user_pass    = $row_user['password_user'];
}

//Entonces pregunto a PHP, si micontador es mayor a 0 ¡Y A ADEMAS los valores tanto de la contraseña del formulario login y la que se recupero de la BD son iguales. Que se ejecute el siguiente bloque de código
if ( ($contador > 0) && (password_verify($password_user, $user_pass)) ) {
     //si los datos son correctos entonces inicio una sesion
     session_start();
     $_SESSION['session_email'] = $email;
     header('location:'.$url.'');
}else{
     session_start();
     $_SESSION['mensaje_login'] = "Datos Incorrectos";
     header('location:'.$url.'login/');
}

?>


