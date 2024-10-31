<?php
include 'Conexion_bc.php';
$conexion = conexion();
$documento = $_POST['documento'];
$nombre_completo = strtolower($_POST['nombre']);
$correo = strtolower($_POST['correo']);
$celular = $_POST['celular'];
$genero = $_POST['op'];
$contrasena = $_POST['password'];
$sede = $_POST['sede'];
$rol = $_POST['rol'];
$fecha = date("Y-m-d-");
$dominio_especifico = "unicesar.edu.co";
$codigo =  Token();
$contrasena = Codificar($contrasena);


function Validar_datos()
{
    //Valida que los datos esten llenos
    global $documento, $nombre_completo, $correo, $celular, $genero, $contrasena, $sede, $rol;
    if (empty($documento) || empty($nombre_completo) || empty($correo) || empty($celular) || empty($genero) || empty($contrasena) || empty($sede) || empty($rol)) {
        if ($sede === '1') {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function Consulta($email, $conexion)
{
    //verificación de correo y usuario
    $consulta_email = "SELECT * FROM usuarios WHERE correo='$email'";
    $Verificacion_email = mysqli_query($conexion, $consulta_email);
    //verificación correo
    if (mysqli_num_rows($Verificacion_email) > 0) {
        return false;
    } else {
        return true;
    }
}

function Registar()
{
    global $documento, $nombre_completo, $correo, $celular, $genero, $contrasena, $sede, $rol, $codigo, $fecha, $conexion;
    $query_usuarios = "INSERT INTO `usuarios`(`id`, `correo`, `contrasena`, `rol`, `estado`, `verificacion`) VALUES ('$documento','$correo','$contrasena','$rol','1','$codigo')";
    $query_personas = "INSERT INTO `persona`(`documento`, `nombre completo`, `celular`, `sexo`, `fecha de ingreso`) VALUES ('$documento','$nombre_completo','$celular','$genero','$fecha')";
    $ejecutar_persona = mysqli_query($conexion, $query_personas);
    $ejecutar_usuarios = mysqli_query($conexion, $query_usuarios);

    if ($ejecutar_persona && $ejecutar_usuarios) {
        $email = base64_encode($correo);
        echo "<script>
        window.location ='vendor_validar.php?correo=$email&codigo=$codigo';
        </script>";
    } else {
        echo '<script>
        window.location ="../index.php?error=1";
        </script>';
    }
    cerrar_conexion($conexion);
}

function Token()
{
    return rand(10000000, 99999999);
}

function Codificar($elemento)
{
    return password_hash($elemento, PASSWORD_DEFAULT);
}

if (Validar_datos() && Consulta($correo, $conexion)) {
    if ($rol === "3") {
        if (strpos($correo, "@" . $dominio_especifico) !== false) {
            Registar();
        }
    } else {
        Registar();
    }
} else {
    echo '<script>
        window.location ="../index.php?error=1";
        </script>';
}
