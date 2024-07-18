<?php

include('../../config.php');

$cliente = $_POST['razonsocial'];
$query = "SELECT COUNT(*) FROM tb_clientes WHERE nombre_cliente= ?";
$sql_nombre_cliente = $pdo->prepare($query);
$sql_nombre_cliente->execute(array($cliente));

$razon_social_existente = $sql_nombre_cliente->fetchColumn();

if ($razon_social_existente > 0) {
  echo '<div class="alert alert-danger-error-wcstore mt-2 mb-1 alert-dismissible fade show" role="alert">
  <i class="fa fa-exclamation-circle"></i> <strong>¡Aviso!</strong> Razón social "'.$cliente.'"  ya existe, puedes agregar al cliente, pero tendrás otro registro ya con el mismo nombre en uso.
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