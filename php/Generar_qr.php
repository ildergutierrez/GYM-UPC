<?php
if (!isset($_SESSION['documento']) || $_SESSION['rol'] != 3) {
    header('Location: ../../index.php');
}
// clase para generar el qr
class Generar_qr
{
    //fubcion para generar el qr, es la informacion que se va a guardar en el qr
    function GenaraQR($documento, $conexion): array|bool
    {
        $devolver = array();
        $qerry = "SELECT * FROM `cupos` WHERE `id` = '$documento'";
        $resultado = mysqli_query($conexion, $qerry);
        if ($resultado && mysqli_num_rows($resultado) > 0) {
            $row = mysqli_fetch_array($resultado);
            $devolver[0] = $row['id'];
            $devolver[1] = $row['hora'];
            $devolver[2] = $row['fecha'];
            $devolver[3] = $row['lugar'];
            $devolver[4] = $row['hora_limite'];
        }

        return $devolver;
    }
}
