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

echo $correo;

$qerry = "SELECT * FROM verificaciones WHERE correo = '$correo'";
$busqueda = mysqli_query($conexion, $qerry);


if ($busqueda && mysqli_num_rows($busqueda) > 0) {
    $fila = mysqli_fetch_assoc($busqueda);
    $id= $fila['id'];

    if ($fila['token'] == $token) {
        $sql_verificacion ="DELETE FROM verificaciones WHERE id = '$id'";
        $busqueda_v = mysqli_query($conexion, $sql_verificacion);
        $qerry = "UPDATE usuarios SET verificacion = '1' WHERE id = '$id'";
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

