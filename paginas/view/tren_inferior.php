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
    <title>Tren Inferior</title>
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
                                            <p> <?php echo $nombre ?> </p> &ensp;
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
                    <img id="logo" style=" display: block;" src="../../img/logo/Logo.png" alt="Logo" width="50%" title="Logo" />
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
                    <h1 id="x2">TREN INFERIOR</h1>
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
                                CUÁDRICEPS
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="d-flex justify-content-center align-items-center" style="padding: 20px;">
                                            <img src="../../img/inferior/CUaDRICEPS.jpg" alt="" style="width: 100%; border-radius: 10px;">
                                        </div>
                                    </div>
                                    <div class="col-8" style="text-align: justify;">
                                        <h2><b>1. Sentadilla con barra</b></h2>
                                        <p>&rarr; 4 series de 8-12 repeticiones.</p>
                                        <p>&rarr; Descanso: 90-120 segundos entre series.</p>
                                        <p><i>Origen:</i> Ejercicio compuesto fundamental, común en programas como *StrongLifts 5x5* y *Starting Strength*.</p>
                                        <br>
                                        <h2><b>2. Prensa de piernas</b></h2>
                                        <p>&rarr; 4 series de 10-12 repeticiones.</p>
                                        <p>&rarr; Descanso: 90 segundos entre series.</p>
                                        <p><i>Origen:</i> Utilizado en gimnasios para trabajar cuádriceps y glúteos con soporte.</p>
                                        <br>
                                        <h2><b>3. Zancadas (Lunges)</b></h2>
                                        <p>&rarr; 3 series de 10-12 repeticiones por pierna.</p>
                                        <p>&rarr; Descanso: 60-90 segundos entre series.</p>
                                        <p><i>Origen:</i> Ejercicio funcional recomendado para equilibrio y fuerza unilateral.</p>
                                        <br>
                                        <h2><b>4. Extensiones de piernas en máquina</b></h2>
                                        <p>&rarr; 3 series de 12-15 repeticiones.</p>
                                        <p>&rarr; Descanso: 60 segundos entre series.</p>
                                        <p><i>Origen:</i> Ejercicio de aislamiento común en rutinas de hipertrofia.</p>
                                        <br>
                                        <h2><b>5. Front Squat (Sentadilla frontal)</b></h2>
                                        <p>&rarr; 3 series de 8-10 repeticiones.</p>
                                        <p>&rarr; Descanso: 90-120 segundos entre series.</p>
                                        <p><i>Origen:</i> Recomendado para enfatizar el trabajo en los cuádriceps.</p>
                                        <br>
                                        <h2><b>6. Step-ups con mancuernas</b></h2>
                                        <p>&rarr; 3 series de 10-12 repeticiones por pierna.</p>
                                        <p>&rarr; Descanso: 60-90 segundos entre series.</p>
                                        <p><i>Origen:</i> Ejercicio funcional para fuerza y estabilidad, popular en entrenamientos atléticos.</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                FEMORAL
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="d-flex justify-content-center align-items-center" style="padding: 20px;">
                                            <img src="../../img/inferior/FEMORAL.gif" alt="" style="width: 100%; border-radius: 10px;">
                                        </div>
                                    </div>
                                    <div class="col-8" style="text-align: justify;">
                                        <h2><b>1. Peso muerto rumano</b></h2>
                                        <p>&rarr; 4 series de 8-12 repeticiones.</p>
                                        <p>&rarr; Descanso: 90-120 segundos entre series.</p>
                                        <p><i>Origen:</i> Ejercicio compuesto clave para trabajar los femorales y glúteos, popular en programas como *Starting Strength*.</p>
                                        <br>
                                        <h2><b>2. Curl de piernas en máquina (Prone leg curl)</b></h2>
                                        <p>&rarr; 4 series de 12-15 repeticiones.</p>
                                        <p>&rarr; Descanso: 60-90 segundos entre series.</p>
                                        <p><i>Origen:</i> Ejercicio de aislamiento utilizado en rutinas de culturismo para enfocarse en los músculos femorales.</p>
                                        <br>
                                        <h2><b>3. Curl de piernas tumbado con mancuerna (Dumbbell leg curl)</b></h2>
                                        <p>&rarr; 3 series de 10-12 repeticiones.</p>
                                        <p>&rarr; Descanso: 60-90 segundos entre series.</p>
                                        <p><i>Origen:</i> Variante de curl de piernas enfocado en el trabajo unilateral de los femorales.</p>
                                        <br>
                                        <h2><b>4. Peso muerto convencional</b></h2>
                                        <p>&rarr; 3 series de 6-8 repeticiones.</p>
                                        <p>&rarr; Descanso: 2 minutos entre series.</p>
                                        <p><i>Origen:</i> Ejercicio básico para trabajar los femorales, glúteos y espalda baja, común en entrenamientos de fuerza.</p>
                                        <br>
                                        <h2><b>5. Hip Thrust (Elevación de cadera)</b></h2>
                                        <p>&rarr; 4 series de 10-12 repeticiones.</p>
                                        <p>&rarr; Descanso: 90 segundos entre series.</p>
                                        <p><i>Origen:</i> Ejercicio excelente para trabajar glúteos y femorales, popularizado por estudios de biomecánica.</p>
                                        <br>
                                        <h2><b>6. Good Mornings (Buenos días)</b></h2>
                                        <p>&rarr; 3 series de 8-10 repeticiones.</p>
                                        <p>&rarr; Descanso: 90-120 segundos entre series.</p>
                                        <p><i>Origen:</i> Ejercicio de aislamiento para femorales y espalda baja, utilizado en entrenamientos de fuerza y potencia.</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                PANTORRILLA
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="d-flex justify-content-center align-items-center" style="padding: 20px;">
                                            <img src="../../img/inferior/PANTORRILLA.jpg" alt="" style="width: 100%; border-radius: 10px;">
                                        </div>
                                    </div>
                                    <div class="col-8" style="text-align: justify;">
                                        <h2><b>1. Elevación de talones de pie en máquina (Calf raise machine)</b></h2>
                                        <p>&rarr; 4 series de 12-20 repeticiones.</p>
                                        <p>&rarr; Descanso: 60-90 segundos entre series.</p>
                                        <p><i>Origen:</i> Ejercicio clásico para trabajar las pantorrillas, especialmente el gastrocnemio.</p>
                                        <br>
                                        <h2><b>2. Elevación de talones sentado en máquina (Seated calf raise)</b></h2>
                                        <p>&rarr; 4 series de 12-20 repeticiones.</p>
                                        <p>&rarr; Descanso: 60-90 segundos entre series.</p>
                                        <p><i>Origen:</i> Este ejercicio se enfoca en el sóleo, músculo profundo de las pantorrillas.</p>
                                        <br>
                                        <h2><b>3. Elevación de talones con barra (Barbell calf raise)</b></h2>
                                        <p>&rarr; 3 series de 12-15 repeticiones.</p>
                                        <p>&rarr; Descanso: 60 segundos entre series.</p>
                                        <p><i>Origen:</i> Variante de elevación de talones en pie, popular para desarrollar fuerza en las pantorrillas.</p>
                                        <br>
                                        <h2><b>4. Elevación de talones con mancuernas (Dumbbell calf raise)</b></h2>
                                        <p>&rarr; 3 series de 12-15 repeticiones.</p>
                                        <p>&rarr; Descanso: 60 segundos entre series.</p>
                                        <p><i>Origen:</i> Variante similar a la elevación con barra, pero con mancuernas para un trabajo unilateral.</p>
                                        <br>
                                        <h2><b>5. Saltos de cuerda</b></h2>
                                        <p>&rarr; 3 series de 1-2 minutos.</p>
                                        <p>&rarr; Descanso: 60 segundos entre series.</p>
                                        <p><i>Origen:</i> Ejercicio cardiovascular que también fortalece las pantorrillas debido a la constante extensión de los talones.</p>
                                        <br>
                                        <h2><b>6. Elevación de talones en prensa de pierna</b></h2>
                                        <p>&rarr; 3 series de 15-20 repeticiones.</p>
                                        <p>&rarr; Descanso: 60-90 segundos entre series.</p>
                                        <p><i>Origen:</i> Variante de la prensa de piernas, que permite un enfoque más aislado en las pantorrillas.</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingfour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapseThree">
                                GLUTEOS
                            </button>
                        </h2>
                        <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingfour" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="d-flex justify-content-center align-items-center" style="padding: 20px;">
                                            <img src="../../img/inferior/GLUTEOS.webp" alt="" style="width: 100%; border-radius: 10px;">
                                        </div>
                                    </div>
                                    <div class="col-8" style="text-align: justify;">
                                        <h2><b>1. Hip Thrust (Elevación de cadera)</b></h2>
                                        <p>&rarr; 4 series de 10-12 repeticiones.</p>
                                        <p>&rarr; Descanso: 90 segundos entre series.</p>
                                        <p><i>Origen:</i> Ejercicio esencial para el desarrollo de los glúteos, popularizado por estudios de biomecánica en entrenamiento de fuerza.</p>
                                        <br>
                                        <h2><b>2. Sentadillas (Squats)</b></h2>
                                        <p>&rarr; 4 series de 8-12 repeticiones.</p>
                                        <p>&rarr; Descanso: 90-120 segundos entre series.</p>
                                        <p><i>Origen:</i> Ejercicio compuesto básico para el desarrollo de los glúteos y los cuádriceps, incluido en rutinas como *Starting Strength*.</p>
                                        <br>
                                        <h2><b>3. Zancadas (Lunges)</b></h2>
                                        <p>&rarr; 3 series de 10-12 repeticiones por pierna.</p>
                                        <p>&rarr; Descanso: 60-90 segundos entre series.</p>
                                        <p><i>Origen:</i> Ejercicio funcional que trabaja glúteos y piernas, popular en entrenamientos de resistencia.</p>
                                        <br>
                                        <h2><b>4. Prensa de piernas (Leg Press)</b></h2>
                                        <p>&rarr; 4 series de 10-12 repeticiones.</p>
                                        <p>&rarr; Descanso: 90 segundos entre series.</p>
                                        <p><i>Origen:</i> Ejercicio que permite enfocarse en los glúteos y cuádriceps de manera controlada y con carga pesada.</p>
                                        <br>
                                        <h2><b>5. Kickbacks en máquina</b></h2>
                                        <p>&rarr; 3 series de 12-15 repeticiones por pierna.</p>
                                        <p>&rarr; Descanso: 60-90 segundos entre series.</p>
                                        <p><i>Origen:</i> Ejercicio de aislamiento que activa principalmente los glúteos, especialmente el glúteo mayor.</p>
                                        <br>
                                        <h2><b>6. Elevaciones de cadera con una pierna</b></h2>
                                        <p>&rarr; 3 series de 10-12 repeticiones por pierna.</p>
                                        <p>&rarr; Descanso: 60 segundos entre series.</p>
                                        <p><i>Origen:</i> Variante del hip thrust, que aísla cada glúteo de manera unilateral.</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br> <br>
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