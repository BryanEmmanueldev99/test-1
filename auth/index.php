<?php

      //valida y restringe acceso por roles
   if( $id_rol_sesion  != $WC_Admin) {
       header('location:'.$url.'public/auth_error.php');
   }

?>