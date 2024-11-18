<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '..\vendor\phpmailer\phpmailer\src\Exception.php';
require '..\vendor\phpmailer\phpmailer\src\PHPMailer.php';
require '..\vendor\phpmailer\phpmailer\src\SMTP.php';

include('Conexion_bc.php');
$conexion = conexion();
if (isset($_POST['correo'])) {
    $incrip = base64_encode($_POST['correo']);
    $correo = $_POST['correo'];
    $consulta_email = "SELECT * FROM usuarios WHERE correo='$correo'";
    $Verificacion_email = mysqli_query($conexion, $consulta_email);

    if (mysqli_num_rows($Verificacion_email) > 0) {
        $phpmailer = new PHPMailer();
        // Configuración del servidor SMTP (asegúrate de configurar esto adecuadamente para tu entorno)
        $phpmailer = new PHPMailer();
        $phpmailer->isSMTP();
        $phpmailer->Host =  'smtp.gmail.com';//'sandbox.smtp.mailtrap.io';
        $phpmailer->SMTPAuth = true;
        // $phpmailer->Port = 2525;
        $phpmailer->Username = 'ialbertogutierrez@unicesar.edu.co';
        $phpmailer->Password = 'qchuvfykrdjdsnor';
        $phpmailer->setFrom('ialbertogutierrez@unicesar.edu.co', 'GYM - UPC');
        $phpmailer->addAddress($correo);
        $phpmailer->Subject = 'Recuperar Cuenta';
        $enlace = "http://gymupcaguachica.free.nf/paginas/index/NuevaContrasena.php?correo=" . urlencode($incrip);
$phpmailer->Body = "
    Recuperación de cuenta
    Hola
    Haz solicitado recuperar tu cuenta. Haz clic en el botón a continuación para crear una nueva contraseña:
    '$enlace' 
    Si no realizaste esta solicitud, puedes ignorar este mensaje.
    Saludos,<br>Equipo GYM-UPC";
        if ($phpmailer->send()) {
            echo "<script>
            location.href ='../paginas/index/Olvidecontraseña.php?respuesta=2';
        </script>";
            exit();
        } else {
            echo "<script>
                    location.href ='../paginas/index/Olvidecontraseña.php?respuesta=1';
                </script>";
            exit();
        }
    } else {
        // Si el correo no existe en la base de datos
        echo "<script>
           location.href ='../paginas/index/Olvidecontraseña.php?respuesta=0';
        </script>";
        exit();
    }
}
