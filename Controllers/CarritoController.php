<?php
include_once('../Util/php/session_car.php'); // Incluimos el archivo para gestionar la sesión

if (isset($_POST['id_producto']) && isset($_POST['cantidad'])) {
    $idProducto = $_POST['id_producto'];
    $nombreProducto = $_POST['nombre_producto'];
    $precioProducto = $_POST['precio_producto'];
    $cantidad = $_POST['cantidad'];
    if (isset($_SESSION['carrito'][$idProducto])) {
        $_SESSION['carrito'][$idProducto]['cantidad'] += $cantidad;
    } else {
        $_SESSION['carrito'][$idProducto] = array(
            'nombre' => $nombreProducto,
            'precio' => $precioProducto,
            'cantidad' => $cantidad
        );
    }
    echo json_encode(array('mensaje' => 'Producto agregado al carrito con éxito'));
} else {
    echo json_encode(array('mensaje' => 'Error al agregar el producto al carrito'));
}
