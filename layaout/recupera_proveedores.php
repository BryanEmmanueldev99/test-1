<script>
    $('#btn_selecionar_proveedor<?php echo $proveedor['id_proveedor']; ?>').click(function() {

        const id_proveedor = "<?php echo $proveedor['id_proveedor']; ?>"
        $('#id_proveedor').val(id_proveedor);

        const nombre_proveedor = "<?php echo $proveedor['nombre_proveedor']; ?>"
        $('#nombre_proveedor').val(nombre_proveedor);

        const celular = "<?php echo $proveedor['celular']; ?>"
        $('#celular').val(celular);

        const telefono = "<?php echo $proveedor['telefono']; ?>"
        $('#telefono').val(telefono);

        const empresa = "<?php echo $proveedor['empresa']; ?>"
        $('#empresa').val(empresa);

        const email_proveedor = "<?php echo $proveedor['email_proveedor']; ?>"
        $('#email_proveedor').val(email_proveedor);

        //cierra el modal al seleccionar un proveedor
        $('#modal-buscar-proveedor').modal('toggle');
    });
</script>
