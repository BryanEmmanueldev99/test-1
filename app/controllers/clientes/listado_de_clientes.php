<?php
   
   $sql_clientes = " SELECT * FROM tb_clientes ";
   $query_clientes = $pdo->prepare($sql_clientes);
   $query_clientes->execute();
   $total_clientes = $query_clientes->rowCount();
   //foreach
   $clientes_info = $query_clientes->fetchAll(PDO::FETCH_ASSOC);

?>