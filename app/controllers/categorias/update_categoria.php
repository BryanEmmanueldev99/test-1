<?php
include('../../config.php');

$id_categoria = $_GET['id_categoria'];
$nombre_categoria = $_GET['nombre_categoria'];

$sql = $pdo->prepare("UPDATE tb_categoria SET nombre_categoria=:nombre_categoria, fyh_actualizacion=:fyh_actualizacion WHERE id_categoria=:id_categoria");
    
    $sql->bindParam('nombre_categoria', $nombre_categoria);
    $sql->bindParam('fyh_actualizacion', $fechaHora);
    $sql->bindParam('id_categoria', $id_categoria);
    
    if($sql->execute()){
       session_start();
       $_SESSION['mensaje'] = "Categoría actualizada correctamente.";
       $_SESSION['icono']   = "success";
       // header('location:'.$url.'roles/');
       ?>
         <script>
          location.href = "<?php echo $url; ?>/categorias" ;
         </script>
       <?php
    }else{
        session_start();
        $_SESSION['mensaje'] = "Algo salio mal: la categoría no se actualizo";
        $_SESSION['icono']   = "error";
        // header('location:'.$url.'roles/update.php?id='.$id_rol.'');
        ?>
         <script>
           location.href = "<?php echo $url; ?>/categorias" ;
         </script>
        <?php
    }

?>