<?php
require '../vendor/autoload.php'; // Usar la autocarga de Composer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include('Conexion_bc.php');
$conexion = conexion();
if (isset($_GET['correo']) && isset($_GET['codigo'])) {
    $token = $_GET['codigo'];
    $incrip = $_GET['correo'];
    $rol = $_SESSION['r'];
    if ($rol == '3') {
        $error = "../index.php?error=2";
        $responder= "../paginas/index/Verificacion_correo.php?correo=$incrip";
    } else {
        $responder="../paginas/Administrador/registrar.php?mensaje=1";
        $error = "../paginas/Administrador/registrar.php?mensaje=0";
    }    
    $correo = base64_decode($incrip);
    $consulta_email = "SELECT * FROM usuarios WHERE correo='$correo'";
    $Verificacion_email = mysqli_query($conexion, $consulta_email);
    $direccion = "http://gymupcaguachica.free.nf/php/Validar_usuario.php?";

    if (mysqli_num_rows($Verificacion_email) > 0) {
        try {
            $phpmailer = new PHPMailer(true); // Usar `true` para habilitar excepciones

            // Configuración SMTP
            $phpmailer->isSMTP();
            $phpmailer->Host = 'smtp.gmail.com';
            $phpmailer->SMTPAuth = true;
            $phpmailer->Port = 587; // Asegúrate de usar el puerto correcto
            $phpmailer->SMTPSecure = 'tls'; // O 'ssl' si el servidor lo requiere
            $phpmailer->Username = 'ialbertogutierrez@unicesar.edu.co';
            $phpmailer->Password = 'qchuvfykrdjdsnor';

            // Configuración del correo
            $phpmailer->setFrom('ialbertogutierrez@unicesar.edu.co', 'GYM - UPC');
            $phpmailer->addAddress($correo);
            $phpmailer->Subject = 'Activar Cuenta';
            $phpmailer->Body = "Bienvenido/a; Tu código de verificación es: $token o haz clic en el siguiente enlace para activar tu cuenta: $direccion.correo=$incrip&codigo=$token";
            // Enviar correo
            $phpmailer->send();
                echo "<script>window.location ='$responder';</script>";
            
        } catch (Exception $e) {
            // Manejar error al enviar el correo
            echo "Error al enviar correo: {$phpmailer->ErrorInfo}";
        }
    } else {
        echo "<script>location.href ='$error';</script>";
    }
}
?>
