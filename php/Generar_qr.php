<?php
if (!isset($_SESSION['documento']) || $_SESSION['rol'] != 3) {
    header('Location: ../../index.php');
}
$documento = $_SESSION['documento'];

include('Conexion_bc.php');
$conexion = conexion();
function GenaraQR(): array|bool
{
    global $documento, $conexion;
    $devolver = array();

    $qerry = "SELECT * FROM `cupos` WHERE `id` = '$documento'";
    $resultado = mysqli_query($conexion, $qerry);
    if (!$resultado) {
        return false;
    }
    while ($row = mysqli_fetch_array($resultado)) {
        $devolver[0] = $row['id'];
        $devolver[1] = $row['hora'];
        $devolver[2] = $row['fecha'];
        $devolver[3] = $row['lugar'];
        $devolver[4] = $row['hora_limite'];
    }
    cerrar_conexion($conexion);
    return $devolver;
}
