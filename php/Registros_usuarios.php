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

//valida los datos
if (Validar_datos() && Consulta($correo, $conexion) && Contrasena_guardar($contrasena)) {
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


//funciones
//valida que los datos esten llenos
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
//verifica que el correo sea de la universidad
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
//registra los datos
function Registar()
{
    global $documento, $nombre_completo, $correo, $celular, $genero, $contrasena, $sede, $rol, $codigo, $fecha, $conexion;

//registra los datos en las diferentes tablas de la base de datos
    $query_verificar="INSERT INTO `verificaciones`(`id`, `correo`, `token`) VALUES ('$documento','$correo','$codigo')";
    $query_usuarios = "INSERT INTO `usuarios`(`id`, `correo`, `contrasena`, `rol`, `estado`, `verificacion`) VALUES ('$documento','$correo','$contrasena','$rol','1','0')";
    $query_personas = "INSERT INTO `persona`(`documento`, `nombre completo`, `celular`, `sexo`, `fecha de ingreso`) VALUES ('$documento','$nombre_completo','$celular','$genero','$fecha')";

   //ejecuta las consultas
    $ejecutar_vrificacion = mysqli_query($conexion, $query_verificar);
    $ejecutar_persona = mysqli_query($conexion, $query_personas);
    $ejecutar_usuarios = mysqli_query($conexion, $query_usuarios);


    if ($ejecutar_persona && $ejecutar_usuarios && $ejecutar_vrificacion) {
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
//genera un token de 8 digitos
function Token()
{
    return rand(10000000, 99999999);
}
//codifica la contraseña
function Codificar($elemento)
{
    return password_hash($elemento, PASSWORD_DEFAULT);
}

//verifica la contraseña
function Contrasena_guardar($contrasena) {
    global $caracteresEspeciales;
    if (strlen($contrasena) >= 8) {
        if (preg_match('/[A-Z]/', $contrasena) && preg_match('/[a-z]/', $contrasena) &&  preg_match('/[0-9]/', $contrasena)
                   && preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $contrasena)) {
                        return true;
                    } else {
                        return false;
                    }
    } else {
        return false;
    }
               
}