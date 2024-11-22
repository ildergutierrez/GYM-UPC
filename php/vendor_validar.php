<?php
require '../vendor/autoload.php'; // Usar la autocarga de Composer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function Envio_Token($conexion, $correo, $token,  $rol)
{
    $incrip = base64_encode($correo);
    $correo = base64_decode($incrip);
    $direccion = "http://gymupcaguachica.free.nf/php/Validar_usuario.php";
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
        $phpmailer->Body = "
        Hola 
        Bienvenido/a  a GYM - UPC   
        Tu código de verificación es:  
            $token  
        o haz clic en el siguiente enlace para activar tu cuenta:
        $direccion?correo=$incrip&codigo=$token 
        
        El Equipo GYM-UPC  te da la Bienvenida";
        // Enviar correo
        $phpmailer->send();
        // Redirigir
        return true;
    } catch (Exception $e) {
        // Manejar error al enviar el correo
        return false;
    }
}
