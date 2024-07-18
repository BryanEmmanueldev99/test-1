<?php

include('../../config.php');

$correo = $_POST['u'];
$query = "SELECT COUNT(*) FROM tb_clientes WHERE email_cliente= ?";
$sql_email = $pdo->prepare($query);
$sql_email->execute(array($correo));

$emailExistencia = $sql_email->fetchColumn();

if ($emailExistencia > 0) {
  echo '<div class="alert alert-danger-error-wcstore mt-2 mb-1 alert-dismissible fade show" role="alert">
  <i class="fa fa-exclamation-circle"></i> <strong>¡Aviso!</strong> El correo electrónico '.$correo.'  ya existe, puedes agregar al cliente, pero tendrás otro registro ya con el mismo correo en uso.
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
</button>
</div>';
}
else {
    /*
        Todo normal con la alta del cliente
    */
}

?>