<?php
session_start();
date_default_timezone_set('America/Bogota'); //configuración de zona horaria a colombia
if (!isset($_SESSION['Email']) && !isset($_SESSION['nombre']) && !isset($_SESSION['rol'])) {
    
        header("location: ../view/bienvenida.php");
    
}
$nombre = $_SESSION['nombre'];
$rol = $_SESSION['rol'];
    if ($rol !== "2") {
        header("location: ../view/bienvenida.php");
    }
//clases
include('../../php/Conexion_bc.php');
require_once('../../php/usuario/Actualizar_cupos.php');
$conexion = conexion();
//creacion de la cleses
$actualizar = new Actualizar_cupos($conexion);
$actualizar->Actualizar_cupos();
cerrar_conexion($conexion)
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lector QR</title>
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
    <link rel="stylesheet" href="../../css/leerqr.css" />
    <link rel="icon" href="../../img/logo/Logo.png" />
    <script src="../../js/instructor/qrCode.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body style="background: #1e1e1e">
    <!-- Modal -->
    <div class="modal fade" id="miModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background: #121A1C; color: #E5E5E5;">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Verificación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Los Datos son correctos.</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" style="background: #0b7f46;" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- fin modal -->
    <!-- Modal de informacion -->
    <div class="modal fade" id="razon" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background: #121A1C; color: #E5E5E5;">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Informacion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] == "2") { ?>
                        <?php
                        $hora = $_GET['hora'];
                        $hora = date("H:i a", strtotime($hora));
                        $hora_limite = $_GET['limite'];
                        $hora_limite = date("H:i a", strtotime($hora_limite));
                        $lugar =  $_GET['lugar'];
                        if ($lugar === "137") {
                            $lugar = "Cardio";
                        } else {
                            $lugar = "Peso";
                        }
                        ?>
                        <h5>Falta en la asistencia del Afiliado.</h5>
                        <p>Fecha: <?php echo $_GET['fecha']; ?></p>
                        <p>Hora: <?php echo $hora; ?></p>
                        <p>Sede: <?php echo $lugar ?></p>
                        <p>Limite: <?php echo $hora_limite; ?></p>
                        <p>Hora Actual: <?php echo date("h:m a"); ?></p>

                    <?php } ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" style="background: #0b7f46;" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- fin modal de informacion -->
    <!-- Modal de informacion -->
    <div class="modal fade" id="error" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background: #121A1C; color: #E5E5E5;">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Error</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Upss, No se encontro dentro de la base de datos.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" style="background: #0b7f46;" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- fin modal de informacion -->
    <div class="container-fluid" style="padding: 0;">
        <header>
            <nav class="navbar navbar-expand-lg" style="padding-top: 30px; padding-bottom: 0px; background: #0b7f46; border-top: solid 4px #ffcc53;">
                <div class="container-fluid" style="color: white">
                    <a class="navbar-brand" href="#"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" onclick="logo()">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav justify-content-end ms-auto mt-3 mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" href="../view/bienvenida.php" style=" color: #ffffff; padding-right: 30px; font-weight: bold; "><span class="material-icons" style="vertical-align: middle">home</span>INICIO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="listar.php" style="color: #ffffff; padding-right: 30px; font-weight: bold; "><span class="material-icons" style="vertical-align: middle">recent_actors</span> Listar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" style="color: #ffffff; padding-right: 30px; font-weight: bold;  border-bottom: solid 4px #ffcc53;"><span class="material-icons" style="vertical-align: middle">qr_code_scanner</span>Leer QR</a>
                            </li>
                        </ul>
                        <form
                            class="d-flex justify-content-center align-items-center" >
                            <div class="container d-flex justify-content-center align-items-center" style=" width: 100%;  background: #ffcc53; font-weight: bold; border-radius: 10px; margin-bottom: 3px;  ">
                                <div
                                    class="container d-flex justify-content-center align-items-center"
                                    style="padding: 0; width: 100%">
                                    <div class="d-flex justify-content-center align-items-center" style=" margin-top: 10px; color: #000000; font-size: 12px; width: 95%; ">
                                        <p><?php echo $nombre ?></p> &ensp;
                                    </div>
                                    <div class="dropdown" style="color: #000000">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                                        <ul class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="navbarDropdown">
                                            <li>
                                                <a class="dropdown-item" href="perfil.php"> <span class="material-symbols-outlined" style="vertical-align: middle;"> person_outline </span> &ensp; Perfil</a>
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
                    <h1 id="x2">Lector QR</h1>
                    </p>
                </div>
                <!-- Fin de linea de nombre -->
                <br>
            </div>
            <!-- Leer QR -->
            <div class="container" style="margin-top: 80px;">
                <div class="row justify-content-center mt-5">
                    <div class="col-sm-4 shadow p-3">

                        <div class="row text-center">
                            <a id="btn-scan-qr" href="#">
                                <img src="https://dab1nmslvvntp.cloudfront.net/wp-content/uploads/2017/07/1499401426qr_icon.svg" class="img-fluid text-center" width="175">
                            </a>
                            <canvas hidden="" id="qr-canvas" class="img-fluid"></canvas>
                        </div>
                        <div class="row mx-5 my-3">
                            <button class="btn btn-success btn-sm rounded-3 mb-2" id="btn_encendido" style="display: block;" onclick=" encenderCamara()">Encender cámara</button>
                            <a class="btn btn-danger btn-sm rounded-3" id="btn_apagado" style="display: none;" onclick="cerrarCamara()">Detener cámara</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin lector QR -->

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
        <!-- Activa el modal de confirmacion -->
        <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] == "1") { ?>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var modal = new bootstrap.Modal(document.getElementById('miModal'));
                    modal.show();
                });
            </script>
        <?php } ?>

        <!-- Activa el modal de no confirmación -->
        <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] == "2") { ?>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var modal = new bootstrap.Modal(document.getElementById('razon'));
                    modal.show();
                });
            </script>
        <?php } ?>

        <!-- Activa el modal de no esta registrado -->
        <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] == "3") { ?>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var modal = new bootstrap.Modal(document.getElementById('error'));
                    modal.show();
                });
            </script>
        <?php } ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="../../js/Bienvenida.js"></script>
        <audio id="audioScaner" src="../../sonido/sonido.mp3"></audio>
        <script src="../../js/instructor/LeerQR.js"></script>

    </div>
</body>

</html>