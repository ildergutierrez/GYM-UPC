<?php
session_start();
// if (!isset($_SESSION['email'])) {
//   header('Location: ../index.php');
// }
// $rol = $_SESSION['rol'];
$rol = 3;
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
                      <p>Ilder Alberto Gutierrez Beleño</p>&ensp;
                    </div>
                    <div class="dropdown" style="color: #000000">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                      <ul class="dropdown-menu dropdown-menu-end"
                        aria-labelledby="navbarDropdown">
                        <li>
                          <a class="dropdown-item" href="../usuarios/Configuracion.php"> <span class="material-symbols-outlined" style="vertical-align: middle;"> person_outline </span> &ensp; Perfil</a>
                        </li>
                        <li>
                          <a class="dropdown-item" href="#"> <span class="material-symbols-outlined" style="vertical-align: middle;"> logout </span> &ensp;
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
                      <p>Ilder Alberto Gutierrez Beleño</p> &ensp;
                    </div>
                    <div class="dropdown" style="color: #000000">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                      <ul class="dropdown-menu dropdown-menu-end"
                        aria-labelledby="navbarDropdown">
                        <li>
                          <a class="dropdown-item" href="../instructor/perfil.php"> <span class="material-symbols-outlined" style="vertical-align: middle;"> person_outline </span> &ensp; Perfil</a>
                        </li>
                        <li>
                          <a class="dropdown-item" href="#"> <span class="material-symbols-outlined" style="vertical-align: middle;"> logout </span> &ensp;
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
                        <a class="dropdown-item" href="#"> <span class="material-symbols-outlined" style="vertical-align: middle;"> logout </span> &ensp;
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
        <div class="d-flex" style="z-index: 1000; position: fixed; top: 25px; left: 40px; width: 20%; ">
          <img id="logo_2" src="../../img/logo/Logo.png" alt="Logo" style="width: 25%; display: none" title="Logo" />
        </div>
      </div>
      <!-- Fin posicion del logo -->
      <!-- Linea de nombre -->
      <div class="container" style="margin-top: 80px; ">
        <div id="nombre" class="d-flex Bienvenida" style="display: block;">
          <p>
          <h1 id="x2">Bienvenido. Ilder Alberto Gutierrez Beleño</h1>
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
        <br><br>
    </main>
    <footer>
      <div class="container-fluid" style="width: 100%;  background-color: #0b7f46;  padding-top: 25px;  padding-bottom: 25px;  border-top: solid 4px #ffcc53;  bottom: 0; ">
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
                href="https://www.facebook.com"
                target="_blank"
                style="color: #ffffff; margin-right: 16px">
                <i class="fab fa-facebook-f"></i>
              </a>

              <!-- Twitter -->
              <a
                href="https://www.twitter.com"
                target="_blank"
                style="color: #ffffff; margin-right: 16px">
                <i class="fab fa-twitter"></i>
              </a>

              <!-- Instagram -->
              <a
                href="https://www.instagram.com"
                target="_blank"
                style="color: #ffffff; margin-right: 16px">
                <i class="fab fa-instagram"></i>
              </a>

              <!-- LinkedIn -->
              <a
                href="https://www.linkedin.com"
                target="_blank"
                style="color: #ffffff; margin-right: 16px">
                <i class="fab fa-linkedin-in"></i>
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