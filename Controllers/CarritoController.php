<?php
include_once('../Util/php/session_car.php');

class CarritoController {
    public function __construct() {
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = array();
        }
    }

    // Función para mostrar productos del carrito
    public function mostrarCarrito() {
        if (empty($_SESSION['carrito'])) {
            return json_encode(array('mensaje' => 'El carrito está vacío'));
        } else {
            return json_encode($_SESSION['carrito']);
        }
    }

    // Incrementar cantidad de producto
    public function incrementarCantidad($idProducto) {
        if (isset($_SESSION['carrito'][$idProducto])) {
            $_SESSION['carrito'][$idProducto]['cantidad'] += 1;
            return json_encode(array('mensaje' => 'Cantidad incrementada'));
        } else {
            return json_encode(array('mensaje' => 'Producto no encontrado en el carrito'));
        }
    }

    // Decrementar cantidad de producto
    public function decrementarCantidad($idProducto) {
        if (isset($_SESSION['carrito'][$idProducto])) {
            if ($_SESSION['carrito'][$idProducto]['cantidad'] > 1) {
                $_SESSION['carrito'][$idProducto]['cantidad'] -= 1;
                return json_encode(array('mensaje' => 'Cantidad decrementada'));
            } else {
                return json_encode(array('mensaje' => 'La cantidad no puede ser menor a 1'));
            }
        } else {
            return json_encode(array('mensaje' => 'Producto no encontrado en el carrito'));
        }
    }

    // Eliminar producto del carrito
    public function eliminarProducto($idProducto) {
        if (isset($_SESSION['carrito'][$idProducto])) {
            unset($_SESSION['carrito'][$idProducto]);
            return json_encode(array('mensaje' => 'Producto eliminado del carrito'));
        } else {
            return json_encode(array('mensaje' => 'Producto no encontrado en el carrito'));
        }
    }
}

$carrito = new CarritoController();

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        case 'mostrar':
            echo $carrito->mostrarCarrito();
            break;
        case 'incrementar':
            $idProducto = $_POST['id_producto'];
            echo $carrito->incrementarCantidad($idProducto);
            break;
        case 'decrementar':
            $idProducto = $_POST['id_producto'];
            echo $carrito->decrementarCantidad($idProducto);
            break;
        case 'eliminar':
            $idProducto = $_POST['id_producto'];
            echo $carrito->eliminarProducto($idProducto);
            break;
        default:
            echo json_encode(array('mensaje' => 'Acción no válida'));
    }
} else {
    echo json_encode(array('mensaje' => 'No se ha enviado ninguna acción'));
}

