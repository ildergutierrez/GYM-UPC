<?php
if (!isset($_POST['usuario']) || !isset($_POST['password'])) {
    echo '<script>
    window.location="../index.php";
    </script>';
    exit();
}

session_start();
include('Conexion_bc.php');
$conexion = conexion(); // Guarda la conexión en una variable
$email = strtolower($_POST['usuario']);
$contraseña = $_POST['password'];
$nombre = "";
$documento = "";
$rol = "";
$estado = "";

// Consulta para buscar el usuario en la base de datos

$qerry = "SELECT * FROM usuarios WHERE correo = '$email'";

if (verificar($email, $conexion) != false) {
    $busqueda = mysqli_query($conexion, $qerry);
    if (!$busqueda) {
        die("Error en la consulta: " . mysqli_error($conexion));
    }
    if ($busqueda && mysqli_num_rows($busqueda) > 0) {
        $fila = mysqli_fetch_assoc($busqueda);
        $documento = $fila['id'];
        $rol = $fila['rol'];
        $estado = $fila['estado'];
        $contrasena_almacenada = $fila['contrasena'];
        $nombre = nombre($fila['id'], $conexion);
        $id_user = $fila['id'];

        if (password_verify($contraseña, $contrasena_almacenada)) {
            if ($fila['verificacion'] == '1') {
                $_SESSION['Email'] = $email;
                $_SESSION['nombre'] = strtoupper($nombre);
                $_SESSION['documento'] = trim($id_user);
                $_SESSION['rol'] = trim($rol);
                $_SESSION['estado'] = trim($estado);
                // Define la dirección de redirección antes de usarla
                $direccion = '../paginas/view/bienvenida.php';
                header("Location: $direccion");
                exit();
            } else {
                $email = base64_encode($email);
                echo "<script>
                window.location ='../paginas/index/Verificacion_correo.php?correo=$email';
                </script>";
                exit();
            }
        } else {
            echo "<script>
                window.location.href = '../index.php?error=0';
                </script>";
            exit();
        }
    } else {
        echo "No se encontró el usuario.";
    }
}
function nombre($documento, $conexion)
{
    $qerry = "SELECT * FROM persona WHERE documento = '$documento'";
    $busqueda = mysqli_query($conexion, $qerry);
    $fila = mysqli_fetch_assoc($busqueda);
    return $fila['nombre completo'];
}

function verificar($correo, $conexion)
{
    $qerry = "SELECT * FROM usuarios WHERE correo = '$correo'";
    $busqueda = mysqli_query($conexion, $qerry);
    $fila = mysqli_fetch_assoc($busqueda);
    if ($fila['correo'] != null)
        return true;
    return false;
}

cerrar_conexion($conexion); // Cierra la conexión
