$(document).ready(function(){
    var funcion;
    obtener_productos();

    function obtener_productos() {
        funcion = "llenar_productos";
        $.post('../Controllers/ProductoController.php', { funcion }, function(response) {
            let productos = JSON.parse(response); 
            let template = `
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Imagen de muestra</th>
                            <th>Precio</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>`;
    
            productos.forEach(producto => {
                template += `
                    <tr>
                        <td>${producto.nombrep}</td>
                        <td class="tdImagen"><img class="imagenestabla" src="../Util/img/${producto.imagenp}" alt="${producto.nombrep}"></td>
                        <td>${producto.preciop}</td>
                        <td class="tdImagen">
                            <a href="agregar.php?idP=${producto.idp}">
                                <img class="carrito" src="../Util/img/carrito.avif" alt="carritoCompras">
                            </a>
                        </td>
                    </tr>`;
            });
    
            template += `
                    </tbody>
                </table>`;
    
            $('#productos').html(template);
        });
    }
    

})