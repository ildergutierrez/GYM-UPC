<?php
include 'Conexion_bc.php';

$nombre = $_POST['Nombre_completo'];
$email = $_POST['correo'];
$usuario = $_POST['usuario'];
$contra = $_POST['passwordu'];
$contrasena = hash('sha512', $contra);


$query = "INSERT INTO usuarios(Nombre_completo, correo,usuario,password) 
                VALUES ('$nombre','$email','$usuario','$contrasena')";

//verificación de correo y usuario
$consultae = "SELECT * FROM usuarios WHERE correo='$email'";
$consultau = "SELECT * FROM usuarios WHERE usuario='$usuario'";
$Verificacion_email = mysqli_query($conexion, $consultae);
$Verificacion_usuario = mysqli_query($conexion, $consultau);
//verificación correo
if (mysqli_num_rows($Verificacion_email) > 0) {
    echo '
    <script>
    alert("El E-mail ya se encuentra registrado");
    window.location ="../index.php";
    </script>
    ';
    exit();
}
//verificación usuario
if (mysqli_num_rows($Verificacion_usuario) > 0) {
    echo '
    <script>
    alert("El Usuario ya se encuentra registrado");
    window.location ="../index.php";
    </script>
    ';
    exit();
}

if (empty($nombre) or empty($email) or empty($usuario) or empty($contra)) {
    echo '<script>
    alert("Todos los campos deben estar llenos");
    window.location ="../index.php";
    </script>';
    exit();
}
// $ejecutar = mysqli_query($qconnection_aborted($connection), $query) or die(mysqli_error($connection));  forma directa, si nel include
$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar) {
    echo '<script>
    alert("Registro exitoso");
    window.location ="../index.php";
    </script>';
} else {
    echo '<script>
    alert("Registro no realizado exitoso");
    window.location ="../index.php";
    </script>';
}

mysqli_close($conexion);
