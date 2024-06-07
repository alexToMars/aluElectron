<?php
include_once("../Models/Usuario.php");
$usuario = new Usuario();
session_start();

if (isset($_POST['funcion'])) {
    $funcion = $_POST['funcion'];
    
    if ($funcion == 'login') {
        $user = $_POST['user'];
        $pass = $_POST['password'];
        $usuario->loguearse($user, $pass);
        if ($usuario->objetos != null) {
            /* Reflejamos los datos */
            foreach ($usuario->objetos as $objeto) {
                $_SESSION['id'] = $objeto->id;
                $_SESSION['user'] = $objeto->usuario;
                $_SESSION['tipo_usuario'] = $objeto->id_tipo;
                $_SESSION['avatar'] = $objeto->avatar;
            }
            echo 'logueado';
        } else {
            echo 'Usuario o contraseña incorrectos';
        }
    } elseif ($funcion == 'listar_usuario') {
        echo "Listar usuarios";
    }elseif($funcion == 'register'){
        $user = $_POST['user'];
        $telefono = $_POST['telefono'];
        $pass = $_POST['pass'];
        $nombres = $_POST['nombres'];
        $dni = $_POST['dni'];
        $apellidos = $_POST['apellidos'];
        $email= $_POST['email'];
        $usuario->registrarse($user,$telefono, $pass, $nombres, $dni , $apellidos, $email);
        if ($usuario->objetos != null) {
            echo 'Registrado';
        }
        else{
            echo 'No_Registrado';
        }
    } elseif ($funcion == 'verificar_sesion') {
        if (!empty($_SESSION['id'])) {
            $json[] = array(
                'id' => $_SESSION['id'],
                'user' => $_SESSION['user'],
                'tipo_usuario' => $_SESSION['tipo_usuario'],
                'avatar' => $_SESSION['avatar']
            );
            $jsonstring = json_encode($json[0]);
            echo $jsonstring;
        } else {
            echo '';
        }
    }
} else {
    echo "No se ha definido la función.";
}
?>
