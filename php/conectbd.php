<?php
    $conexion=mysqli_connect("localhost","root","20300103QWERTY","estelectron");

    if(!$conexion){
        die("Fallo en el establecimiento de la conexión: ".mysqli_connect_error());
    }

    mysqli_set_charset($conexion,"utf8");
?>