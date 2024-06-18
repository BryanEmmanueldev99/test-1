ESTA ES UNA VERSION ANTIGUA DEL SISTEMA DE VENTAS BETA,  SU ACTUALIZACIÓN FUE EL 18/06/2024

NUEVAS FUNCIONES PARA LA APLICACIÓN
$queryverify = $pdo->prepare("SELECT COUNT(*) FROM tb_compras WHERE codigo = codigo");

                       $stmt->execute(array($codigo));
                       
                       $codigoExistencia = $stmt->fetchColumn();
                       
                       if ($codigoExistencia > 0) {
                           echo "El : {$codigo} ya existe prueba con otro";
                       } else {
                           /*
                               Aquí procede la alta
                           */
                       }


