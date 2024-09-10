<?php
include_once("../Models/Producto.php");
include_once("../Util/php/session_car.php");
$producto = new Producto();

if (isset($_POST['funcion']) || isset($_GET['funcion'])) {
    $funcion = isset($_POST['funcion']) ? $_POST['funcion'] : $_GET['funcion'];

    if ($funcion == "llenar_productos") {
        $producto->obtener_productos();
        $json = array();
        foreach ($producto->objetos as $objeto) {
            $json[] = array(
                'idp' => $objeto->idp,
                'nombrep' => $objeto->nombrep,
                'imagenp' => $objeto->imagenp,
                'preciop' => $objeto->preciop,
                'existenciap' => $objeto->existenciap
            );
        }
        echo json_encode($json);

    } else if ($funcion == "obtener_id") {
        if (isset($_GET['idP'])) {
            $idProducto = $_GET['idP'];
            $producto->obtenerProductoPorId($idProducto);
            $json = array();

            if (!empty($producto->objetos)) {
                foreach ($producto->objetos as $objeto) {
                    $json[] = array(
                        'idp' => $objeto->idp,
                        'nombrep' => $objeto->nombrep,
                        'imagenp' => $objeto->imagenp,
                        'preciop' => $objeto->preciop,
                        'existenciap' => $objeto->existenciap
                    );
                }
                echo json_encode($json);  // Enviamos el producto como JSON
            } else {
                echo json_encode(array('mensaje' => 'Producto no encontrado'));
            }
        } else {
            echo json_encode(array('mensaje' => 'ID de producto no proporcionado'));
        }
    } else {
        echo json_encode(array('mensaje' => 'Función no válida'));
    }
} else {
    echo json_encode(array('mensaje' => 'No se ha enviado ninguna función'));
}
