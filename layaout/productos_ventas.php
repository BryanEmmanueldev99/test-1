<script>
    $('#btn_selecionar<?php echo $id_producto_DAO; ?>').click(function() {

        const producto = "<?php echo $producto['nombre']; ?>";
        $('#producto').val(producto);

        const categoria = "<?php echo $producto['nombre_categoria']; ?>";
        $('#categoria').val(categoria);

        const precio_unitario = "<?php echo $producto['precio_venta']; ?>";
        $('#precio_unitario').val(precio_unitario);

        const id_producto = "<?php echo $id_producto_DAO; ?>";
        $('#id_producto').val(id_producto);

        $('#cantidad').focus();
        
        //cierra el modal al seleccionar un producto
        //$('#modal-buscar-producto').modal('toggle');
    });
</script>