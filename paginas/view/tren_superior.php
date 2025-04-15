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
    <title>Tren superior</title>
    <link
        href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet" />
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        rel="stylesheet" />
    <link
        rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,400,0,0" />
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
                                            <p>Ilder Alberto Gutierrez Beleño</p> &ensp;
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
                    <h1 id="x2">TREN SUPERIOR</h1>
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
                                ESPALDA
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="d-flex justify-content-center align-items-center" style="padding: 20px;">
                                            <img src="../../img/superior/espalda.webp" alt="" style="width: 100%; border-radius: 10px;">
                                        </div>
                                    </div>
                                    <div class="col-8" style="text-align: justify;">
                                        <h2><b>1. Dominadas</b></h2>
                                        <p>&rarr; 4 series de 8-12 repeticiones.</p>
                                        <p>&rarr; Descanso: 60-90 segundos entre series.</p>
                                        <p><i>Origen:</i> Ejercicio clásico de peso corporal, usado en calistenia y entrenamientos funcionales.</p>
                                        <br>
                                        <h2><b>2. Remo con barra</b></h2>
                                        <p>&rarr; 4 series de 8-10 repeticiones.</p>
                                        <p>&rarr; Descanso: 90 segundos entre series.</p>
                                        <p><i>Origen:</i> Recomendado en libros como *Starting Strength* de Mark Rippetoe.</p>
                                        <br>
                                        <h2><b>3. Jalón al pecho</b></h2>
                                        <p>&rarr; 3 series de 12-15 repeticiones.</p>
                                        <p>&rarr; Descanso: 60 segundos entre series.</p>
                                        <p><i>Origen:</i> Alternativa a las dominadas, común en gimnasios.</p>
                                        <br>
                                        <h2><b>4. Peso muerto</b></h2>
                                        <p>&rarr; 4 series de 6-8 repeticiones.</p>
                                        <p>&rarr; Descanso: 2 minutos entre series.</p>
                                        <p><i>Origen:</i> Ejercicio compuesto fundamental en levantamiento de pesas.</p>
                                        <br>
                                        <h2><b>5. Remo con mancuerna</b></h2>
                                        <p>&rarr; 3 series de 10-12 repeticiones por lado.</p>
                                        <p>&rarr; Descanso: 60 segundos entre series.</p>
                                        <p><i>Origen:</i> Ejercicio accesorio para trabajar la espalda unilateralmente.</p>
                                        <br>
                                        <h2><b>6. Face Pull</b></h2>
                                        <p>&rarr; 3 series de 12-15 repeticiones.</p>
                                        <p>&rarr; Descanso: 60 segundos entre series.</p>
                                        <p><i>Origen:</i> Recomendado para deltoides posteriores y postura, promovido por entrenadores como Jeff Cavaliere (Athlean-X).</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                PECHO
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="d-flex justify-content-center align-items-center" style="padding: 20px;">
                                            <img src="../../img/superior/pecho.webp" alt="" style="width: 100%; border-radius: 10px;">
                                        </div>
                                    </div>
                                    <div class="col-8" style="text-align: justify;">
                                        <h2><b>1. Press de banca con barra</b></h2>
                                        <p>&rarr; 4 series de 8-12 repeticiones.</p>
                                        <p>&rarr; Descanso: 90 segundos entre series.</p>
                                        <p><i>Origen:</i> Ejercicio básico de culturismo, común en programas como *StrongLifts 5x5*.</p>
                                        <br>
                                        <h2><b>2. Press inclinado con mancuernas</b></h2>
                                        <p>&rarr; 4 series de 10-12 repeticiones.</p>
                                        <p>&rarr; Descanso: 90 segundos entre series.</p>
                                        <p><i>Origen:</i> Trabaja la parte superior del pectoral mayor.</p>
                                        <br>
                                        <h2><b>3. Aperturas con mancuernas</b></h2>
                                        <p>&rarr; 3 series de 12-15 repeticiones.</p>
                                        <p>&rarr; Descanso: 60 segundos entre series.</p>
                                        <p><i>Origen:</i> Ejercicio de aislamiento, común para estiramiento muscular.</p>
                                        <br>
                                        <h2><b>4. Press declinado con barra</b></h2>
                                        <p>&rarr; 4 series de 8-10 repeticiones.</p>
                                        <p>&rarr; Descanso: 90 segundos entre series.</p>
                                        <p><i>Origen:</i> Recomendado para trabajar la parte inferior del pecho.</p>
                                        <br>
                                        <h2><b>5. Fondos en paralelas</b></h2>
                                        <p>&rarr; 3 series de 10-12 repeticiones.</p>
                                        <p>&rarr; Descanso: 60-90 segundos entre series.</p>
                                        <p><i>Origen:</i> Ejercicio compuesto para pecho y tríceps, común en gimnasios.</p>
                                        <br>
                                        <h2><b>6. Cruces en polea</b></h2>
                                        <p>&rarr; 3 series de 12-15 repeticiones.</p>
                                        <p>&rarr; Descanso: 60 segundos entre series.</p>
                                        <p><i>Origen:</i> Ejercicio de aislamiento de pectorales, típico en rutinas de máquinas.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                TRICEPT
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="d-flex justify-content-center align-items-center" style="padding: 20px;">
                                            <img src="../../img/superior/triceps.png" alt="" style="width: 100%; border-radius: 10px;">
                                        </div>
                                    </div>
                                    <div class="col-8" style="text-align: justify;">
                                        <h2><b>1. Extensiones de tríceps en polea</b></h2>
                                        <p>&rarr; 4 series de 12-15 repeticiones.</p>
                                        <p>&rarr; Descanso: 60 segundos entre series.</p>
                                        <p><i>Origen:</i> Ejercicio clásico en máquinas, ideal para aislamiento.</p>
                                        <br>
                                        <h2><b>2. Press francés con barra</b></h2>
                                        <p>&rarr; 4 series de 10-12 repeticiones.</p>
                                        <p>&rarr; Descanso: 90 segundos entre series.</p>
                                        <p><i>Origen:</i> Incluido en *The Modern Bodybuilding Encyclopedia* de Arnold Schwarzenegger.</p>
                                        <br>
                                        <h2><b>3. Fondos en paralelas</b></h2>
                                        <p>&rarr; 3 series de 8-12 repeticiones.</p>
                                        <p>&rarr; Descanso: 90 segundos entre series.</p>
                                        <p><i>Origen:</i> Ejercicio compuesto que también involucra el pecho.</p>
                                        <br>
                                        <h2><b>4. Extensiones por encima de la cabeza con mancuerna</b></h2>
                                        <p>&rarr; 4 series de 12-15 repeticiones.</p>
                                        <p>&rarr; Descanso: 60-90 segundos entre series.</p>
                                        <p><i>Origen:</i> Popular para trabajar la cabeza larga del tríceps.</p>
                                        <br>
                                        <h2><b>5. Extensiones de tríceps con cuerda en polea alta</b></h2>
                                        <p>&rarr; 3 series de 12-15 repeticiones.</p>
                                        <p>&rarr; Descanso: 60 segundos entre series.</p>
                                        <p><i>Origen:</i> Recomendado para un mayor rango de movimiento.</p>
                                        <br>
                                        <h2><b>6. Kickbacks con mancuerna</b></h2>
                                        <p>&rarr; 3 series de 12-15 repeticiones por brazo.</p>
                                        <p>&rarr; Descanso: 60 segundos entre series.</p>
                                        <p><i>Origen:</i> Ejercicio clásico para la definición del tríceps.</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingfour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapseThree">
                                HOMBROS
                            </button>
                        </h2>
                        <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingfour" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="d-flex justify-content-center align-items-center" style="padding: 20px;">
                                            <img src="../../img/superior/hombros.webp" alt="" style="width: 100%; border-radius: 10px;">
                                        </div>
                                    </div>
                                    <div class="col-8" style="text-align: justify;">
                                        <h2><b>1. Press militar con barra</b></h2>
                                        <p>&rarr; 4 series de 8-12 repeticiones.</p>
                                        <p>&rarr; Descanso: 90 segundos entre series.</p>
                                        <p><i>Origen:</i> Ejercicio compuesto fundamental, incluido en programas como *Starting Strength*.</p>
                                        <br>
                                        <h2><b>2. Elevaciones laterales con mancuernas</b></h2>
                                        <p>&rarr; 4 series de 12-15 repeticiones.</p>
                                        <p>&rarr; Descanso: 60 segundos entre series.</p>
                                        <p><i>Origen:</i> Ejercicio básico para trabajar los deltoides laterales.</p>
                                        <br>
                                        <h2><b>3. Remo al mentón con barra</b></h2>
                                        <p>&rarr; 3 series de 10-12 repeticiones.</p>
                                        <p>&rarr; Descanso: 90 segundos entre series.</p>
                                        <p><i>Origen:</i> Común en rutinas de culturismo, enfocado en deltoides y trapecios.</p>
                                        <br>
                                        <h2><b>4. Elevaciones frontales con mancuerna</b></h2>
                                        <p>&rarr; 4 series de 12-15 repeticiones.</p>
                                        <p>&rarr; Descanso: 60 segundos entre series.</p>
                                        <p><i>Origen:</i> Utilizado para trabajar los deltoides frontales.</p>
                                        <br>
                                        <h2><b>5. Face Pull con cuerda en polea alta</b></h2>
                                        <p>&rarr; 3 series de 12-15 repeticiones.</p>
                                        <p>&rarr; Descanso: 60 segundos entre series.</p>
                                        <p><i>Origen:</i> Recomendado por fisioterapeutas y entrenadores como Jeff Cavaliere para deltoides posteriores.</p>
                                        <br>
                                        <h2><b>6. Press Arnold</b></h2>
                                        <p>&rarr; 3 series de 8-10 repeticiones.</p>
                                        <p>&rarr; Descanso: 90 segundos entre series.</p>
                                        <p><i>Origen:</i> Introducido por Arnold Schwarzenegger, excelente para activar todas las cabezas del deltoide.</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingfiv">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="false" aria-controls="collapseThree">
                                BICEPS
                            </button>
                        </h2>
                        <div id="collapsefive" class="accordion-collapse collapse" aria-labelledby="headingfive" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="d-flex justify-content-center align-items-center" style="padding: 20px;">
                                            <img src="../../img/superior/Biceps.webp" alt="" style="width: 100%; border-radius: 10px;">
                                        </div>
                                    </div>
                                    <div class="col-8" style="text-align: justify;">
                                        <h2><b>1. Curl de bíceps con barra</b></h2>
                                        <p>&rarr; 4 series de 8-12 repeticiones.</p>
                                        <p>&rarr; Descanso: 90 segundos entre series.</p>
                                        <p><i>Origen:</i> Ejercicio básico incluido en programas de culturismo como los de Arnold Schwarzenegger.</p>
                                        <br>
                                        <h2><b>2. Curl alternado con mancuernas</b></h2>
                                        <p>&rarr; 4 series de 10-12 repeticiones por brazo.</p>
                                        <p>&rarr; Descanso: 60-90 segundos entre series.</p>
                                        <p><i>Origen:</i> Ejercicio popular para trabajar cada brazo de forma aislada.</p>
                                        <br>
                                        <h2><b>3. Curl de concentración</b></h2>
                                        <p>&rarr; 3 series de 12-15 repeticiones por brazo.</p>
                                        <p>&rarr; Descanso: 60 segundos entre series.</p>
                                        <p><i>Origen:</i> Recomendado por culturistas para lograr mayor enfoque en la contracción muscular.</p>
                                        <br>
                                        <h2><b>4. Curl martillo</b></h2>
                                        <p>&rarr; 3 series de 8-10 repeticiones por brazo.</p>
                                        <p>&rarr; Descanso: 90 segundos entre series.</p>
                                        <p><i>Origen:</i> Ejercicio ideal para trabajar el braquiorradial y fortalecer el antebrazo.</p>
                                        <br>
                                        <h2><b>5. Curl en banco inclinado</b></h2>
                                        <p>&rarr; 3 series de 10-12 repeticiones.</p>
                                        <p>&rarr; Descanso: 60-90 segundos entre series.</p>
                                        <p><i>Origen:</i> Común en programas de entrenamiento para alargar el rango de movimiento del bíceps.</p>
                                        <br>
                                        <h2><b>6. Curl de bíceps en polea baja</b></h2>
                                        <p>&rarr; 3 series de 12-15 repeticiones.</p>
                                        <p>&rarr; Descanso: 60 segundos entre series.</p>
                                        <p><i>Origen:</i> Utilizado para mantener tensión constante en los bíceps.</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingsix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesix" aria-expanded="false" aria-controls="collapseThree">
                                ANTEBRAZOS
                            </button>
                        </h2>
                        <div id="collapsesix" class="accordion-collapse collapse" aria-labelledby="headingsix" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="d-flex justify-content-center align-items-center" style="padding: 20px;">
                                            <img src="../../img/superior/antebrazo.png" alt="" style="width: 100%; border-radius: 10px;">
                                        </div>
                                    </div>
                                    <div class="col-8" style="text-align: justify;">
                                        <h2><b>1. Curl de muñeca con barra</b></h2>
                                        <p>&rarr; 4 series de 12-15 repeticiones.</p>
                                        <p>&rarr; Descanso: 60 segundos entre series.</p>
                                        <p><i>Origen:</i> Ejercicio básico recomendado para fortalecer los flexores del antebrazo.</p>
                                        <br>
                                        <h2><b>2. Curl inverso con barra</b></h2>
                                        <p>&rarr; 3 series de 8-10 repeticiones.</p>
                                        <p>&rarr; Descanso: 90 segundos entre series.</p>
                                        <p><i>Origen:</i> Común en rutinas de fuerza para trabajar los extensores del antebrazo y el braquiorradial.</p>
                                        <br>
                                        <h2><b>3. Extensiones de muñeca con barra</b></h2>
                                        <p>&rarr; 3 series de 12-15 repeticiones.</p>
                                        <p>&rarr; Descanso: 60 segundos entre series.</p>
                                        <p><i>Origen:</i> Incluido en programas de culturismo para trabajar los extensores del antebrazo.</p>
                                        <br>
                                        <h2><b>4. Hold con barra o mancuerna</b></h2>
                                        <p>&rarr; 3 series de 30-45 segundos.</p>
                                        <p>&rarr; Descanso: 90 segundos entre series.</p>
                                        <p><i>Origen:</i> Ejercicio isométrico recomendado para mejorar la fuerza de agarre.</p>
                                        <br>
                                        <h2><b>5. Rotaciones de muñeca con mancuernas</b></h2>
                                        <p>&rarr; 3 series de 12-15 repeticiones por lado.</p>
                                        <p>&rarr; Descanso: 60 segundos entre series.</p>
                                        <p><i>Origen:</i> Utilizado en programas de rehabilitación y fortalecimiento del antebrazo.</p>
                                        <br>
                                        <h2><b>6. Farmer's Walk (Caminar con peso)</b></h2>
                                        <p>&rarr; 3 series de 20-30 metros con mancuernas pesadas.</p>
                                        <p>&rarr; Descanso: 90 segundos entre series.</p>
                                        <p><i>Origen:</i> Ejercicio funcional popular para mejorar la fuerza de agarre y estabilidad del antebrazo.</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br> <br> <br><br><br><br><br>
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