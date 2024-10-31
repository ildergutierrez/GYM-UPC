<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '..\vendor\phpmailer\phpmailer\src\Exception.php';
require '..\vendor\phpmailer\phpmailer\src\PHPMailer.php';
require '..\vendor\phpmailer\phpmailer\src\SMTP.php';

include('Conexion_bc.php');
$conexion = conexion();
if (isset($_GET['correo']) && isset($_GET['codigo'])) {
    $token = $_GET['codigo'];
    $incrip = $_GET['correo'];
    $correo = base64_decode($incrip);
    $consulta_email = "SELECT * FROM usuarios WHERE correo='$correo'";
    $Verificacion_email = mysqli_query($conexion, $consulta_email);


    if (mysqli_num_rows($Verificacion_email) > 0) {
        $phpmailer = new PHPMailer();
        // Configuración del servidor SMTP (asegúrate de configurar esto adecuadamente para tu entorno)
        $phpmailer = new PHPMailer();
        $phpmailer->isSMTP();
        $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 2525;
        $phpmailer->Username = 'b32ba521884b30';
        $phpmailer->Password = '438d448c90eb4b';
        $phpmailer->setFrom('Serviciogym@unicesar.edu.co', 'GYM - UPC');
        $phpmailer->addAddress($correo);
        $phpmailer->Subject = 'Activar Cuenta';
        $phpmailer->Body = "Bienvenido/a; Tu codigo de verificación es: $token o Haz clic en el siguiente enlace para activar tu contraseña: http://localhost/paginas/index/Verificacion_correo.php?id=$incrip&codidigo=$token  ";
        if ($phpmailer->send()) {
            echo "<script>
                    window.location ='../paginas/index/Verificacion_correo.php?correo=$incrip';
                </script>";
            exit();
        } else {
            echo "<script>
                    location.href ='../index.php?error=2';
                </script>";
            exit();
        }
    } else {
        // Si el correo no existe en la base de datos
        echo "<script>
            location.href = ='../index.php?error=2';
        </script>";
        exit();
    }
}
