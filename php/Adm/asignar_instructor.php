<?php
include '../Conexion_bc.php';
$conn = conexion();

// Comprobar si se recibió el número de documento
if (isset($_POST['documento'])) {
    $documento = $_POST['documento'];
    // Preparar y ejecutar la consulta SQL
    $sql_user = "SELECT * FROM usuarios WHERE id = '$documento' and rol = '2'";
    $result_user = mysqli_query($conn, $sql_user);
    if ($result_user && $result_user->num_rows > 0) {
        $sql = "SELECT * FROM persona WHERE documento = '$documento'";
        $result = mysqli_query($conn, $sql);
        // Verificar si se encontró algún registro
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Devolver los datos como JSON
            echo json_encode([
                'success' => true,
                'nombre' => $row['nombre completo'],
                'telefono' => $row['celular'],
            ]);
        } else {
            // Si no se encuentra el instructor
            echo json_encode(['success' => false]);
        }
    }
} else {
    echo json_encode(['success' => false]);
}

// Cerrar conexión
cerrar_conexion($conn);
