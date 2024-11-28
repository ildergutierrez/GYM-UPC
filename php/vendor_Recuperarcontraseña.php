<?php
require '../vendor/autoload.php'; // Usar la autocarga de Composer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include('Conexion_bc.php');
// echo "<pre> dd</pre>";

$conexion = conexion();
if (isset($_POST['correo'])) {

    $incrip = base64_encode($_POST['correo']);
    $correo = $_POST['correo'];
    $consulta_email = "SELECT * FROM `usuarios` WHERE correo='$correo'";
    $Verificacion_email = mysqli_query($conexion, $consulta_email);
    // echo "Email". $consulta_email;
    if ($Verificacion_email && mysqli_num_rows($Verificacion_email) > 0) {
        // Configuración del servidor SMTP (asegúrate de configurar esto adecuadamente para tu entorno)
        $enlace = "https://gymupcaguachica.free.nf/paginas/index/NuevaContrasena.php?correo=$incrip";
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
        $phpmailer->Subject = 'Recuperar Cuenta';
        $phpmailer->isHTML(true); // Habilitar HTML
    
        $phpmailer->Body = "
       <div style='font-family: Arial, sans-serif; background: #1e1e1e; color: #ffffff; line-height: 1.6; 
       max-width: 600px; margin: auto; border: solid 2px #333; border-radius: 12px;  padding: 15px;'>
        <h1 style='color: #4CAF50; text-align: center;'>Recuperación de Cuenta</h1>
        <p>Hola,</p>
        <p>Haz solicitado recuperar tu cuenta. Por favor, haz clic en el boton a continuación para crear una nueva contraseña:</p>
        <br>
        <p style='text-align: center;'>
            <button style='border-radius: 8px; box-shadow: 10px 10px 20px 0px #ffcc53 ; background-color: #0b7f46; color: white; 
            padding: 10px 20px;'><a href='$enlace' style='background-color: #0b7f46; color: white; padding: 10px 20px; text-decoration: none;
             border-radius: 5px;'>Crear Nueva Contraseña</a></button>
        </p>
        <br>
        <p>Si no realizaste esta solicitud, puedes ignorar este mensaje.</p>
        <p style='text-align: center; margin-top: 20px;'>
            <img src='https://gymupcaguachica.free.nf/img/logo/Logo.png' alt='GYM - UPC' style='width: 150px; height: auto;'>
        </p>
        
        <p>Saludos,<br>Equipo GYM - UPC</p><br>
        <p style='text-align: center; margin-top: 20px; font-size: 12px; color: #aaa;'>
            Este correo es generado automáticamente. Por favor, no respondas a este mensaje.
        </p>
        <br>
    </div>
        ";
    
        // Alternativa para clientes que no soporten HTML
        $phpmailer->AltBody = "Hola, Haz solicitado recuperar tu cuenta. Haz clic en el enlace para crear una nueva 
        contraseña: $enlace. Si no realizaste esta solicitud, puedes ignorar este mensaje. Saludos, Equipo GYM-UPC";       
        if ($phpmailer->send()) { 
            // die("El mensaje ha sido enviado");
            echo "<script>
                    location.href ='../paginas/index/Olvidecontraseña.php?respuesta=2';
                    </script>";                                   
        } else { 
            //  die("El mensaje no ha sido enviado");
            echo "<script>
                    location.href ='../paginas/index/Olvidecontraseña.php?respuesta=1';
                </script>";
        }
    } else { 
        // die("El mensaje ha sido enviado");
        // Si el correo no existe en la base de datos
        echo "<script>
            location.href ='../paginas/index/Olvidecontraseña.php?respuesta=0';
        </script>";
        exit();
    }
}
