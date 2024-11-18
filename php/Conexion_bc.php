<?php
$host = 'sql207.infinityfree.com';
$usuario = 'if0_37735602';
$contrasena = 'Jb1TDHK7tXtJ';
$basedd = 'if0_37735602_gymupc';
$port='3306';
function conexion()
{
    try{
    $conexion = mysqli_connect($GLOBALS['host'], $GLOBALS['usuario'], $GLOBALS['contrasena'], $GLOBALS['basedd'], $GLOBALS['port']);
    return $conexion;}
    catch (Exception $e){
        header("location:../index.php?conexion=error");
    }
}
function cerrar_conexion($conexion)
{
    mysqli_close($conexion);
}

// $conexion = mysqli_connect("localhost", "root", "", "gymupc");
// if ($conexion) {
//     echo 'conexion exitosa';
// } else {
//     echo 'no se conecto';
// }
