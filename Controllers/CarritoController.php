<?php
include_once('../Util/php/session_car.php');

class CarritoController {
    
    public function __construct() {
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = array();
        }
    }

    // Función para agregar producto al carrito
    public function agregarProducto($idProducto, $nombreProducto, $precioProducto, $cantidad) {
        if (isset($_SESSION['carrito'][$idProducto])) {
            $_SESSION['carrito'][$idProducto]['cantidad'] += $cantidad;
        } else {
            $_SESSION['carrito'][$idProducto] = array(
                'nombre' => $nombreProducto,
                'precio' => $precioProducto,
                'cantidad' => $cantidad
            );
        }
        return json_encode(array('mensaje' => 'Producto agregado al carrito con éxito'));
    }

    // Función para mostrar productos del carrito
    public function mostrarCarrito() {
        if (empty($_SESSION['carrito'])) {
            return json_encode(array('mensaje' => 'El carrito está vacío'));
        } else {
            return json_encode($_SESSION['carrito']);
        }
    }

    // Función para eliminar un producto del carrito
    public function eliminarProducto($idProducto) {
        if (isset($_SESSION['carrito'][$idProducto])) {
            unset($_SESSION['carrito'][$idProducto]);
            return json_encode(array('mensaje' => 'Producto eliminado del carrito'));
        } else {
            return json_encode(array('mensaje' => 'Producto no encontrado en el carrito'));
        }
    }
}

// Aquí gestionamos las peticiones AJAX
$carrito = new CarritoController();

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        case 'agregar':
            $idProducto = $_POST['id_producto'];
            $nombreProducto = $_POST['nombre_producto'];
            $precioProducto = $_POST['precio_producto'];
            $cantidad = $_POST['cantidad'];
            echo $carrito->agregarProducto($idProducto, $nombreProducto, $precioProducto, $cantidad);
            break;
        
        case 'mostrar':
            echo $carrito->mostrarCarrito();
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
?>

