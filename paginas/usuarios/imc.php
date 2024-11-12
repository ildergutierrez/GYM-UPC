<?php
session_start();
if (isset($_SESSION['nombre']) && isset($_SESSION['documento']) && isset($_SESSION['rol']) && isset($_SESSION['estado']) && isset($_SESSION['Email'])) {
    if ($_SESSION['rol'] != '3') {
        header('Location: ../view/bienvenida.php');
    }
    $nombre = $_SESSION['nombre'];
} else {
    header('Location: ../../index.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IMC</title>
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
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
    <link rel="stylesheet" href="../../css/imc.css" />
    <link rel="icon" href="../../img/logo/Logo.png" />
</head>
<body style="background: #1e1e1e">
    <div class="container-fluid" style="padding: 0; ">
        <!-- Modal -->
        <div class="modal fade" id="miModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="background: #121A1C; color: #E5E5E5;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Alerta</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5>Por favor, introduce valores válidos para peso y altura.</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" style="background: #0b7f46;" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
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
                                <a class="nav-link" href="apartar_cupos.php" style="color: #ffffff; padding-right: 30px; font-weight: bold;  "><span class="material-icons" style="vertical-align: middle">calendar_month</span> APARTAR CUPO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="qr.php" style="color: #ffffff; padding-right: 30px; font-weight: bold"><span class="material-icons" style="vertical-align: middle">qr_code</span> QR</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" style="color: #ffffff; padding-right: 30px; font-weight: bold; border-bottom: solid 4px #ffcc53;"><span class="material-symbols-outlined" style="vertical-align: middle">cardiology</span>
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
                                        <p><?php  echo $nombre ?></p> &ensp;
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
                <div class="d-flex" style="z-index: 1000; position: fixed; top: 25px; left: 40px; width: 10%; ">
                    <img id="logo_2" src="../../img/logo/Logo.png" alt="Logo" style="width: 25%; display: none" title="Logo" />
                </div>
            </div>
            <!-- Fin posicion del logo -->
            <!-- Linea de nombre -->
            <div class="container" style="margin-top: 80px; ">
                <div id="nombre" class="d-flex Bienvenida" style="display: block;">
                    <p>
                    <h1 id="x2">IMC (Indice de Masa Corporal)</h1>
                    </p>
                </div>
                <!-- Fin de linea de nombre -->
                <br>
            </div>
            <!-- Formulario -->
            <div class="formulario">
                <div class="row">
                    <div class="col-md-6" title="Peso en Kg">
                        <!-- Peso -->
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label" style="color: #FFFFFF;">Peso * </label>
                            <div class="input-group-text" style="background: #121A1C; padding: 0; margin: 0; width: 90%; overflow: hidden; border-radius: 5px; border: solid 1px #ffffff;">
                                <input type="text" id="peso" style="width: 90%; border-radius: 0;" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <div style=" color: #E5E5E5;  width: 10%;">
                                    <span class="material-symbols-outlined" style=" font-size: 24px;">
                                        weight
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Altura -->
                        <div class="mb-3" title="Altura en Metro">
                            <label for="exampleInputEmail1" class="form-label" style="color: #FFFFFF;">Altura * </label>
                            <div class="input-group-text" style="background: #121A1C; padding: 0; margin: 0; width: 90%; overflow: hidden; border-radius: 5px; border: solid 1px #ffffff;">
                                <input type="text" id="altura" style="width: 90%; border-radius: 0;" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <div style=" color: #E5E5E5;  width: 10%;">
                                    <span class="material-symbols-outlined" style=" font-size: 24px;">
                                        measuring_tape
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <center> <a onclick="Calcular(document.getElementById('altura').value, document.getElementById('peso').value)" class="btn btn-success calcular">Calcular</a>
                </center>
            </div>
            <div class="container" id="Resultado" style="display: none; color: #FFFFFF; font-weight: bold; font-family: Poppins;">
                <br>
                <center>
                    <h1 id="valor"></h1>
                </center>
                <br>
                <div class="container-recomendaciones">
                    <div class="cabeza">
                        <center>
                            <h3>Recomendaciones</h3>
                        </center>
                    </div>
                    <div class="row">
                        <div id="imagen" class="col d-flex justify-content-center align-items-center">
                            <center><img src="../../img/habitos.webp" alt="" style=" background-size: cover; width: 100%; border-radius: 20px; padding: 10px;">
                            </center>
                        </div>
                        <div class="col-8">
                            <div id="indice" class="min" style="color: #000000; text-align: justify;  padding: 10px; width: 90%;"></div>
                        </div>
                    </div>
                </div><br><br><br><br>
            </div>
            <br><br><br><br><br> <!-- Fin Formulario -->
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
        <script src="../../js/usuarios/imc.js"></script>
        <script src="../../js/Bienvenida.js"></script>

        <!-- Flatpickr JS -->
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>
            document.getElementById('peso').addEventListener('input', function(e) {
                this.value = this.value.replace(/[^0-9.]/g, '');
            });
            document.getElementById('altura').addEventListener('input', function(e) {
                this.value = this.value.replace(/[^0-9.]/g, '');
            });
        </script>
    </div>
</body>

</html>