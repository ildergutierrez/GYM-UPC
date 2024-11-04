<?php
class Login{


// Funciones
// Convierte la cadena a minúsculas y pone la primera letra en mayúscula
public function convertirFrase($frase) {
    return ucwords(strtolower($frase));
}

//busca el nombre, celular y sexo dentro de la base de datos en la tabla persona
function nombre($documento, $conexion)
{
    $qerry = "SELECT * FROM persona WHERE documento = '$documento'";
    $busqueda = mysqli_query($conexion, $qerry);
    $fila = mysqli_fetch_assoc($busqueda);
    $array = array();
    $array[0] = $fila['nombre completo'];
    $array[1] = $fila['celular'];
    $array[2] = $fila['sexo'];
    return $array;
}

//verifica si el correo existe en la base de datos
function verificar($correo, $conexion)
{
    $qerry = "SELECT * FROM usuarios WHERE correo = '$correo'";
    $busqueda = mysqli_query($conexion, $qerry);
    if ($busqueda && mysqli_num_rows($busqueda) > 0) {
        return true;
    }
    return false;
}

}
if (!isset($_POST['usuario']) || !isset($_POST['password'])) {
    echo '<script>
    window.location="../index.php";
    </script>';
    exit();
}

$login = new Login();



session_start();
include('Conexion_bc.php');
$conexion = conexion(); // Guarda la conexión en una variable
$direccion = '../paginas/view/bienvenida.php';

// Variables
$email = strtolower($_POST['usuario']);
$contraseña = $_POST['password'];
$nombre = "";
$documento = "";
$rol = "";
$estado = "";
$telefono = "";
$genero = "";

$datos = array();


// Consulta para buscar el usuario en la base de datos
$qerry = "SELECT * FROM usuarios WHERE correo = '$email'";


//Ejecución de la consulta y asignacion de valores a los $_session
if ($login->verificar($email, $conexion) != false) {
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
        $datos = $login->nombre($fila['id'], $conexion);
        $nombre = $datos[0];
        $telefono = $datos[1];
        $genero = $datos[2];
        $id_user = $fila['id'];
        if (password_verify($contraseña, $contrasena_almacenada)) {
            if ($fila['verificacion'] == '1') {
                $_SESSION['Email'] = $email;
                $_SESSION['nombre'] = $login->convertirFrase($nombre);
                $_SESSION['documento'] = trim($id_user);
                $_SESSION['rol'] = trim($rol);
                $_SESSION['estado'] = trim($estado);
                $_SESSION['telefono'] = trim($telefono);
                $_SESSION['genero'] = trim($genero);
                // Define la dirección de redirección antes de usarla

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
} else {
    echo "<script>
    window.location.href = '../index.php?error=0';
    </script>";
    exit();
}
cerrar_conexion($conexion); // Cierra la conexión