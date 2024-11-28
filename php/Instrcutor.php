<?php
//Archivo para asignar un instructor a un lugar
session_start();
if (!isset($_SESSION['Email'])) {
    header('Location: ../index.php');
}
include 'Conexion_bc.php';
if (isset($_POST['id']) || isset($_POST['n_lugar'])) {
    $conexion = conexion();
    $id = $_POST['id'];
    $lugar = $_POST['n_lugar'];
    $sql = "SELECT * FROM instructores WHERE id='$id'";
    $result = mysqli_query($conexion, $sql);
    //Se verifica si el instructor ya tiene un lugar asignado
    if ($result && mysqli_num_rows($result) > 0) {
        $actualizar = "UPDATE instructores SET lugar='$lugar' WHERE id='$id'";
        mysqli_query($conexion, $actualizar);
        try {
            if ($actualizar) {
                echo "<script>
        window.location.href = '../paginas/Administrador/asignar_instructor.php?respuesta=2';
        </script>";
            }
        } catch (Exception $e) {
            echo "<script>
            window.location.href = '../paginas/Administrador/asignar_instructor.php?respuesta=0';
            </script>";
        } finally {
            Cerrar_conexion($conexion);
        }
    } else {

        $insertar = "INSERT INTO instructores (id, lugar) VALUES ('$id','$lugar')";
        $resultado = mysqli_query($conexion, $insertar);

        try {
            if ($resultado) {
                echo "<script>
            window.location.href = '../paginas/Administrador/asignar_instructor.php?respuesta=1';
            </script>";
            }
        } catch (Exception $e) {
            echo "<script>
        window.location.href = '../paginas/Administrador/asignar_instructor.php?respuesta=0';
        </script>";
        } finally {
            Cerrar_conexion($conexion);
        }
    }
} else {

    echo "<script>
        window.location.href = '../paginas/Administrador/asignar_instructor.php?respuesta=0';
        </script>";
}
