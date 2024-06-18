<?php

include('../../config.php');

if(isset($_POST['codigo']) && !empty($_POST['codigo'])){
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$id_categoria = $_POST['id_categoria'];
$stock = $_POST['stock'];
$stock_minimo = $_POST['stock_minimo'];
$stock_maximo = $_POST['stock_maximo'];
$precio_compra = $_POST['precio_compra'];
$precio_venta = $_POST['precio_venta'];
$fecha_ingreso = $_POST['fecha_ingreso'];
$id_usuario = $_POST['id_usuario'];
$imagen = $_POST['imagen'];

//Verificamos por SQL que en la fila no exista el SKU.
$sql_sku =  "SELECT * FROM tb_almacen WHERE codigo =".$codigo;
$query_sku = $pdo->prepare($sql_sku);
$query_sku->execute();
$num_rows = $query_sku->fetchColumn();

if ($num_rows>0){ 

          session_start();
    $_SESSION['mensaje'] = "$codigo ya existe, prueba con otro SKU";
    $_SESSION['icono']   = "error";
    header('location:'.$url.'almacen/create.php');

  }else{
      

    $sql = $pdo->prepare("INSERT INTO tb_almacen(codigo, nombre, descripcion, id_categoria, stock, stock_minimo, stock_maximo, precio_compra, precio_venta, fecha_ingreso, id_usuario, imagen, fyh_creacion) 
    VALUES(:codigo,:nombre,:descripcion,:id_categoria,:stock,:stock_minimo,:stock_maximo,:precio_compra,:precio_venta,:fecha_ingreso,:id_usuario,:imagen,:fyh_creacion)");
    
    
    $sql->bindParam('codigo', $codigo);
    $sql->bindParam('nombre', $nombre);
    $sql->bindParam('descripcion', $descripcion);
    $sql->bindParam('id_categoria', $id_categoria);
    $sql->bindParam('stock', $stock);
    $sql->bindParam('stock_minimo', $stock_minimo);
    $sql->bindParam('stock_maximo', $stock_maximo);
    $sql->bindParam('precio_compra', $precio_compra);
    $sql->bindParam('precio_venta', $precio_venta);
    $sql->bindParam('fecha_ingreso', $fecha_ingreso);
    $sql->bindParam('id_usuario', $id_usuario);
    $sql->bindParam('imagen', $filename);
    $sql->bindParam('fyh_creacion', $fechaHora);
    
    // Para reutilizar  este codigo en agregar imagen con PHP $sql->bindParam('imagen', $filename);
    $nombreDelArchivo = date("Y-m-d-h-i-s");
    $filename = $nombreDelArchivo."__".$_FILES['imagen']['name'];
    $location = "../../../almacen/wc_img_productos/".$filename;
    
    //hago uso de la propiedad de PHP para subir archivos
    move_uploaded_file($_FILES['imagen']['tmp_name'],$location);
    
    
    if( $sql->execute() ){
        session_start();
        $_SESSION['mensaje'] = "Producto agregado correctamente.";
        $_SESSION['icono']   = "success";
        header('location:'.$url.'almacen/');
    }else{
        session_start();
        $_SESSION['mensaje'] = "Algo salio mal: No se agrego el producto";
        $_SESSION['icono']   = "error";
        header('location:'.$url.'almacen/create.php');
    }
    //echo "Procedemos al registro del producto";
  }
  
}else{
    session_start();
    $_SESSION['mensaje'] = "Algo salio mal: No se agrego el producto";
    $_SESSION['icono']   = "error";
    header('location:'.$url.'almacen/create.php');
}

?>