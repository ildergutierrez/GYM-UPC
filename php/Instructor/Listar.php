<?php
session_start();
$id =$_SESSION['documento'];
// Listar para Instructor
// Incluye la conexión a la base de datos
include '../Conexion_bc.php';
$conexion = conexion();

$consulta ="SELECT * FROM instructores WHERE id = '$id'";
$resultado = mysqli_query($conexion, $consulta);
if($resultado){
    $row = $resultado->fetch_assoc();
    $identificador = $row['lugar'];
}


// Arreglo para almacenar los resultados
$usuarios = array();

// Consulta SQL para obtener datos de persona y correo de usuario
//$sql = "SELECT cupos.*, persona.`nombre completo` FROM cupos JOIN persona ON persona.documento = cupos.id";

$sql = "SELECT 
    cupos.id, 
    persona.`nombre completo` AS nombre, 
    cupos.fecha, 
    cupos.hora, 
    lugares.id AS lugar_id
FROM 
    Cupos
JOIN 
    persona ON cupos.id = persona.documento
JOIN 
    lugares ON cupos.lugar = lugares.id
WHERE 
    lugares.id = '$identificador'";

// Ejecuta la consulta y verifica si tiene éxito
$resultado = mysqli_query($conexion, $sql);

header('Content-Type: application/json'); // Encabezado para especificar el tipo de contenido JSON

if ($resultado) {
    while ($row = $resultado->fetch_assoc()) {
        $usuarios[] = $row;
    }
    echo json_encode($usuarios);
} else {
    echo json_encode(["error" => "Error en la consulta: " . mysqli_error($conexion)]);
}
