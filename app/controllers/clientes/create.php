<?php
include('../../config.php');

if (isset($_POST['nombre_cliente'])) {

    $nombre_cliente = $_POST['nombre_cliente'];
    $email_cliente = $_POST['email_cliente'];
    $celular_cliente = $_POST['celular_cliente'];
    $nit_ci_cliente = $_POST['nit_ci_cliente'];

    $sql = $pdo->prepare("INSERT INTO tb_clientes(nombre_cliente, nit_ci_cliente, celular_cliente, email_cliente, fyh_creacion) 
    VALUES(:nombre_cliente, :nit_ci_cliente, :celular_cliente, :email_cliente, :fyh_creacion)");

    $sql->bindParam('nombre_cliente', $nombre_cliente);
    $sql->bindParam('nit_ci_cliente', $nit_ci_cliente);
    $sql->bindParam('celular_cliente', $celular_cliente);
    $sql->bindParam('email_cliente', $email_cliente);
    $sql->bindParam('fyh_creacion', $fechaHora);

    if ($sql->execute()) { ?>
        <script>
            location.href = "<?php echo $url; ?>ventas/create.php";
        </script>
    <?php
    } else {
        session_start();
        $_SESSION['mensaje'] = "Algo salio mal: no se pudo agregar al cliente.";
        $_SESSION['icono']   = "error";
    ?>
        <script>
            location.href = "<?php echo $url; ?>ventas/create.php";
        </script>
<?php
    }
}


?>