<?php
function Verificacion($conexion, $fecha)
{
    $consulta = "SELECT * FROM actividades";
    $respuesta = mysqli_query($conexion, $consulta);
    if ($respuesta && mysqli_num_rows($respuesta) > 0) {
        $fila = mysqli_fetch_array($respuesta);
        $inicio = $fila['inicio'];
        $final = $fila['final'];
        if ($fecha >= $inicio && $fecha <= $final) {
            $_SESSION['r_inicio'] = $inicio;
            $_SESSION['r_final'] = $final;
            return false;
        } 
    }
    return true;
}

function Diferencia($fecha)
{
    $fecha = new DateTime($fecha);
    $fecha = strtotime($fecha->format('Y-m-d'));
    $hoy = date('Y-m-d');
    $hoy = strtotime($hoy);
    $diferencia = ($fecha - $hoy) / 86400;
    if ($diferencia > 7) {
        return false;
    }
    return true;
}
