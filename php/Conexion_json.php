<?php
function conexion()
{
    $host = 'sql207.infinityfree.com';
    $usuario = 'if0_37735602';
    $contrasena = 'Jb1TDHK7tXtJ';
    $basedd = 'if0_37735602_gymupc';
    $port = '3306';
    $conexion = mysqli_connect("localhost", "root", "", "gymupc");
    // $conexion = mysqli_connect($host, $usuario, $contrasena, $basedd, $port);

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }
    
    // Aseguramos que la conexión use UTF-8
    mysqli_set_charset($conexion, "utf8mb4");

    return $conexion;
}
