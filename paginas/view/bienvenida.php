<?php
session_start();
if (!isset($_SESSION['Email'])) {
  header('Location: ../../index.php');
  exit();
} else {
  $nombre = $_SESSION['nombre'];
  $rol = $_SESSION['rol'];
  $documento = $_SESSION['documento'];
}
include '../../php/destruir_sesion.php';
verificar_inactividad($rol);
include '../../php/Conexion_bc.php'; 
include '../../php/Activar_Afiliado.php'; 
include '../../php/Activacion.php';
$conexion = conexion();
new Activar_Afiliado($conexion);
if ($_SESSION['rol'] == '3') {
  include '../../php/seguimientos.php';
  $segimiento = new seguimeintos($conexion, $documento);
}
$accion = new Activar_Automatica();
$accion->Activavcion($conexion);
cerrar_conexion($conexion);

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>GYM UPC</title>
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
  <link rel="stylesheet" href="../../css/bienvenida.css" />
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
                  <a class="nav-link active" href="#" style=" color: #ffffff; padding-right: 30px; font-weight: bold; font-size: 14px; border-bottom: solid 4px #ffcc53;"><span class="material-icons" style="vertical-align: middle">home</span>
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
                  <a class="nav-link active" href="#" style=" color: #ffffff; padding-right: 30px; font-weight: bold; font-size: 14px; border-bottom: solid 4px #ffcc53;"><span class="material-icons" style="vertical-align: middle">home</span>
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
                      <p><?php echo ($nombre) ?></p>&ensp;
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
                  <a class="nav-link active" href="#" style=" color: #ffffff; padding-right: 30px; font-weight: bold; font-size: 14px; border-bottom: solid 4px #ffcc53;"><span class="material-icons" style="vertical-align: middle">home</span>
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
                      <p><?php echo $nombre ?></p>&ensp;
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
         <!-- Button trigger modal -->
    <button title="Arbol de Menú" type="button" class="btn Arbol" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        <span class="material-symbols-outlined">
            account_tree
        </span>
    </button>
    <!-- Inicio Arbol de menú -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" 
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" style=" box-shadow: 30px 15px 30px #f7deba;">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #0b7f46; color: #ffffff;">
                    <h5 class="modal-title" id="staticBackdropLabel">Arbol de menu GYM - UPC</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="background: #1e1e1e">
                    <div class="accordion" id="gymUpcAccordion" >
                        <div class="accordion-item" style="background: #1e1e1e; color: #ffffff;">
                            <h2 class="accordion-header" id="headingBoostrap">
                                <button  style="background-color: #0b7f46; color: #ffffff;" class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseBoostrap" aria-expanded="true"
                                    aria-controls="collapseBoostrap">
                                    📁 boostrap
                                </button>
                            </h2>
                            <div id="collapseBoostrap" class="accordion-collapse collapse "
                                aria-labelledby="headingBoostrap" data-bs-parent="#gymUpcAccordion">
                                <div class="accordion-body">
                                    <div class="accordion" id="boostrapSubAccordion">
                                        <div class="accordion-item"  style="background: #1e1e1e; color: #ffffff;">
                                            <h2 class="accordion-header" id="headingCss">
                                                <button style="background-color: #0b7f46; color: #ffffff;" class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseCss" aria-expanded="true"
                                                    aria-controls="collapseCss">
                                                    📁 css
                                                </button>
                                            </h2>
                                            <div id="collapseCss" class="accordion-collapse collapse "
                                                aria-labelledby="headingCss" data-bs-parent="#boostrapSubAccordion">
                                                <div class="accordion-body">
                                                    <ul>
                                                        <li>bootstrap-grid.min.css</li>
                                                        <li>style.css</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item"  style="background: #1e1e1e; color: #ffffff;">
                                            <h2 class="accordion-header" id="headingJs"  style="background: #1e1e1e; color: #ffffff;">
                                                <button style="background-color: #0b7f46; color: #ffffff;" class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseJs" aria-expanded="true"
                                                    aria-controls="collapseJs">
                                                    📁 js
                                                </button>
                                            </h2>
                                            <div id="collapseJs" class="accordion-collapse collapse "
                                                aria-labelledby="headingJs" data-bs-parent="#boostrapSubAccordion">
                                                <div class="accordion-body">
                                                    <ul>
                                                        <li>bootstrap.bundle.min.js</li>
                                                        <li>bootstrap.js</li>
                                                        <li>bootstrap.min.js</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item" id="cssAccordion"  style="background: #1e1e1e; color: #ffffff;">
                            <h2 class="accordion-header" id="headingCssMain"  style="background: #1e1e1e; color: #ffffff;">
                                <button style="background-color: #0b7f46; color: #ffffff;" class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseCssMain" aria-expanded="true"
                                    aria-controls="collapseCssMain">
                                    📁 css
                                </button>
                            </h2>
                            <div id="collapseCssMain" class="accordion-collapse collapse"
                                aria-labelledby="headingCssMain" data-bs-parent="#gymUpcAccordion">
                                <div class="accordion-body">
                                    <ul>
                                        <li>activar_afiliados.css</li>
                                        <li>Apartarcupos.css</li>
                                        <li>bienvenida.css</li>
                                        <li>configuracion.css</li>
                                        <li>estilos_Recuperar.css</li>
                                        <li>estilos.css</li>
                                        <li>imc.css</li>
                                        <li>leerqr.css</li>
                                        <li>listado.css</li>
                                        <li>perfil.css</li>
                                        <li>plan.css</li>
                                        <li>qr.css</li>
                                        <li>registros.css</li>
                                        <li>rutinas.css</li>
                                        <li>seccionrutinas.css</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="accordion" id="imgAccordion" >
                            <!-- img Folder -->
                            <div class="accordion-item" style="background: #1e1e1e; color: #ffffff;">
                                <h2   style="background: #1e1e1e; color: #ffffff;" class="accordion-header" id="headingImg">
                                    <button style="background-color: #0b7f46; color: #ffffff;" class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseImg" aria-expanded="true" aria-controls="collapseImg">
                                        📁 img
                                    </button>
                                </h2>
                                <div id="collapseImg" class="accordion-collapse collapse " aria-labelledby="headingImg"
                                    data-bs-parent="#imgAccordion">
                                    <div class="accordion-body">
                                        <div class="accordion" id="imgSubAccordion">
                                            <!-- inferior Folder -->
                                            <div class="accordion-item"  style="background: #1e1e1e; color: #ffffff;">
                                                <h2 class="accordion-header" id="headingInferior"  style="background: #1e1e1e; color: #ffffff;">
                                                    <button style="background-color: #0b7f46; color: #ffffff;"class="accordion-button" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseInferior"
                                                        aria-expanded="true" aria-controls="collapseInferior">
                                                        📁 inferior
                                                    </button>
                                                </h2>
                                                <div id="collapseInferior" class="accordion-collapse collapse"
                                                    aria-labelledby="headingInferior" data-bs-parent="#imgSubAccordion">
                                                    <div class="accordion-body">
                                                        <ul>
                                                            <li>CUaDRICEPS.jpg</li>
                                                            <li>FEMORAL.gif</li>
                                                            <li>GLUTEOS.webp</li>
                                                            <li>PANTORRILLA.jpg</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- logo Folder -->
                                            <div class="accordion-item"  style="background: #1e1e1e; color: #ffffff;">
                                                <h2 class="accordion-header" id="headingLogo"  style="background: #1e1e1e; color: #ffffff;">
                                                    <button style="background-color: #0b7f46; color: #ffffff;" class="accordion-button" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseLogo"
                                                        aria-expanded="true" aria-controls="collapseLogo">
                                                        📁 logo
                                                    </button>
                                                </h2>
                                                <div id="collapseLogo" class="accordion-collapse collapse"
                                                    aria-labelledby="headingLogo" data-bs-parent="#imgSubAccordion">
                                                    <div class="accordion-body">
                                                        <ul>
                                                            <li>c_tabla.png</li>
                                                            <li>c_tabla1.png</li>
                                                            <li>c_tabla3.png</li>
                                                            <li>desktop.ini</li>
                                                            <li>Logo.png</li>
                                                            <li>WhatsApp Image 2024-09-18 at 12.22.10 PM.jpeg</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- predefinido Folder -->
                                            <div class="accordion-item"  style="background: #1e1e1e; color: #ffffff;">
                                                <h2 class="accordion-header" id="headingPredefinido"  style="background: #1e1e1e; color: #ffffff;">
                                                    <button style="background-color: #0b7f46; color: #ffffff;" class="accordion-button" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapsePredefinido"
                                                        aria-expanded="true" aria-controls="collapsePredefinido">
                                                        📁 predefinido
                                                    </button>
                                                </h2>
                                                <div id="collapsePredefinido" class="accordion-collapse collapse"
                                                    aria-labelledby="headingPredefinido"
                                                    data-bs-parent="#imgSubAccordion">
                                                    <div class="accordion-body">
                                                        <ul>
                                                            <li>jueves.webp</li>
                                                            <li>lunes.jpg</li>
                                                            <li>martes.png</li>
                                                            <li>miercoles.webp</li>
                                                            <li>viernes.webp</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- slider Folder -->
                                            <div class="accordion-item"  style="background: #1e1e1e; color: #ffffff;">
                                                <h2  style="background: #1e1e1e; color: #ffffff;" class="accordion-header" id="headingSlider">
                                                    <button style="background-color: #0b7f46; color: #ffffff;"class="accordion-button" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseSlider"
                                                        aria-expanded="true" aria-controls="collapseSlider">
                                                        📁 slider
                                                    </button>
                                                </h2>
                                                <div id="collapseSlider" class="accordion-collapse collapse"
                                                    aria-labelledby="headingSlider" data-bs-parent="#imgSubAccordion">
                                                    <div class="accordion-body">
                                                        <ul>
                                                            <li>Sleider_4.png</li>
                                                            <li>slider_1.png</li>
                                                            <li>slider_2.png</li>
                                                            <li>slider_3.png</li>
                                                            <li>slider_5.png</li>
                                                            <li>slider_6.png</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- superior Folder -->
                                            <div class="accordion-item" style="background: #1e1e1e; color: #ffffff;">
                                                <h2  class="accordion-header" id="headingSuperior">
                                                    <button style="background-color: #0b7f46; color: #ffffff;" class="accordion-button" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseSuperior"
                                                        aria-expanded="true" aria-controls="collapseSuperior">
                                                        📁 superior
                                                    </button>
                                                </h2>
                                                <div id="collapseSuperior" class="accordion-collapse collapse"
                                                    aria-labelledby="headingSuperior" data-bs-parent="#imgSubAccordion">
                                                    <div class="accordion-body">
                                                        <ul>
                                                            <li>antebrazo.png</li>
                                                            <li>Biceps.webp</li>
                                                            <li>espalda.webp</li>
                                                            <li>hombros.webp</li>
                                                            <li>pecho.webp</li>
                                                            <li>triceps.png</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Root-level img Files -->
                                            <ul class="mt-3">
                                                <li>Add.png</li>
                                                <li>bg4.jpg</li>
                                                <li>cookies-5614898_1280.jpg</li>
                                                <li>DEFINIDAS.jpg</li>
                                                <li>desktop.ini</li>
                                                <li>ESPALDA.webp</li>
                                                <li>gym-5977600_1280.jpg</li>
                                                <li>GYM.png</li>
                                                <li>habitos.webp</li>
                                                <li>index.png</li>
                                                <li>kettlebell-3293475_1280.jpg</li>
                                                <li>man-2264825_1280.jpg</li>
                                                <li>mision.png</li>
                                                <li>plan_habitos.jpg</li>
                                                <li>training-828726_1280.jpg</li>
                                                <li>tren s.jpg</li>
                                                <li>Tren-Inferior.png</li>
                                                <li>user.png</li>
                                                <li>valores.jpg</li>
                                                <li>vision.png</li>
                                                <li>WhatsApp Image 2024-09-06 at 11.29.41 AM.jpeg</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="accordion" id="jsAccordion">
                            <!-- js Folder -->
                            <div class="accordion-item"  style="background: #1e1e1e; color: #ffffff;">
                                <h2 class="accordion-header" id="headingJs">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" style="background-color: #0b7f46; color: #ffffff;"
                                        data-bs-target="#collapseJs" aria-expanded="true" aria-controls="collapseJs">
                                        📁 js
                                    </button>
                                </h2>
                                <div id="collapseJs" class="accordion-collapse collapse " aria-labelledby="headingJs"
                                    data-bs-parent="#jsAccordion">
                                    <div class="accordion-body">
                                        <div class="accordion" id="jsSubAccordion">
                                            <!-- Adm Folder -->
                                            <div class="accordion-item"  style="background: #1e1e1e; color: #ffffff;">
                                                <h2 class="accordion-header" id="headingAdmJs">
                                                    <button class="accordion-button" type="button" style="background-color: #0b7f46; color: #ffffff;"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseAdmJs"
                                                        aria-expanded="true" aria-controls="collapseAdmJs">
                                                        📁 Adm
                                                    </button>
                                                </h2>
                                                <div id="collapseAdmJs" class="accordion-collapse collapse "
                                                    aria-labelledby="headingAdmJs" data-bs-parent="#jsSubAccordion">
                                                    <div class="accordion-body">
                                                        <ul>
                                                            <li>Listado.js</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- instructor Folder -->
                                            <div class="accordion-item"  style="background: #1e1e1e; color: #ffffff;">
                                                <h2 class="accordion-header" id="headingInstructorJs">
                                                    <button class="accordion-button" type="button" style="background-color: #0b7f46; color: #ffffff;"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseInstructorJs"
                                                        aria-expanded="true" aria-controls="collapseInstructorJs">
                                                        📁 instructor
                                                    </button>
                                                </h2>
                                                <div id="collapseInstructorJs" class="accordion-collapse collapse"
                                                    aria-labelledby="headingInstructorJs"
                                                    data-bs-parent="#jsSubAccordion">
                                                    <div class="accordion-body">
                                                        <ul>
                                                            <li>LeerQR.js</li>
                                                            <li>Listado.js</li>
                                                            <li>qrCode.min.js</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- usuarios Folder -->
                                            <div class="accordion-item"  style="background: #1e1e1e; color: #ffffff;">
                                                <h2 class="accordion-header" id="headingUsuariosJs">
                                                    <button class="accordion-button" type="button" style="background-color: #0b7f46; color: #ffffff;"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseUsuariosJs"
                                                        aria-expanded="true" aria-controls="collapseUsuariosJs">
                                                        📁 usuarios
                                                    </button>
                                                </h2>
                                                <div id="collapseUsuariosJs" class="accordion-collapse collapse"
                                                    aria-labelledby="headingUsuariosJs"
                                                    data-bs-parent="#jsSubAccordion">
                                                    <div class="accordion-body">
                                                        <ul>
                                                            <li>Apartar_cupos.js</li>
                                                            <li>Configuracion_user.js</li>
                                                            <li>Generar_Qr.js</li>
                                                            <li>imc.js</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Root-level JS Files -->
                                            <ul class="mt-3">
                                                <li>Bienvenida.js</li>
                                                <li>enlistar.js</li>
                                                <li>script.js</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion" id="pagesAccordion"  style="background: #1e1e1e; color: #ffffff;">
                            <!-- paginas Folder -->
                            <div class="accordion-item"  style="background: #1e1e1e; color: #ffffff;">
                                <h2 class="accordion-header" id="headingPaginas">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" style="background-color: #0b7f46; color: #ffffff;"
                                        data-bs-target="#collapsePaginas" aria-expanded="true"
                                        aria-controls="collapsePaginas">
                                        📁 paginas
                                    </button>
                                </h2>
                                <div id="collapsePaginas" class="accordion-collapse collapse "
                                    aria-labelledby="headingPaginas" data-bs-parent="#pagesAccordion">
                                    <div class="accordion-body" >
                                        <div class="accordion" id="paginasSubAccordion">
                                            <!-- Administrador Folder -->
                                            <div class="accordion-item" style="background-color: #1e1e1e; color: #ffffff;">
                                                <h2 class="accordion-header" id="headingAdministrador">
                                                    <button class="accordion-button" type="button" style="background-color: #0b7f46; color: #ffffff;"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseAdministrador" aria-expanded="true"
                                                        aria-controls="collapseAdministrador">
                                                        📁 Administrador
                                                    </button>
                                                </h2>
                                                <div id="collapseAdministrador" class="accordion-collapse collapse "
                                                    aria-labelledby="headingAdministrador"
                                                    data-bs-parent="#paginasSubAccordion">
                                                    <div class="accordion-body">
                                                        <ul>
                                                            <li>activar_afiliados.php</li>
                                                            <li>actividades.php</li>
                                                            <li>asignar_instructor.php</li>
                                                            <li>capacidad.php</li>
                                                            <li>enlistar.php</li>
                                                            <li>perfil.php</li>
                                                            <li>registrar.php</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- index Folder -->
                                            <div class="accordion-item"  style="background: #1e1e1e; color: #ffffff;">
                                                <h2 class="accordion-header" id="headingIndexPaginas">
                                                    <button class="accordion-button" type="button" style="background-color: #0b7f46; color: #ffffff;"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseIndexPaginas"
                                                        aria-expanded="true" aria-controls="collapseIndexPaginas">
                                                        📁 index
                                                    </button>
                                                </h2>
                                                <div id="collapseIndexPaginas" class="accordion-collapse collapse"
                                                    aria-labelledby="headingIndexPaginas"
                                                    data-bs-parent="#paginasSubAccordion">
                                                    <div class="accordion-body">
                                                        <ul>
                                                            <li>NuevaContrasena.php</li>
                                                            <li>Olvidecontraseña.php</li>
                                                            <li>Verificacion_correo.php</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- instructor Folder -->
                                            <div class="accordion-item"  style="background: #1e1e1e; color: #ffffff;">
                                                <h2 class="accordion-header" id="headingInstructorPaginas">
                                                    <button class="accordion-button" type="button" style="background-color: #0b7f46; color: #ffffff;"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseInstructorPaginas" aria-expanded="true"
                                                        aria-controls="collapseInstructorPaginas">
                                                        📁 instructor
                                                    </button>
                                                </h2>
                                                <div id="collapseInstructorPaginas" class="accordion-collapse collapse"
                                                    aria-labelledby="headingInstructorPaginas"
                                                    data-bs-parent="#paginasSubAccordion">
                                                    <div class="accordion-body">
                                                        <ul>
                                                            <li>leer_qr.php</li>
                                                            <li>listar.php</li>
                                                            <li>perfil.php</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- usuarios Folder -->
                                            <div class="accordion-item"  style="background: #1e1e1e; color: #ffffff;">
                                                <h2 class="accordion-header" id="headingUsuariosPaginas">
                                                    <button class="accordion-button" type="button"  style="background: #0b7f46; color: #ffffff;"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseUsuariosPaginas" aria-expanded="true"
                                                        aria-controls="collapseUsuariosPaginas">
                                                        📁 usuarios
                                                    </button>
                                                </h2>
                                                <div id="collapseUsuariosPaginas" class="accordion-collapse collapse"
                                                    aria-labelledby="headingUsuariosPaginas"
                                                    data-bs-parent="#paginasSubAccordion">
                                                    <div class="accordion-body">
                                                        <ul>
                                                            <li>apartar_cupos.php</li>
                                                            <li>Configuracion.php</li>
                                                            <li>imc.php</li>
                                                            <li>qr.php</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- view Folder -->
                                            <div class="accordion-item"  style="background: #1e1e1e; color: #ffffff;">
                                                <h2 class="accordion-header" id="headingViewPaginas">
                                                    <button class="accordion-button" type="button" style="background-color: #0b7f46; color: #ffffff;"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseViewPaginas"
                                                        aria-expanded="true" aria-controls="collapseViewPaginas">
                                                        📁 view
                                                    </button>
                                                </h2>
                                                <div id="collapseViewPaginas" class="accordion-collapse collapse"
                                                    aria-labelledby="headingViewPaginas"
                                                    data-bs-parent="#paginasSubAccordion">
                                                    <div class="accordion-body">
                                                        <ul>
                                                            <li>bienvenida.php</li>
                                                            <li>habitos.php</li>
                                                            <li>predefinidas.php</li>
                                                            <li>rutinas.php</li>
                                                            <li>tren_inferior.php</li>
                                                            <li>tren_superior.php</li>
                                                            <li>valores.php</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion" id="fileAccordion"  style="background: #1e1e1e; color: #ffffff;">
                            <!-- PHP Folder -->
                            <div class="accordion-item"  style="background: #1e1e1e; color: #ffffff;">
                                <h2 class="accordion-header" id="headingPhp">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" style="background-color: #0b7f46; color: #ffffff;"
                                        data-bs-target="#collapsePhp" aria-expanded="true" aria-controls="collapsePhp">
                                        📁 php
                                    </button>
                                </h2>
                                <div id="collapsePhp" class="accordion-collapse collapse" aria-labelledby="headingPhp"
                                    data-bs-parent="#fileAccordion">
                                    <div class="accordion-body">
                                        <div class="accordion" id="phpSubAccordion">
                                            <!-- Adm Folder -->
                                            <div class="accordion-item"  style="background: #1e1e1e; color: #ffffff;">
                                                <h2 class="accordion-header" id="headingAdm">
                                                    <button class="accordion-button" type="button" style="background-color: #0b7f46; color: #ffffff;"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseAdm"
                                                        aria-expanded="true" aria-controls="collapseAdm">
                                                        📁 Adm
                                                    </button>
                                                </h2>
                                                <div id="collapseAdm" class="accordion-collapse collapse"
                                                    aria-labelledby="headingAdm" data-bs-parent="#phpSubAccordion">
                                                    <div class="accordion-body">
                                                        <ul>
                                                            <li>asignar_instructor.php</li>
                                                            <li>Buscar.php</li>
                                                            <li>capacidad.php</li>
                                                            <li>Listar.php</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- index Folder -->
                                            <div class="accordion-item"  style="background: #1e1e1e; color: #ffffff;">
                                                <h2 class="accordion-header" id="headingIndex">
                                                    <button class="accordion-button" type="button" style="background-color: #0b7f46; color: #ffffff;"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseIndex"
                                                        aria-expanded="true" aria-controls="collapseIndex">
                                                        📁 index
                                                    </button>
                                                </h2>
                                                <div id="collapseIndex" class="accordion-collapse collapse"
                                                    aria-labelledby="headingIndex" data-bs-parent="#phpSubAccordion">
                                                    <div class="accordion-body">
                                                        <ul>
                                                            <li>cerrar_sesion.php</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Instructor Folder -->
                                            <div class="accordion-item"  style="background: #1e1e1e; color: #ffffff;">
                                                <h2 class="accordion-header" id="headingInstructor">
                                                    <button class="accordion-button" type="button" style="background-color: #0b7f46; color: #ffffff;"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseInstructor"
                                                        aria-expanded="true" aria-controls="collapseInstructor">
                                                        📁 Instructor
                                                    </button>
                                                </h2>
                                                <div id="collapseInstructor" class="accordion-collapse collapse"
                                                    aria-labelledby="headingInstructor"
                                                    data-bs-parent="#phpSubAccordion">
                                                    <div class="accordion-body">
                                                        <ul>
                                                            <li>Listar.php</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- usuario Folder -->
                                            <div class="accordion-item"  style="background: #1e1e1e; color: #ffffff;">
                                                <h2 class="accordion-header" id="headingUsuario">
                                                    <button class="accordion-button" type="button" style="background-color: #0b7f46; color: #ffffff;"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseUsuario"
                                                        aria-expanded="true" aria-controls="collapseUsuario">
                                                        📁 usuario
                                                    </button>
                                                </h2>
                                                <div id="collapseUsuario" class="accordion-collapse collapse"
                                                    aria-labelledby="headingUsuario" data-bs-parent="#phpSubAccordion">
                                                    <div class="accordion-body">
                                                        <ul>
                                                            <li>Actualizar_cupos.php</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- PHP Files -->
                                            <ul>
                                                <li>Activacion.php</li>
                                                <li>Activar_Afiliado.php</li>
                                                <li>Actividad.php</li>
                                                <li>Actualizar_Contraseña.php</li>
                                                <li>Capacidad.php</li>
                                                <li>Conexion_bc.php</li>
                                                <li>Conexion_json.php</li>
                                                <li>Cupos.php</li>
                                                <li>destruir_sesion.php</li>
                                                <li>Eliminar_cuenta.php</li>
                                                <li>Generar_qr.php</li>
                                                <li>Instrcutor.php</li>
                                                <li>Leer_QR.php</li>
                                                <li>Login.php</li>
                                                <li>perfil.php</li>
                                                <li>Registros_usuarios.php</li>
                                                <li>Sancion.php</li>
                                                <li>seguimientos.php</li>
                                                <li>Validar_usuario.php</li>
                                                <li>vendor_Recuperarcontraseña.php</li>
                                                <li>vendor_validar.php</li>
                                                <li>Verificacion_fechas.php</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- sonido Folder -->
                            <div class="accordion-item"  style="background: #1e1e1e; color: #ffffff;">
                                <h2 class="accordion-header" id="headingSonido">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSonido" aria-expanded="false" style="background-color: #0b7f46; color: #ffffff;"
                                        aria-controls="collapseSonido">
                                        📁 sonido
                                    </button>
                                </h2>
                                <div id="collapseSonido" class="accordion-collapse collapse"
                                    aria-labelledby="headingSonido" data-bs-parent="#fileAccordion">
                                    <div class="accordion-body">
                                        <ul>
                                            <li>sonido.mp3</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- vendor Folder -->
                            <div class="accordion-item"  style="background: #1e1e1e; color: #ffffff;">
                                <h2 class="accordion-header" id="headingVendor">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseVendor" aria-expanded="false" style="background-color: #0b7f46; color: #ffffff;"
                                        aria-controls="collapseVendor">
                                        📁 vendor
                                    </button>
                                </h2>
                                <div id="collapseVendor" class="accordion-collapse collapse"
                                    aria-labelledby="headingVendor" data-bs-parent="#fileAccordion">
                                    <div class="accordion-body">
                                        <div class="accordion" id="vendorSubAccordion">
                                            <!-- composer Folder -->
                                            <div class="accordion-item"  style="background: #1e1e1e; color: #ffffff;">
                                                <h2 class="accordion-header" id="headingComposer">
                                                    <button class="accordion-button" type="button" style="background-color: #0b7f46; color: #ffffff;"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseComposer"
                                                        aria-expanded="true" aria-controls="collapseComposer">
                                                        📁 composer
                                                    </button>
                                                </h2>
                                                <div id="collapseComposer" class="accordion-collapse collapse "
                                                    aria-labelledby="headingComposer"
                                                    data-bs-parent="#vendorSubAccordion">
                                                    <div class="accordion-body">
                                                        <ul>
                                                            <li>autoload_classmap.php</li>
                                                            <li>autoload_namespaces.php</li>
                                                            <li>autoload_psr4.php</li>
                                                            <li>autoload_real.php</li>
                                                            <li>autoload_static.php</li>
                                                            <li>ClassLoader.php</li>
                                                            <li>installed.json</li>
                                                            <li>installed.php</li>
                                                            <li>InstalledVersions.php</li>
                                                            <li>LICENSE</li>
                                                            <li>platform_check.php</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- phpmailer Folder -->
                                            <div class="accordion-item"  style="background: #1e1e1e; color: #ffffff;">
                                                <h2 class="accordion-header" id="headingPhpmailer">
                                                    <button class="accordion-button" type="button" style="background-color: #0b7f46; color: #ffffff;"
                                                        data-bs-toggle="collapse" data-bs-target="#collapsePhpmailer"
                                                        aria-expanded="true" aria-controls="collapsePhpmailer">
                                                        📁 phpmailer
                                                    </button>
                                                </h2>
                                                <div id="collapsePhpmailer" class="accordion-collapse collapse "
                                                    aria-labelledby="headingPhpmailer"
                                                    data-bs-parent="#vendorSubAccordion">
                                                    <div class="accordion-body">
                                                        <ul>
                                                            <li style="background-color: #0b7f46; color: #ffffff;">📁 .git</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Continue with other main folders: js, paginas, php, sonido, vendor -->

                        <div class="accordion-item"  style="background: #1e1e1e; color: #ffffff;">
                            <h2 class="accordion-header" id="headingGitignore">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseGitignore" aria-expanded="false" style="background-color: #0b7f46; color: #ffffff;"
                                    aria-controls="collapseGitignore">
                                    .gitignore
                                </button>
                            </h2>
                            <div id="collapseGitignore" class="accordion-collapse collapse"  style="background: #1e1e1e; color: #ffffff;"
                                aria-labelledby="headingGitignore" data-bs-parent="#gymUpcAccordion">
                                <div class="accordion-body">
                                    <p>Archivo .gitignore</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item"  style="background: #1e1e1e; color: #ffffff;">
                            <h2 class="accordion-header" id="headingIndex">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" style="background-color: #0b7f46; color: #ffffff;"
                                    data-bs-target="#collapseIndex" aria-expanded="false" aria-controls="collapseIndex">
                                    index.php
                                </button>
                            </h2>
                            <div id="collapseIndex" class="accordion-collapse collapse" aria-labelledby="headingIndex"  style="background: #1e1e1e; color: #ffffff;"
                                data-bs-parent="#gymUpcAccordion">
                                <div class="accordion-body">
                                    <p>Archivo principal index.php</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="background: #1e1e1e; color: #ffffff;">
                    <button type="button" class="btn btn-secondary" style="background-color: #0b7f46; color: #ffffff;" data-bs-dismiss="modal">Cerrar</button>                    
                </div>
            </div>
        </div>
    </div>
    <!-- Fin del Arbol de menú -->
      <!-- Logo -->
      <div class="container">
        <div class="d-flex" style="z-index: 1000; position: fixed; top: 5px; margin-top: 0; padding: 0; left: 10px;  width: 25%;   ">
          <img id="logo" style=" display: block;" src="../../img/logo/Logo.png" alt="Logo" width="50%" title="Logo" />
        </div>
        <div class="d-flex" style="z-index: 1000; position: fixed; top: 25px; left: 0px; width: 30%; ">
          <img id="logo_2" src="../../img/logo/Logo.png" alt="Logo" style="left: auto; width: 30%; display: none" title="Logo" />
        </div>

      </div>
      <!-- Fin posicion del logo -->
      <!-- Linea de nombre -->
      <div class="container" style="margin-top: 80px; ">
        <div id="nombre" class="d-flex Bienvenida" style="display: block;">
          <p>
          <h1 id="x2">Bienvenido, <?php echo $nombre ?></h1>
          </p>
        </div>
        <!-- Fin de linea de nombre -->
        <br>
      </div>
      <!-- Inicio Carrusel -->
      <div class="container " style=" padding:0; margin-top:80px;">
        <div class="carrusel">
          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="../../img/slider/slider_1.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="../../img/slider/slider_2.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="../../img/slider/slider_3.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="../../img/slider/Sleider_4.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="../../img/slider/slider_5.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="../../img/slider/slider_6.png" class="d-block w-100" alt="...">
              </div>
            </div>
          </div>
          <div class="button">
            <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next " type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          <!-- Fin del carrusel -->
        </div>
      </div>
      <br><br><br>
      <div class="container">
        <div class="container">
          <center>
            <h1 style="color:#ffffff">DESCUBRE</h1>
          </center>
        </div>
        <div class="planes">
          <div class="row">
            <div class="col-md-6">
              <a href="../view/rutinas.php">
                <div class="fondo_rutinas">
                  <div class="nombre">RUTINAS</div>
                </div>
              </a>
            </div>
            <div class="col-md-6">
              <a href="../view/habitos.php">
                <div class="fondo_habitos">
                  <div class="color">
                    <div class="nombre">PLAN HABITOS</div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
        <br><br> <br><br><br><br><br>
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