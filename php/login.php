<?php
session_start();

include 'Conexion_bc.php';


$usuario = $_POST['user'];
$contra = $_POST['pass'];
$contra = hash('sha512', $contra);


$consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' and password='$contra'";
$Verificacion = mysqli_query($conexion, $consulta);

if (mysqli_num_rows($Verificacion) > 0) {

    $_SESSION['usuario'] = $usuario;
    header("location: ../bievenida.php");
    exit;
    // echo '
    // <script>
    // alert("si#");
    // </script>
    // ';
} else {
    echo '<script>
    alert("Usuario o contraseña Incorrecta");
    window.location="../index.php";
    </script>';
    // header("location: ../index.php");
}
