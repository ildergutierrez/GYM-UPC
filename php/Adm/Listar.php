<?php
session_start();
if (isset($_SESSION['Email'])) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once('../Conexion_json.php');


    $conexion = conexion();
    $usuarios = [];

    // Consulta SQL para obtener datos de persona y correo de usuario
    $sql = "SELECT persona.*, usuarios.rol, usuarios.correo FROM persona JOIN usuarios ON persona.documento = usuarios.id";

    // Ejecuta la consulta y verifica si tiene éxito
    $resultado = mysqli_query($conexion, $sql);

    header('Content-Type: application/json; charset=utf-8'); // Especificamos el encabezado para UTF-8

    if ($resultado->num_rows > 0) {
        try {
            $usuarios = $resultado->fetch_all(MYSQLI_ASSOC); // Obtiene todas las filas de un conjunto de resultados como un array asociativo
            echo json_encode($usuarios, JSON_UNESCAPED_UNICODE); // Evitar que se escapen los caracteres UTF-8

            // Verifica si hay errores con JSON
            // echo json_last_error_msg();
        } catch (Exception $e) {
            echo json_encode(["error" => "Error al obtener los datos: " . $e->getMessage()]);
        }
    } else {
        echo json_encode(["error" => "Error en la consulta: " . mysqli_error($conexion)]);
    }

    $conexion->close();
}
