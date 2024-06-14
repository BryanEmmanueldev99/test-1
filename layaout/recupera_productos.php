<script>
    $('#btn_selecionar<?php echo $id_producto_DAO; ?>').click(function() {

        const codigo = "<?php echo $producto['codigo']; ?>";
        $('#codigo').val(codigo);

        const id_producto = "<?php echo $producto['id_producto']; ?>";
        $('#id_producto').val(id_producto);


        const nombre = "<?php echo $producto['nombre']; ?>";
        $('#nombre').val(nombre);

        const descripcion = "<?php echo $producto['descripcion']; ?>";
        $('#descripcion').val(descripcion);

        const stock = "<?php echo $producto['stock']; ?>";
        $('#stock').val(stock);

        const stock_minimo = "<?php echo $producto['stock_minimo']; ?>";
        $('#stock_minimo').val(stock_minimo);

        const stock_maximo = "<?php echo $producto['stock_maximo']; ?>";
        $('#stock_maximo').val(stock_maximo);

        const precio_compra = "<?php echo $producto['precio_compra']; ?>";
        $('#precio_compra').val(precio_compra);

        const precio_venta = "<?php echo $producto['precio_venta']; ?>";
        $('#precio_venta').val(precio_venta);

        const fecha_ingreso = "<?php echo $producto['fecha_ingreso']; ?>";
        $('#fecha_ingreso').val(fecha_ingreso);

        const nombre_categoria = "<?php echo $producto['nombre_categoria']; ?>";
        $('#nombre_categoria').val(nombre_categoria);

        const ruta_file_img = "<?php
                                echo $url . 'almacen/wc_img_productos/'
                                    . $producto['imagen']; ?>";
        //carga la imagen con el producto seleccionado del buscador ajax
        $('#imagen').attr({
            src: ruta_file_img
        })


        //cierra el modal al seleccionar un producto
        $('#modal-buscar-producto').modal('toggle');
    });
</script>