<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../Conexion_json.php');
$conn = conexion();
// $_POST['documento']="1007246311";
// Comprobar si se recibió el número de documento
if (isset($_POST['documento'])) {
    $documento = $_POST['documento'];

    // Preparar y ejecutar la consulta SQL
    $sql = "SELECT * FROM restricciones WHERE id = '$documento'";
    $result = mysqli_query($conn, $sql);

    // Verificar si se encontró algún registro
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Devolver los datos como JSON
        echo json_encode([
            'success' => true,
            'inicio' => $row['fecha_inicio'],
            'final' => $row['fecha_reactivacion'],
            'id' => $row['id'],
        ]);
    } else {
        // Si no se encuentra el registro
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false]);
}

// Cerrar conexión
$conn->close();
?>
