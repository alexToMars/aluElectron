$(document).ready(function(){
    let idProducto = getParameterByName('idP');
    if (idProducto) {
        obtenerProductoPorId(idProducto);
    } else {
        $('#producto-detalle').html('<p>No se proporcionó ningún ID en la URL.</p>');
    }

    function obtenerProductoPorId(id) {
        let funcion = 'obtener_id';
        $.get('../Controllers/ProductoController.php', { funcion: funcion, idP: id }, function(response) {
            let producto = JSON.parse(response);
            console.log(response);
            if (producto.length > 0) {
                let template = '';
                producto.forEach(prod => {
                    template += `
                    <img class="imagenestabla" src="../Util/img/${prod.imagenp}">
                    <form action="acumular3.php" method="post" name="AgregarCarrito">
                        <input type="text" name="nombre" class="borde" value="${prod.nombrep}" readonly="readonly"><br><br>
                        &nbsp;&nbsp;
                        $<input type="text" name="precio" class="borde" size="1" value="${prod.preciop}" readonly="readonly">MXN
                        &nbsp;&nbsp;
                        <input type="number" placeholder="Cantidad a Pedir" name="cantidad" size="8" max="10" min="1">
                        &nbsp;&nbsp;
                        <input name="Agregar" class="btn btn-success" type="submit" id="btnAgregar" value="AGREGAR">
                    </form>`;
                });
                $('#producto-detalle').html(template);  // Insertamos los detalles del producto
            } else {
                $('#producto-detalle').html('<p>Producto no encontrado.</p>');
            }
        });
    }

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
