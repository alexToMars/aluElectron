<?php
    $conexion=mysqli_connect("localhost","estelectron","93c4f4afd","estelectron");
    //$conexion=mysqli_connect("localhost","root","","estelectron");

    if(!$conexion){
        die("Fallo en el establecimiento de la conexión: ".mysqli_connect_error());
    }

    mysqli_set_charset($conexion,"utf8");
?>