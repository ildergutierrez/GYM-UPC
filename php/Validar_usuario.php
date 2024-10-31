<?php

if (isset($_GET['correo']) && isset($_GET['codigo'])) {
    $email = $_GET['correo'];
    include('Conexion_bc.php');
    $conexion = conexion();
    $correo = base64_decode($_GET['correo']);
    $token = $_GET['codigo'];
    $consulta_email = "SELECT * FROM usuarios WHERE correo='$correo' and verificacion='$token'";
    $Verificacion_email = mysqli_query($conexion, $consulta_email);
    if (mysqli_num_rows($Verificacion_email) > 0) {
        $query = "UPDATE `usuarios` SET `verificacion`='1' WHERE `correo`='$correo' ";
        $ejecutar = mysqli_query($conexion, $query);
        if ($ejecutar) {
            echo "<script>
            location.href ='../index.php';
            </script>";
        } else {
            echo "<script>
            window.location ='../paginas/index/Verificacion_correo.php?correo=$email';
            </script>";
        }
    } else {
        echo "<script>
        window.location ='../paginas/index/Verificacion_correo.php?correo=$email';
        </script>";
    }
    cerrar_conexion($conexion);
} else {
    echo "<script>
        window.location ='../paginas/index/Verificacion_correo.php?correo=$email';
        </script>";
}
