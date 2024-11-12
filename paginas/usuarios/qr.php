<?php
session_start();
if (!isset($_SESSION['documento']) || $_SESSION['rol'] != 3) {
    header('Location: ../../index.php');
}

//clases
include('../../php/Conexion_bc.php');
require_once('../../php/usuario/Actualizar_cupos.php');
include('../../php/Generar_qr.php');
include('../../php/seguimientos.php');
$conexion = conexion();

$documento = $_SESSION['documento'];

$nombre = $_SESSION['nombre'];
$segimiento = new seguimeintos($conexion, $documento);
//creacion de la cleses
$actualizar = new Actualizar_cupos($conexion);

$actualizar->Actualizar_cupos();
$qr = new Generar_qr();
$datos = array();
$datos = $qr->GenaraQR($documento, $conexion);
$cantidad = count($datos);

if ($cantidad > 0) {
    $documento = $datos[0];
    $hora = $datos[1];
    $hora_2 = strtotime($hora);
    $hora_2 = date("g:i a", $hora_2);
    $fecha = $datos[2];
    $lugar = $datos[3];
    $limite = $datos[4];
    $qr = "http://localhost/GYM-UPC/php/Leer_QR.php?documento=$documento&hora=$hora&fecha=$fecha&lugar=$lugar&limite=$limite";
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Genarador QR</title>

    <link
        href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet" />
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        rel="stylesheet" />
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,400,0,0" />
    <link rel="stylesheet" href="../../boostrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/qr.css" />
    <link rel="icon" href="../../img/logo/Logo.png" />
</head>
<body style="background: #1e1e1e">
    <div class="container-fluid" style="padding: 0;">
        <!-- Modal -->
        <div class="modal fade" id="miModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="background: #121A1C; color: #E5E5E5;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Advertencia</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>El sistema a detectado que ha faltado a su cita en el GYM-UPC. <br>Se procede a asignarle una falla, si se acomulan 3, no podra volver a sacar cita hasta que se levante la sanción. <br>Nota: si tiene excusa justificable debe dirigirse al administrador</p>
                    </div>
                    <?php
                    if($lugar === "0"){
                        $segimiento = new seguimeintos($conexion, $documento);
                    }
                    ?>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" style="background: #0b7f46;" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <?php cerrar_conexion($conexion); ?>
        <!-- fin modal -->
        <header>
            <nav class="navbar navbar-expand-lg" style="padding-top: 30px; padding-bottom: 0px; background: #0b7f46; border-top: solid 4px #ffcc53;">
                <div class="container-fluid" style="color: white">
                    <a class="navbar-brand" href="#"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" onclick="logo()">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav justify-content-end ms-auto mt-3 mb-2 mb-lg-0" style="width: 70% ;">
                            <li class="nav-item">
                                <a class="nav-link active" href="../view/bienvenida.php" style=" color: #ffffff; padding-right: 30px; font-weight: bold;"><span class="material-icons" style="vertical-align: middle">home</span>INICIO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="apartar_cupos.php" style="color: #ffffff; padding-right: 30px; font-weight: bold; "><span class="material-icons" style="vertical-align: middle">calendar_month</span> APARTAR CUPO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" style="color: #ffffff; padding-right: 30px; font-weight: bold; border-bottom: solid 4px #ffcc53;"><span class="material-icons" style="vertical-align: middle">qr_code</span> QR</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="imc.php" style="color: #ffffff; padding-right: 30px; font-weight: bold"><span class="material-symbols-outlined" style="vertical-align: middle">cardiology</span>
                                    IMC</a>
                            </li>
                        </ul>
                        <form
                            class="d-flex justify-content-center align-items-center">
                            <div class="container d-flex justify-content-center align-items-center" style=" width: 100%;  background: #ffcc53;                  font-weight: bold;                  border-radius: 10px;                  margin-bottom: 3px;                ">
                                <div
                                    class="container d-flex justify-content-center align-items-center"
                                    style="padding: 0; width: 100%">
                                    <div class="d-flex justify-content-center align-items-center" style=" margin-top: 10px; color: #000000; font-size: 12px; width: 100%; ">
                                        <p> <?php echo $nombre ?></p> &ensp;
                                    </div>
                                    <div class="dropdown" style="color: #000000">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                                        <ul class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="navbarDropdown">
                                            <li>
                                                <a class="dropdown-item" href="Configuracion.php"> <span class="material-symbols-outlined" style="vertical-align: middle;"> person_outline </span> &ensp; Perfil</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="../../php/index/cerrar_sesion.php"> <span class="material-symbols-outlined" style="vertical-align: middle;"> logout </span> &ensp;
                                                    Cerrar Sesión</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </nav>
        </header>
        <main>
            <!-- Logo -->
            <div class="container">
                <div class="d-flex" style="z-index: 1000; position: fixed; top: 5px; margin-top: 0; padding: 0; left: 10px;  width: 25%;   ">
                    <img id="logo" style=" display: block;" src="../../img/logo/Logo.png" alt="Logo" width="50%" title="Logo" />
                </div>
                <div class="d-flex" style="z-index: 1000; position: fixed; top: 25px; left: 40px; width: 20%; ">
                    <img id="logo_2" src="../../img/logo/Logo.png" alt="Logo" style="width: 15%; display: none" title="Logo" />
                </div>
            </div>
            <!-- Fin posicion del logo -->
            <!-- Linea de nombre -->
            <div class="container" style="margin-top: 80px; ">
                <div id="nombre" class="d-flex Bienvenida" style="display: block;">
                    <p>
                    <h1 id="x2">Generador QR</h1>
                    </p>
                </div>
                <!-- Fin de linea de nombre -->
                <br>
            </div>
            <?php if ($cantidad > 0 && $lugar !== "0") { ?>
                <!-- Generador QR -->
                <div class="container" style="margin-top: 80px;">
                    <div class="row" style="padding-left:0; padding-right: 0; position: static; width: 40%; margin: 0 auto;border-radius: 10px;  border-bottom: solid 5px #0b7f46; text-align: center; background: #ffffff;">
                        <div class="col">
                            <h6 style="padding-top: 10px; color: #000000; font-weight: bold;"><span class="material-symbols-outlined" style="vertical-align: middle; color: #0b7f46;">
                                    schedule
                                </span> PROXIMA SECCIÓN </h6>
                        </div>
                        <div class="col">
                            <h6 style="padding: 10px; color: #0b7f46; font-weight: bold;   "><?php echo $hora_2; ?> </h6>
                        </div>
                    </div>
                    <br>
                    <div class="d-flex justify-content-center align-items-center">
                        <input type="hidden" id="input-link" value="<?php echo $qr ?>">
                        <div id="qr-container">
                            <canvas id="qrcode" style="border:solid 2px #1e1e1e; border-radius: 5px;"></canvas>
                        </div>
                    </div>
                </div> <!-- Fin Generador QR -->
            <?php } else { ?>
                <div class="container" style="margin-top: 80px;">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">¡No tienes cupos apartados!</h4>
                            <p>Para poder generar tu código QR, primero debes apartar un cupo.</p>
                            <hr>
                            <p class="mb-0">Dirígete a la sección de apartar cupos y realiza el proceso.</p>
                        </div>
                    <?php } ?>
                    <br><br><br><br>
        </main>
        <footer>
            <div class="container-fluid" style=" margin-bottom: 0; width: 100%;  background-color: #0b7f46;  padding-top: 25px;  padding-bottom: 25px;  border-top: solid 4px #ffcc53;  bottom: 0; ">
                <div class="row">
                    <div class="col-8" style="color: #ffffff; text-align: end">
                        <h6>
                            © copyright: <a href="../view/valores.php" style="text-decoration: none; color: #ffffff;">Universidad Popular del Cesar, seccional Aguachica</a>
                        </h6>
                    </div>
                    <div class="col-4 d-flex justify-content-end">
                        <div class="social-icons">
                            <!-- Facebook -->
                            <a
                                href="https://www.facebook.com/seccionalupcaguachica"
                                target="_blank"
                                style="color: #ffffff; margin-right: 16px; text-decoration: none;">
                                <i class="fab fa-facebook-f"></i>
                            </a>

                            <!-- Pagina web -->
                            <a
                                href="https://aguachica.unicesar.edu.co/"
                                target="_blank"
                                style="color: #ffffff; margin-right: 16px; text-decoration: none;">
                                <span class="material-symbols-outlined" style="vertical-align: middle;">
                                    language
                                </span>
                            </a>

                            <!-- Instagram -->
                            <a
                                href="https://www.instagram.com/upcseccionalaguachica/"
                                target="_blank"
                                style="color: #ffffff; margin-right: 16px; text-decoration: none;">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

         <!-- Activa el modal de advectencia -->
          <?php if(count($datos) > 0){ 
            if ($lugar==="0") { ?>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var modal = new bootstrap.Modal(document.getElementById('miModal'));
                    modal.show();
                });
            </script>
        <?php } }?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="../../js/Bienvenida.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
        <script src="../../js/usuarios/Generar_Qr.js"></script>


    </div>
</body>

</html>