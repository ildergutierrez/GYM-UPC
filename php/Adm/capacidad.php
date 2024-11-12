<?php
include '../Conexion_bc.php';
$conn = conexion();

// Comprobar si se recibió el número de id
if (isset($_POST['nombre'])) {
    $nombre = trim($_POST['nombre']);
    $sql_lugar = "SELECT * FROM lugares WHERE nombre ='$nombre'";
    $result_lugar = mysqli_query($conn, $sql_lugar);
    if ($result_lugar && $result_lugar->num_rows > 0) {
        $row_lugar = $result_lugar->fetch_assoc();
        $id = $row_lugar['id'];
        // Preparar y ejecutar la consulta SQL
        $sql = "SELECT * FROM capacidades WHERE lugar = '$id'";
        $result = mysqli_query($conn, $sql);
        // Verificar si se encontró algún registro
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Devolver los datos como JSON
            echo json_encode([
                'success' => true,
                'capacidad' => $row['capacidad'],
                'id' => $row['lugar'],
            ]);
        } else {

            // Si no se encuentra el instructor
            echo json_encode([
                'success' => true,
                'capacidad' => '0',
                'id' => $id,
            ]);
        }
    }
} else {
    echo json_encode(['success' => false]);
}

// Cerrar conexión
cerrar_conexion($conn);
