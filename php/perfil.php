<?php
session_start();
if (!isset($_POST['documento']) && !isset($_POST['rol'])) {

    header('Location: ../index.php');
    exit();
}
include('Conexion_bc.php');
$conexion = conexion(); // Guarda la conexión en una variable

$rol = $_POST['rol'];
$documento = $_POST['documento'];
$correo = $_POST['correo'];
$nombre = $_POST['nombre'];
$celular = $_POST['celular'];
$genero = $_POST['op'];
$sede = $_POST['sede'];
if ($sede === "Aguachica") {
    $sede = '1';
} else {
    $sede = '2';
}
$contrasena = $_POST['password'];


if (Validar_Datos() && Contrasena_actual($contrasena)) {

    if (Actualizar_Datos()) {
        $_SESSION['Email'] = $correo;
        $_SESSION['nombre'] = strtoupper($nombre);
        $_SESSION['documento'] = trim($documento);
        $_SESSION['telefono'] = trim($celular);
        $_SESSION['genero'] = trim($genero);

        header("Location: ../paginas/usuarios/Configuracion.php?respuesta=1");
        exit();
    }
    exit();
}
else{
    header("Location: ../paginas/usuarios/Configuracion.php?respuesta=0");
    exit();
}



// Funciones
// Funcion para validar los datos, si estan vacios o no
function Validar_Datos(): bool
{
    global $correo, $nombre, $celular, $genero, $sede, $contrasena, $documento, $rol;
    if (empty($correo) || empty($nombre) || empty($celular) || empty($genero) || empty($sede) || empty($contrasena) || empty($documento) || empty($rol)) {
        if ($rol === "3" && str_contains($correo, "@unicesar.edu.co") && $sede==="1") {
            return true;
        } else {
            return false;
        }
       if($rol !== "3"){
           return true;
       }
    }
    return false;
}

//funcion para validar la contraseña
function Contrasena_actual($contrasena): bool
{
    global $documento, $conexion;
    $qerry = "SELECT * FROM usuarios WHERE id = '$documento'";
    $busqueda = mysqli_query($conexion, $qerry);
    if ($busqueda && mysqli_num_rows($busqueda) > 0) {
        $fila = mysqli_fetch_assoc($busqueda);
        $contrasena_almacenada = $fila['contrasena'];
        if (password_verify($contrasena, $contrasena_almacenada)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}


// Funcion para actualizar los datos del usuario
function Actualizar_Datos()
{
    global $correo, $nombre, $celular, $genero, $sede, $contrasena, $documento, $rol, $conexion;
    $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
    $qerry_usuario = "UPDATE `usuarios` SET`correo`='$correo' WHERE id= '$documento'";
    $qerry_persona = "UPDATE `persona` SET `nombre completo`='$nombre',`celular`='$celular',`sexo`='$genero' WHERE documento = '$documento'";
    $actualizar = mysqli_query($conexion, $qerry_usuario);
    $actualizar_persona = mysqli_query($conexion, $qerry_persona);
    if ($actualizar && $actualizar_persona) {
        return true;
    } else {
        return false;
    }
}
