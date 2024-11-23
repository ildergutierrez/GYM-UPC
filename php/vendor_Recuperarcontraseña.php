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
        $phpmailer->Body = " Hola Haz solicitado recuperar tu cuenta. Haz clic en el Enlace a continuación para crear una nueva contraseña:  '$enlace' Si no realizaste esta solicitud, puedes ignorar este mensaje.   Saludos, Equipo GYM-UPC";
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
