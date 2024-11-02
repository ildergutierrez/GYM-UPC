<?php

if (isset($_GET['correo']) && isset($_GET['codigo'])) {
    $email = $_GET['correo'];
    include('Conexion_bc.php');

    $conexion = conexion();
    $correo = base64_decode($_GET['correo']);
    $token = $_GET['codigo'];
    $direccion = '../index.php?respuesta=1';
    $error = "../paginas/index/Verificacion_correo.php?correo=$email";
} else {
    echo '<script>
    window.location="../index.php";
    </script>';
    exit();
}
$qerry = "SELECT * FROM usuarios WHERE correo = '$correo'";
$busqueda = mysqli_query($conexion, $qerry);

if ($busqueda && mysqli_num_rows($busqueda) > 0) {
    $fila = mysqli_fetch_assoc($busqueda);

    if ($fila['verificacion'] == $token) {
        $qerry = "UPDATE usuarios SET verificacion = '1' WHERE correo = '$correo'";
        $busqueda = mysqli_query($conexion, $qerry);
        if ($busqueda) {
            header("Location: $direccion");
            cerrar_conexion($conexion); // Cierra la conexión con la base de datos
            exit();
        } else {
            echo "<script>
                        window.location ='$error';
                        </script>";
                        cerrar_conexion($conexion); // Cierra la conexión con la base de datos
            exit();
        }
    } else {
        echo "<script>
                    window.location ='$error';
                    </script>";
                    cerrar_conexion($conexion); // Cierra la conexión con la base de datos
        exit();
    }
    
} else {
    echo "<script>
                    window.location ='$error';
                    </script>";
                    cerrar_conexion($conexion); // Cierra la conexión con la base de datos
    exit();
}

