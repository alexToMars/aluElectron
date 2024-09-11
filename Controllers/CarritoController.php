<?php
include_once('../Util/php/session_car.php');

class CarritoController {
    public function __construct() {
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = array();
        }
    }
    public function mostrarCarrito() {
        if (empty($_SESSION['carrito'])) {
            return json_encode(array('mensaje' => 'El carrito está vacío'));
        } else {
            return json_encode($_SESSION['carrito']);
        }
    }

    // Método para generar y actualizar el XML
    private function actualizarXML() {
        // Crear la carpeta 'users_xmls' si no existe
        $userId = $_SESSION['id']; // Suponiendo que tienes el ID de usuario en sesión
        $dir = "../users_xmls";
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true); // Crear el directorio si no existe
        }

        // Ruta del archivo XML
        $xmlFile = "$dir/carrito$userId.xml";

        // Crear un nuevo objeto SimpleXMLElement
        $xml = new SimpleXMLElement('<productos/>');

        // Agregar los productos del carrito al XML
        foreach ($_SESSION['carrito'] as $idProducto => $producto) {
            $item = $xml->addChild('producto');
            $item->addAttribute('id', $idProducto);
            $item->addChild('nombre', $producto['nombre']);
            $item->addChild('precio', $producto['precio']);
            $item->addChild('cantidad', $producto['cantidad']);
            $item->addChild('imagen', $producto['imagen']);
        }

        // Guardar el XML en la carpeta
        $xml->asXML($xmlFile);
    }

    public function generarXML() {
        if (empty($_SESSION['carrito'])) {
            echo json_encode(array('mensaje' => 'El carrito está vacío'));
            return;
        }

        // Crear un nuevo objeto XML
        $xml = new SimpleXMLElement('<productos/>');

        foreach ($_SESSION['carrito'] as $idProducto => $producto) {
            $item = $xml->addChild('producto');
            $item->addAttribute('id', $idProducto);
            $item->addChild('nombre', $producto['nombre']);
            $item->addChild('precio', $producto['precio']);
            $item->addChild('cantidad', $producto['cantidad']);
        }

        // Establecer los encabezados para descargar el archivo XML
        header('Content-Disposition: attachment; filename="carrito.xml"');
        header('Content-Type: application/xml');

        // Mostrar el XML directamente
        echo $xml->asXML();
    }

    public function agregarProducto($idProducto, $nombreProducto, $precioProducto, $cantidadProducto , $imagenProducto) {
        // Verificar si el producto ya está en el carrito
        if (isset($_SESSION['carrito'][$idProducto])) {
            $_SESSION['carrito'][$idProducto]['cantidad'] += $cantidadProducto;
        } else {
            $_SESSION['carrito'][$idProducto] = array(
                'nombre' => $nombreProducto,
                'precio' => $precioProducto,
                'cantidad' => $cantidadProducto,
                'imagen' => $imagenProducto,
            );
        }

        // Actualizar el archivo XML
        $this->actualizarXML();

        return json_encode(array('mensaje' => 'Producto agregado al carrito y XML actualizado'));
    }

    // Incrementar cantidad de producto
    public function incrementarCantidad($idProducto) {
        if (isset($_SESSION['carrito'][$idProducto])) {
            $_SESSION['carrito'][$idProducto]['cantidad'] += 1;

            // Actualizar el archivo XML
            $this->actualizarXML();

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

                // Actualizar el archivo XML
                $this->actualizarXML();

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

            // Actualizar el archivo XML
            $this->actualizarXML();

            return json_encode(array('mensaje' => 'Producto eliminado del carrito'));
        } else {
            return json_encode(array('mensaje' => 'Producto no encontrado en el carrito'));
        }
    }
}

$carrito = new CarritoController();

if (isset($_POST['accion']) || isset($_GET['accion'])) {
    $accion = isset($_POST['accion']) ? $_POST['accion'] : $_GET['accion'];
    switch ($accion) {
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
        case 'agregar':
            $idProducto = $_POST['id_producto'];
            $nombreProducto = $_POST['nombre_producto'];
            $precioProducto = $_POST['precio_producto'];
            $cantidadProducto = $_POST['cantidad'];
            $imagenProducto = $_POST['imagen_producto'];
            echo $carrito->agregarProducto($idProducto, $nombreProducto, $precioProducto, $cantidadProducto, $imagenProducto);
            break;
        case 'generar_xml':
            $carrito->generarXML();
            break;
        default:
            echo json_encode(array('mensaje' => 'Acción no válida'));
    }
} else {
    echo json_encode(array('mensaje' => 'No se ha enviado ninguna acción'));
}
