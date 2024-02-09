<?php 

session_start();
if (isset($_SESSION['session_email'])){

  $sesion_email = $_SESSION['session_email'];
  
}else{
  header('location:'.$url.'login/index.php');
}







