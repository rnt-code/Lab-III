<?php
    $data_base_name = "inmobiliaria";
    $ruta = "localhost";
    $admin = "root";
    $password = "";
    
    $conexion = mysqli_connect($ruta, $admin, $password, $data_base_name);
    //mysqli_connect("127.0.0.1", "mi_usuario", "mi_contraseña", "mi_bd");
?>