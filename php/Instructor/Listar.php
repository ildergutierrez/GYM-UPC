<?php


// Listar para Instructor
// Incluye la conexión a la base de datos
include '../Conexion_bc.php';
$conexion = conexion();

// Arreglo para almacenar los resultados
$usuarios = array();

// Consulta SQL para obtener datos de persona y correo de usuario
$sql = "SELECT cupos.*, persona.`nombre completo` FROM cupos JOIN persona ON persona.documento = cupos.id";

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
