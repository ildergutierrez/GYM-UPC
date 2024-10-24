<?php
session_start();
// if (!isset($_SESSION['email'])) {
//   header('Location: ../index.php');
// }
// $rol = $_SESSION['rol'];
$rol = 1;
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
  <link rel="stylesheet" href="../../css/plan.css" />
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
          <h1 id="x2">PLAN DE HABITOS</h1>
          </p>
        </div>
        <!-- Fin de linea de nombre -->
        <br>
      </div>
      <div class="container main">
        <div class="row">
          <div class="col-12" style="background: #0b7f46; font-weight: bold; color: #ffffff;">
            <center>Habitos</center>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <div class="d-flex justify-content-center align-items-center" style="padding: 20px;">
              <img src="../../img/plan_habitos.jpg" alt="" style="width: 100%; border-radius: 10px;">
            </div>
          </div>
          <div class="col-8" style="text-align: justify;">
            <h2><b>1. Alimentación balanceada</b></h2>
            <b>Desayuno:</b> Prioriza proteínas (huevos, yogur griego) y carbohidratos complejos (avena, frutas) para tener energía durante el día.<br>
            <b>Almuerzo:</b> Incluye una buena fuente de proteínas (pollo, pescado, tofu), carbohidratos integrales (arroz integral, quinoa) y vegetales frescos.<br>
            <b>Cena:</b> Opta por comidas ligeras como ensaladas con proteína o sopas de vegetales.<br>
            <b>Snacks saludables:</b> Frutas, frutos secos, batidos de proteínas, barritas saludables.<br>
            <b>Hidratación:</b> Bebe al menos 2 litros de agua al día, especialmente antes y después de los entrenamientos.<br><br>

            <h2><b>2. Sueño reparador</b></h2>
            <b>Horas de sueño:</b> Dormir entre 7 y 9 horas por noche. Esto es esencial para la recuperación muscular y la salud mental.<br>
            <b>Rutina antes de dormir:</b> Apaga dispositivos electrónicos al menos 30 minutos antes de acostarte, para ayudar a tu cuerpo a relajarse.<br><br>

            <h2><b>3. Rutina en el gimnasio</b></h2>
            <b>Días de entrenamiento:</b> 4-5 días a la semana, alternando ejercicios de fuerza y cardiovasculares.<br>
            <b>Entrenamiento de fuerza (3 días a la semana):</b><br>
            <b>Día 1:</b> Pecho y tríceps.<br>
            <b>Día 2:</b> Piernas y abdomen.<br>
            <b>Día 3:</b> Espalda y bíceps.<br>
            <b>Cardio (2 días a la semana):</b> 30-40 minutos de correr, bicicleta o natación.<br>
            <b>Estiramientos:</b> Dedica 10 minutos antes y después del entrenamiento a estirar y mejorar la flexibilidad.<br><br>

            <h2><b>4. Bienestar mental</b></h2>
            <b>Meditación o mindfulness:</b> 10-15 minutos al día de respiración profunda o meditación para reducir el estrés.<br>
            <b>Actividades relajantes:</b> Dedica tiempo a actividades que disfrutes (leer, escuchar música, caminar al aire libre).<br><br>

            <h2><b>5. Seguimiento y motivación</b></h2>
            <b>Objetivos semanales:</b> Establece metas pequeñas como mejorar el tiempo en tu cardio o aumentar el peso en tus ejercicios.<br>
            <b>Diario de entrenamiento:</b> Lleva un registro de tus entrenamientos, alimentación y cómo te sientes cada día.<br>
            <b>Variedad:</b> Cambia la rutina cada 4-6 semanas para evitar el estancamiento.<br><br>

            <h2><b>6. Equilibrio y consistencia</b></h2>
            <b>Día de descanso activo:</b> Realiza actividades de bajo impacto como caminar, hacer yoga o nadar suavemente.<br>
            <b>Evita excesos:</b> No te sobreentrenes; escucha a tu cuerpo para evitar lesiones.<br>
            <br><br>
          </div>
        </div>
      </div>
      <br><br>
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