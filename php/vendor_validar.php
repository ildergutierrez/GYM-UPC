<?php
require '../vendor/autoload.php'; // Usar la autocarga de Composer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function Envio_Token( $correo, $token,  $nombre)
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
        $phpmailer->isHTML(true); // Habilitar HTML
        $phpmailer->Body = "
            <div style='font-family: Arial, sans-serif; background: #1e1e1e; color: #ffffff; line-height: 1.6; max-width: 600px; margin: auto; border: solid 2px #333; border-radius: 12px;  padding: 15px;'>
            <h1 style='color: #4CAF50; text-align: center;'>¡Bienvenido/a a GYM - UPC!</h1>
            <p>Hola, $nombre</p>
            <p>Estamos muy emocionados de tenerte con nosotros.</p>
            <p>Solo falta un paso, para activar tu cuenta, necesitamos verificar tu dirección de correo electrónico.</p>
            <p>Tu código de verificación es:</p>
            <h2 style='font-size: 24px; font-weight: bold; text-align: center; color: #4CAF50;'>$token</h2>
            <p>O puedes activar tu cuenta haciendo clic en el botón a continuación:</p>
            <p style='text-align: center; margin-top: 20px;'>
            <a href='$direccion?correo=$incrip&codigo=$token' style='box-shadow: 10px 10px 20px 0px #ffcc53; background-color: #0b7f46; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-size: 16px;'>Activar Mi Cuenta</a>
            </p>
            <br>
            <p>Si tienes alguna duda, no dudes en contactarnos. Estamos aquí para ayudarte.</p>
            <p style='text-align: center; margin-top: 20px;'>
                <img src='https://gymupcaguachica.free.nf/img/logo/Logo.png' alt='GYM - UPC' style='width: 150px; height: auto;'>
            </p>
            <p style='text-align: center; font-size: 14px; color: #777;'>Gracias por unirte a nuestra comunidad. ¡Esperamos verte pronto en el gimnasio!</p>
            <br>
            <p style='text-align: center; margin-top: 20px; font-size: 12px; color: #aaa;'>
                Este correo es generado automáticamente. Por favor, no respondas a este mensaje.
            </p>
            <br>
        </div>";
            $phpmailer->AltBody = "
            Hola, Bienvenido/a  a GYM - UPC Tu código de verificación es:  
                $token  
            o haz clic en el siguiente enlace para activar tu cuenta:
            $direccion?correo=$incrip&codigo=$token 
            
            El Equipo GYM-UPC  te da la Bienvenida";
        // Enviar correo
        $phpmailer->send();
        // Redirigir
        // echo "correo enviado";
        return true;
    } catch (Exception $e) {
        // Manejar error al enviar el correo
        // echo "Error al enviar el correo: {$phpmailer->ErrorInfo}";
        return false;
    }
}
