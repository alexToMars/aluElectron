
<?php
session_start(); // Aseguramos que la sesión esté iniciada

// Comprobamos si hay productos en el carrito
if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
    echo '<p>El carrito está vacío.</p>';
} else {
    // Mostramos los productos del carrito
    echo '<table>';
    echo '<thead><tr><th>Producto</th><th>Cantidad</th><th>Precio Unitario</th><th>Precio Total</th><th>Acciones</th></tr></thead>';
    echo '<tbody>';
    
    foreach ($_SESSION['carrito'] as $idProducto => $producto) {
        echo '<tr>';
        echo '<td>' . $producto['nombre'] . '</td>';
        echo '<td>' . $producto['cantidad'] . '</td>';
        echo '<td>$' . $producto['precio'] . '</td>';
        echo '<td>$' . ($producto['precio'] * $producto['cantidad']) . '</td>';
        echo '<td><a href="eliminar.php?id_producto=' . $idProducto . '">Eliminar</a></td>'; // Agrega una opción para eliminar
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
}
?>
