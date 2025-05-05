<?php
require_once 'sigleton.php';
function conexion()
{
    return ConexionSingleton::getInstancia()->getConexion();
}
function cerrar_conexion($conexion)
{
    return ConexionSingleton::getInstancia()->cerrarConexion();
}

// $conexion = mysqli_connect("localhost", "root", "", "gymupc");
// if ($conexion) {
//     echo 'conexion exitosa';
// } else {
//     echo 'no se conecto';
// }
