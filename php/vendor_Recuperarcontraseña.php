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
        $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 2525;
        $phpmailer->Username = 'b32ba521884b30';
        $phpmailer->Password = '438d448c90eb4b';
        $phpmailer->setFrom('Recuperacontrasenagym@unicesar.edu.co', 'GYM - UPC');
        $phpmailer->addAddress($correo);
        $phpmailer->Subject = 'Recuperar Cuenta';
        $phpmailer->Body = "Haz solicitado recuperar tu cuenta, da click en el siguiente enlace para recuperar tu cuenta: http://localhost/GYM-UPC/paginas/index/NuevaContrasena.php?correo=$incrip";
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
