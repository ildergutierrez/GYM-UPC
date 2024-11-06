<?php
if (!isset($_POST['id'])) {
    header('Location: ../../index.php');
    exit();
}
include('../Conexion_bc.php');
$conexion = conexion();
$id = $_POST['id'];
function Buscar($conexion, $id): array|bool
{
    $valor = array();
    $sql = "SELECT * FROM restricciones WHERE id = '$id'";
    $consulta = mysqli_query($conexion, $sql);
    if ($consulta && $consulta->num_rows > 0) {
        $resultado = mysqli_fetch_array($consulta);
        $valor = $resultado;
        return $valor;
    } else {
        return false;
    }
}

//pasarlo a javascript el resultado
$valor = Buscar($conexion, $id);
$direccion = "../../paginas/Administrador/activar_afiliados.php";
if ($valor) {

    //formato de fecha
    $fecha1 = new DateTime($valor['fecha_inicio']);
    $fecha1 = $fecha1->format('d-m-Y');
    $fecha2 = new DateTime($valor['fecha_reactivacion']);
    $fecha2 = $fecha2->format('d-m-Y');

    $direccion=$direccion."?id=".$id."&finicio=".$fecha1."&ffin=".$fecha2;
    header('Location: ' . $direccion);
} else {
    header('Location: ' . $direccion);
    exit();
}
