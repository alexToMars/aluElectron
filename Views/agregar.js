$(document).ready(function() {
    let idProducto = getParameterByName('idP');
    
    if (idProducto) {
        obtenerProductoPorId(idProducto);
    } else {
        $('#producto-detalle').html('<p>No se proporcionó ningún ID en la URL.</p>');
    }

    // Función para obtener los detalles del producto por ID
    function obtenerProductoPorId(id) {
        let funcion = 'obtener_id';
        $.get('../Controllers/ProductoController.php', { funcion: funcion, idP: id }, function(response) {
            let producto = JSON.parse(response);
            if (producto.length > 0) {
                let template = '';
                producto.forEach(prod => {
                    template += `
                    <img class="imagenestabla" src="../Util/img/${prod.imagenp}">
                    <form id="form-agregar-carrito">
                        <input type="hidden" name="accion" value="agregar">
                        <input type="hidden" name="id_producto" value="${prod.idp}">
                        <input type="hidden" name="imagen_producto" value="${prod.imagenp}">
                        <input type="hidden" name="nombre_producto" value="${prod.nombrep}">
                        <input type="hidden" name="precio_producto" value="${prod.preciop}">
                        <label for="cantidad">Cantidad:</label>
                        <input type="number" name="cantidad" id="cantidad" size="8" max="10" min="1" required>
                        <input class="btn btn-success" type="submit" value="AGREGAR AL CARRITO">
                    </form>
                    `;
                });
                $('#producto-detalle').html(template);

                $('#form-agregar-carrito').on('submit', function(e) {
                    e.preventDefault();
                
                    let formData = $(this).serialize(); // Obtenemos los datos del formulario
                    $.post('../Controllers/CarritoController.php', formData, function(response) {
                        let resultado = JSON.parse(response);
                        alert(resultado.mensaje); // Mostramos el mensaje devuelto por el controlador
                    });
                });                
            } else {
                $('#producto-detalle').html('<p>Producto no encontrado.</p>');
            }
        });
    }

    // Función para obtener parámetros de la URL (como el ID del producto)
    function getParameterByName(name) {
        let url = window.location.href;
        name = name.replace(/[\[\]]/g, '\\$&');
        let regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)');
        let results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, ' '));
    }
});

