<?php
include('../../config.php');

error_reporting(0);
if( isset($_POST['sku_verify']) ){
  $sku_verify = $_POST['sku_verify'];

  $sql_sku =  "SELECT * FROM tb_almacen WHERE codigo =" . $sku_verify;
  $query_sku = $pdo->prepare($sql_sku);
  $query_sku->execute();
  $num_rows = $query_sku->fetchColumn(1);
  
  if ($num_rows > 0) {
    echo '<div class="alert alert-danger-error-wcstore mt-2 mb-1 alert-dismissible fade show" role="alert">
      <i class="fa fa-exclamation-circle"></i> <strong>¡SKU duplicado!</strong> ' . $sku_verify . ' ya existe.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
}

