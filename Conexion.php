<?php

    $credenciales = parse_ini_file("creditales.env");

    $host = $credenciales['DB_HOST'];
    $pass = $credenciales['DB_PASS'];

    $conexion = mysqli_connect($host, $credenciales['DB_USER'], $credenciales['DB_PASS'], $credenciales['DB_NAME']);
    

    if (!$conexion) {
    die("Error fatal: " . mysqli_connect_error());
    }
    $conexion->set_charset("utf8");
?>