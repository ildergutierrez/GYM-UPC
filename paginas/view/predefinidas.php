<?php
session_start();
if (isset($_SESSION['Email']) && isset($_SESSION['nombre']) && isset($_SESSION['rol'])) {
    $nombre = $_SESSION['nombre'];
    $rol =  $_SESSION['rol'];
    $documento = $_SESSION['documento'];
    include '../../php/destruir_sesion.php';
    verificar_inactividad($rol);
    include('../../php/Conexion_bc.php');
    include('../../php/seguimientos.php');
    $conexion = conexion();
    $segimiento = new seguimeintos($conexion, $documento);
    cerrar_conexion($conexion);
} else {
    header('Location: ../../index.php');
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Plan Habitos</title>
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
    <link rel="stylesheet" href="../../css/rutinas.css" />
    <link rel="icon" href="../../img/logo/Logo.png" />
</head>

<body style="background: #1e1e1e">
    <div class="container-fluid" style="padding: 0;">
        <header>
            <?php if ($rol == 3) { ?>
                <nav class="navbar navbar-expand-lg" style="padding-top: 30px; padding-bottom: 0px; background: #0b7f46; border-top: solid 4px #ffcc53;">
                    <div class="container-fluid" style="color: white">
                        <a class="navbar-brand" href="#"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" onclick="logo()">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav justify-content-end ms-auto mt-3 mb-2 mb-lg-0" style="width: 70% ;">
                                <li class="nav-item">
                                    <a class="nav-link active" href="bienvenida.php" style=" color: #ffffff; padding-right: 30px; font-weight: bold; font-size: 14px; border-bottom: solid 4px #ffcc53;"><span class="material-icons" style="vertical-align: middle">home</span>
                                        INICIO</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../usuarios/apartar_cupos.php" style="color: #ffffff; padding-right: 30px; font-weight: bold;  "><span class="material-icons" style="vertical-align: middle">calendar_month</span> APARTAR CUPO</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../usuarios/qr.php" style="color: #ffffff; padding-right: 30px; font-weight: bold"><span class="material-icons" style="vertical-align: middle">qr_code</span> QR</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../usuarios/imc.php" style="color: #ffffff; padding-right: 30px; font-weight: bold"><span class="material-symbols-outlined" style="vertical-align: middle">cardiology</span>
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
                                            <p><?php echo $nombre ?></p>&ensp;
                                        </div>
                                        <div class="dropdown" style="color: #000000">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                                            <ul class="dropdown-menu dropdown-menu-end"
                                                aria-labelledby="navbarDropdown">
                                                <li>
                                                    <a class="dropdown-item" href="../usuarios/Configuracion.php"> <span class="material-symbols-outlined" style="vertical-align: middle;"> person_outline </span> &ensp; Perfil</a>
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
            <?php } ?>
            <?php if ($rol == 2) { ?>
                <nav class="navbar navbar-expand-lg" style="padding-top: 30px; padding-bottom: 0px; background: #0b7f46; border-top: solid 4px #ffcc53;">
                    <div class="container-fluid" style="color: white">
                        <a class="navbar-brand" href="#"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" onclick="logo()">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav justify-content-end ms-auto mt-3 mb-2 mb-lg-0" style="width: 70% ;">
                                <li class="nav-item">
                                    <a class="nav-link active" href="bienvenida.php" style=" color: #ffffff; padding-right: 30px; font-weight: bold; font-size: 14px; border-bottom: solid 4px #ffcc53;"><span class="material-icons" style="vertical-align: middle">home</span>
                                        INICIO</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../instructor/listar.php" style="color: #ffffff; padding-right: 30px; font-weight: bold;  "><span class="material-symbols-outlined" style="vertical-align: middle; border: solid 1px #ffffff;"> user_attributes </span> Listar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../instructor/leer_qr.php" style="color: #ffffff; padding-right: 30px; font-weight: bold"><span class="material-icons" style="vertical-align: middle">qr_code</span>Leer QR</a>
                                </li>
                            </ul>
                            <form
                                class="d-flex justify-content-center align-items-center">
                                <div class="container d-flex justify-content-center align-items-center" style=" width: 100%;  background: #ffcc53;                  font-weight: bold;                  border-radius: 10px;                  margin-bottom: 3px;                ">
                                    <div
                                        class="container d-flex justify-content-center align-items-center"
                                        style="padding: 0; width: 100%">
                                        <div class="d-flex justify-content-center align-items-center" style=" margin-top: 10px; color: #000000; font-size: 12px; width: 100%; ">
                                            <p><?php echo $nombre ?></p> &ensp;
                                        </div>
                                        <div class="dropdown" style="color: #000000">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                                            <ul class="dropdown-menu dropdown-menu-end"
                                                aria-labelledby="navbarDropdown">
                                                <li>
                                                    <a class="dropdown-item" href="../instructor/perfil.php"> <span class="material-symbols-outlined" style="vertical-align: middle;"> person_outline </span> &ensp; Perfil</a>
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
            <?php } ?>
            <?php if ($rol == 1) { ?>
                <nav class="navbar navbar-expand-lg" style="padding-top: 30px; padding-bottom: 0px; background: #0b7f46; border-top: solid 4px #ffcc53;">
                    <div class="container-fluid" style="color: white">
                        <a class="navbar-brand" href="#"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" onclick="logo()">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav justify-content-end ms-auto mt-3 mb-2 mb-lg-0" style="width: 70% ;">
                                <li class="nav-item">
                                    <a class="nav-link active" href="bienvenida.php" style=" color: #ffffff; padding-right: 30px; font-weight: bold; font-size: 14px; border-bottom: solid 4px #ffcc53;"><span class="material-icons" style="vertical-align: middle">home</span>
                                        INICIO</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../Administrador/enlistar.php" style="color: #ffffff; padding-right: 30px; font-weight: bold;  "><span class="material-symbols-outlined" style="vertical-align: middle; border: solid 1px #ffffff;"> user_attributes </span> Listar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../Administrador/registrar.php" style="color: #ffffff; padding-right: 30px; font-weight: bold"><span class="material-symbols-outlined" style="vertical-align: middle;"> person_add </span>Registra</a>
                                </li>
                            </ul>
                            <form
                                class="d-flex justify-content-center align-items-center">
                                <div class="container d-flex justify-content-center align-items-center" style=" width: 100%;  background: #ffcc53;                  font-weight: bold;                  border-radius: 10px;                  margin-bottom: 3px;                ">
                                    <div
                                        class="container d-flex justify-content-center align-items-center"
                                        style="padding: 0; width: 100%">
                                        <div class="d-flex justify-content-center align-items-center" style=" margin-top: 10px; color: #000000; font-size: 12px; width: 100%; ">
                                            <p><?php echo $nombre ?></p> &ensp;
                                        </div>
                                        <div class="dropdown" style="color: #000000">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                                            <ul class="dropdown-menu dropdown-menu-end"
                                                aria-labelledby="navbarDropdown">
                                                <li>
                                                    <a class="dropdown-item" href="../Administrador/perfil.php"> <span class="material-symbols-outlined" style="vertical-align: middle;"> person_outline </span> &ensp; Perfil</a>
                                                </li>
                                                <li>

                                                <li class="nav-item dropdown">
                                                    <a class="dropdown-item cabeza_cel" href="#"> <span class="material-symbols-outlined" style="vertical-align: middle;"> reduce_capacity </span> &ensp;
                                                        Capacidad</a>
                                                    <ul class="dropdown-menu cel" aria-labelledby="navbarDropdownMenuLink">
                                                        <li><a class="dropdown-item" href="../Administrador/capacidad.php"> <span class="material-symbols-outlined" style="vertical-align:middle;">scatter_plot</span> &ensp; Cupos GYM</a></li>
                                                        <li><a class="dropdown-item" href="../Administrador/asignar_instructor.php"> <span class="material-symbols-outlined" style="vertical-align: middle;"> personal_places </span> &ensp; Asig Instructor</a></li>
                                                    </ul>
                                                </li>

                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="../Administrador/actividades.php"> <span class="material-symbols-outlined" style="vertical-align: middle;"> local_activity </span> &ensp;
                                                        Actividad</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="../Administrador/activar_afiliados.php"> <span class="material-symbols-outlined" style="vertical-align: middle;"> patient_list </span> &ensp;
                                                        Estado Afiliado</a>
                                                </li>
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
            <?php } ?>
        </header>
        <main>
            <!-- Logo -->
            <div class="container">
                <div class="d-flex" style="z-index: 1000; position: fixed; top: 5px; margin-top: 0; padding: 0; left: 10px;  width: 25%;   ">
                    <img id="logo" style=" display: block;" src="../../img/logo/Logo.png" alt="Logo" width="150px" title="Logo" />
                </div>
                <div class="d-flex" style="z-index: 1000; position: fixed; top: 25px; left: 0px; width: 30%;">
                    <img id="logo_2" src="../../img/logo/Logo.png" alt="Logo" style="left: auto; width: 100%; display: none" title="Logo" />
                </div>
            </div>
            <!-- Fin posicion del logo -->
            <!-- Linea de nombre -->
            <div class="container" style="margin-top: 80px; ">
                <div id="nombre" class="d-flex Bienvenida" style="display: block;">
                    <p>
                    <h1 id="x2">PREDEFINIDAS</h1>
                    </p>
                </div>
                <!-- Fin de linea de nombre -->
                <br>
            </div>
            <br><br>
            <div class="container main">
            <div class="accordion" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        LUNES</h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="row">
                    <div class="col-4">
                        <div class="d-flex justify-content-center align-items-center" style="padding: 20px;">
                            <img src="../../img/predefinido/lunes.jpg" alt="" style="width: 100%; border-radius: 10px;">
                        </div>
                    </div>
                    <div class="col-8" style="text-align: justify;">
                        <h1 style="color: red;">Pecho y Tríceps</h1><br>
                        <h2><b>1. Press de banca con barra</b></h2>
                        <p>&rarr; 4 series de 8-12 repeticiones.</p>
                        <p>&rarr; Descanso: 90-120 segundos entre series.</p>
                        <p><i>Origen:</i> Ejercicio clásico para el desarrollo del pecho, recomendado en rutinas de fuerza y musculación.</p>
                        <br>
                        <h2><b>2. Fondos en paralelas</b></h2>
                        <p>&rarr; 3 series de 8-12 repeticiones.</p>
                        <p>&rarr; Descanso: 90 segundos entre series.</p>
                        <p><i>Origen:</i> Ejercicio compuesto para trabajar el pecho y los tríceps.</p>
                        <br>
                        <h2><b>3. Press inclinado con mancuernas</b></h2>
                        <p>&rarr; 3 series de 8-12 repeticiones.</p>
                        <p>&rarr; Descanso: 90 segundos entre series.</p>
                        <p><i>Origen:</i> Variante del press de banca, que enfoca más la parte superior del pecho.</p>
                        <br>
                        <h2><b>4. Jalón de triceps en polea</b></h2>
                        <p>&rarr; 4 series de 10-12 repeticiones.</p>
                        <p>&rarr; Descanso: 60 segundos entre series.</p>
                        <p><i>Origen:</i> Ejercicio de aislamiento para los tríceps, común en rutinas de hipertrofia.</p>
                        <br>
                        <h2><b>5. Rompecráneos (Skull Crushers)</b></h2>
                        <p>&rarr; 3 series de 10-12 repeticiones.</p>
                        <p>&rarr; Descanso: 60-90 segundos entre series.</p>
                        <p><i>Origen:</i> Ejercicio de aislamiento para los tríceps, especialmente el largo del tríceps.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                MARTES
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="row">
                    <div class="col-4">
                        <div class="d-flex justify-content-center align-items-center" style="padding: 20px;">
                            <img src="../../img/predefinido/martes.png" alt="" style="width: 100%; border-radius: 10px;">
                        </div>
                    </div>
                    <div class="col-8" style="text-align: justify;">
                        <h1 style="color: red;">Espalda y Bíceps</h1><br>
                        <h2><b>1. Dominadas</b></h2>
                        <p>&rarr; 4 series de 8-12 repeticiones.</p>
                        <p>&rarr; Descanso: 60-90 segundos entre series.</p>
                        <p><i>Origen:</i> Ejercicio clásico para trabajar la espalda y el bíceps, fundamental en entrenamiento de fuerza.</p>
                        <br>
                        <h2><b>2. Remo con barra</b></h2>
                        <p>&rarr; 4 series de 8-10 repeticiones.</p>
                        <p>&rarr; Descanso: 90 segundos entre series.</p>
                        <p><i>Origen:</i> Ejercicio compuesto que trabaja la espalda media y los bíceps.</p>
                        <br>
                        <h2><b>3. Jalón al pecho</b></h2>
                        <p>&rarr; 3 series de 12-15 repeticiones.</p>
                        <p>&rarr; Descanso: 60 segundos entre series.</p>
                        <p><i>Origen:</i> Ejercicio que enfatiza el trabajo de los dorsales y bíceps.</p>
                        <br>
                        <h2><b>4. Curl con barra para bíceps</b></h2>
                        <p>&rarr; 4 series de 10-12 repeticiones.</p>
                        <p>&rarr; Descanso: 60 segundos entre series.</p>
                        <p><i>Origen:</i> Ejercicio principal para trabajar el bíceps, básico en rutinas de hipertrofia.</p>
                        <br>
                        <h2><b>5. Curl de bíceps en banco inclinado</b></h2>
                        <p>&rarr; 3 series de 12-15 repeticiones.</p>
                        <p>&rarr; Descanso: 60 segundos entre series.</p>
                        <p><i>Origen:</i> Variante del curl de bíceps, que trabaja el músculo de manera más aislada.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                MIERCOLES
            </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="row">
                    <div class="col-4">
                        <div class="d-flex justify-content-center align-items-center" style="padding: 20px;">
                            <img src="../../img/predefinido/miercoles.webp" alt="" style="width: 100%; border-radius: 10px;">
                        </div>
                    </div>
                    <div class="col-8" style="text-align: justify;">
                        <h1 style="color: red;">Piernas (Cuádriceps, Femorales y Glúteos)</h1><br>
                        <h2><b>1. Sentadilla con barra</b></h2>
                        <p>&rarr; 4 series de 8-12 repeticiones.</p>
                        <p>&rarr; Descanso: 90-120 segundos entre series.</p>
                        <p><i>Origen:</i> Ejercicio compuesto esencial para el desarrollo de las piernas, recomendado en programas de fuerza y musculación.</p>
                        <br>
                        <h2><b>2. Prensa de piernas</b></h2>
                        <p>&rarr; 4 series de 10-12 repeticiones.</p>
                        <p>&rarr; Descanso: 90 segundos entre series.</p>
                        <p><i>Origen:</i> Ejercicio controlado para trabajar cuádriceps y glúteos.</p>
                        <br>
                        <h2><b>3. Peso muerto rumano</b></h2>
                        <p>&rarr; 4 series de 8-12 repeticiones.</p>
                        <p>&rarr; Descanso: 90-120 segundos entre series.</p>
                        <p><i>Origen:</i> Ejercicio principal para trabajar los femorales, especialmente el músculo semitendinoso.</p>
                        <br>
                        <h2><b>4. Hip Thrust (Elevación de cadera)</b></h2>
                        <p>&rarr; 4 series de 10-12 repeticiones.</p>
                        <p>&rarr; Descanso: 90 segundos entre series.</p>
                        <p><i>Origen:</i> Ejercicio clave para el desarrollo de los glúteos.</p>
                        <br>
                        <h2><b>5. Zancadas</b></h2>
                        <p>&rarr; 3 series de 12-15 repeticiones por pierna.</p>
                        <p>&rarr; Descanso: 60-90 segundos entre series.</p>
                        <p><i>Origen:</i> Ejercicio unilateral que trabaja principalmente los glúteos, cuádriceps y femorales.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                JUEVES
            </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="row">
                    <div class="col-4">
                        <div class="d-flex justify-content-center align-items-center" style="padding: 20px;">
                            <img src="../../img/predefinido/jueves.webp" alt="" style="width: 100%; border-radius: 10px;">
                        </div>
                    </div>
                    <div class="col-8" style="text-align: justify;">
                        <h1 style="color: red;">Hombros y Trapecios</h1><br>
                        <h2><b>1. Press militar con barra</b></h2>
                        <p>&rarr; 4 series de 8-12 repeticiones.</p>
                        <p>&rarr; Descanso: 90 segundos entre series.</p>
                        <p><i>Origen:</i> Ejercicio clásico para el desarrollo de los hombros, fundamental en entrenamiento de fuerza.</p>
                        <br>
                        <h2><b>2. Elevaciones laterales</b></h2>
                        <p>&rarr; 4 series de 12-15 repeticiones.</p>
                        <p>&rarr; Descanso: 60 segundos entre series.</p>
                        <p><i>Origen:</i> Ejercicio para la parte media del hombro, excelente para trabajar la amplitud.</p>
                        <br>
                        <h2><b>3. Elevaciones frontales</b></h2>
                        <p>&rarr; 3 series de 12-15 repeticiones.</p>
                        <p>&rarr; Descanso: 60 segundos entre series.</p>
                        <p><i>Origen:</i> Ejercicio que se enfoca en la parte anterior del hombro.</p>
                        <br>
                        <h2><b>4. Encogimientos con barra</b></h2>
                        <p>&rarr; 4 series de 12-15 repeticiones.</p>
                        <p>&rarr; Descanso: 60 segundos entre series.</p>
                        <p><i>Origen:</i> Ejercicio específico para trabajar el trapecio.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingFive">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                VIERNES
            </button>
        </h2>
        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="row">
                    <div class="col-4">
                        <div class="d-flex justify-content-center align-items-center" style="padding: 20px;">
                            <img src="../../img/predefinido/viernes.webp" alt="" style="width: 100%; border-radius: 10px;">
                        </div>
                    </div>
                    <div class="col-8" style="text-align: justify;">
                        <h1 style="color: red;">Abdomen y Cardio</h1><br>
                        <h2><b>1. Crunch abdominal</b></h2>
                        <p>&rarr; 4 series de 15-20 repeticiones.</p>
                        <p>&rarr; Descanso: 60 segundos entre series.</p>
                        <p><i>Origen:</i> Ejercicio clásico para el trabajo de los músculos abdominales.</p>
                        <br>
                        <h2><b>2. Elevación de piernas</b></h2>
                        <p>&rarr; 3 series de 12-15 repeticiones.</p>
                        <p>&rarr; Descanso: 60 segundos entre series.</p>
                        <p><i>Origen:</i> Ejercicio para enfocar el trabajo en la parte inferior del abdomen.</p>
                        <br>
                        <h2><b>3. Plank (Plancha)</b></h2>
                        <p>&rarr; 3 series de 45 segundos.</p>
                        <p>&rarr; Descanso: 60 segundos entre series.</p>
                        <p><i>Origen:</i> Ejercicio estático para trabajar toda la zona abdominal y estabilizadores.</p>
                        <br>
                        <h2><b>4. Cardio (Correr o Bicicleta)</b></h2>
                        <p>&rarr; 30 minutos a intensidad moderada.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
</div> <br><br><br><br><br>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="../../js/Bienvenida.js"></script>
    </div>
</body>

</html>