<?php

include('../../config.php');

$fileproductos = $_FILES['fileproductos'];
$fileproductos = file_get_contents($fileproductos['tmp_name']);

$fileproductos = explode("\n", $fileproductos);
$fileproductos = array_filter($fileproductos);

// preparar contactos (convertirlos en array)
foreach ($fileproductos as $producto_excel) {
  $productosaray[] = explode(",", $producto_excel);
}


// insertar productos
foreach ($productosaray as $row) {


  $pdo->query("INSERT INTO tb_almacen 
						(codigo,
						 nombre,
						 descripcion,
						 id_categoria,
						 id_usuario,
             stock,
             stock_minimo,
             stock_maximo,
             precio_compra,
             precio_venta
                         )
						 VALUES

						 ('{$row[0]}',
						  '{$row[1]}', 
						  '{$row[2]}',
						  '{$row[3]}',
						  '{$row[4]}',
              '{$row[5]}',
              '{$row[6]}',
              '{$row[7]}',
              '{$row[8]}',
               {$row[9]}
						   )
						 ");
}


session_start();
$_SESSION['mensaje'] = "Productos Cargados exitosamente.";
$_SESSION['icono']   = "success";
?>
<script>
  location.href = "<?php echo $url; ?>almacen/";
</script>
<?php




?>