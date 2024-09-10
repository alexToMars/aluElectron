$(document).ready(function() {
    // Mostrar el carrito al cargar la página
    mostrarCarrito();

    // Función para mostrar el carrito
    function mostrarCarrito() {
        $.post('../Controllers/CarritoController.php', { accion: 'mostrar' }, function(response) {
            let carrito = JSON.parse(response);
            console.log(response);
            let template = '';

            if (carrito.mensaje) {
                // Si el carrito está vacío
                $('#carrito-detalle').html('<p>' + carrito.mensaje + '</p>');
            } else {
                // Si hay productos en el carrito
                template += '<table>';
                template += '<thead><tr><th>Producto</th><th>Cantidad</th><th>Precio Unitario</th><th>Precio Total</th><th>Acciones</th></tr></thead>';
                template += '<tbody>';

                $.each(carrito, function(idProducto, producto) {
                    template += `<tr>
                        <td>${producto.nombre}</td>
                        <td>
                            <a href="#" class="actualizar-cantidad" data-id="${idProducto}" data-action="decrement">-</a>
                            ${producto.cantidad}
                            <a href="#" class="actualizar-cantidad" data-id="${idProducto}" data-action="increment">+</a>
                        </td>
                        <td>$${producto.precio}</td>
                        <td>$${(producto.precio * producto.cantidad)}</td>
                        <td><a href="#" class="eliminar-producto" data-id="${idProducto}">Eliminar</a></td>
                    </tr>`;
                });

                template += '</tbody>';
                template += '</table>';
                $('#carrito-detalle').html(template);
            }
        });
    }

    // Eliminar producto del carrito
    $(document).on('click', '.eliminar-producto', function(e) {
        e.preventDefault();
        let idProducto = $(this).data('id');
        $.post('../Controllers/CarritoController.php', { accion: 'eliminar', id_producto: idProducto }, function(response) {
            let resultado = JSON.parse(response);
            alert(resultado.mensaje);
            mostrarCarrito();
        });
    });

    // Incrementar o decrementar cantidad del producto
    $(document).on('click', '.actualizar-cantidad', function(e) {
        e.preventDefault();
        let idProducto = $(this).data('id');
        let accion = $(this).data('action'); 

        $.post('../Controllers/CarritoController.php', {
            accion: accion === 'increment' ? 'incrementar' : 'decrementar',
            id_producto: idProducto
        }, function(response) {
            let resultado = JSON.parse(response);
            mostrarCarrito(); 
        });
    });
});
