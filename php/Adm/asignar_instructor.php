<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../Conexion_json.php');

$conn = conexion();

// Comprobar si se recibió el número de documento
if (isset($_POST['documento'])) {
    $documento = $_POST['documento'];
    
    // Consultar para verificar si el usuario es un instructor
    $sql_user = "SELECT * FROM usuarios WHERE id = '$documento' and rol = '2'";
    $result_user = mysqli_query($conn, $sql_user);
    
    if ($result_user && $result_user->num_rows > 0) {
        // Consultar los detalles del usuario
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
            // Si no se encuentra el registro
            echo json_encode(['success' => false]);
        }
    }
    // Cerrar la conexión después de la consulta
    mysqli_close($conn);
} else {
    echo json_encode(['success' => false]);mysqli_close($conn);
}
// Cerrar conexión al final del script

?>
