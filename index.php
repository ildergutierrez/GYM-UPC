<?php
session_start();

if (isset($_SESSION['usuario'])) {
    header("location: bienvenida.php");
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GYM UPC</title>
    <link rel="icon" href="img/logo/Logo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet" />
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        rel="stylesheet" />
    <link rel="stylesheet" href="assets/boostrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/estilos.css" />
</head>
<style>
    /* Para navegadores basados en WebKit (Chrome, Safari) */
    ::-webkit-scrollbar {
        display: none;
    }

    html {
        scrollbar-width: none;
    }

    body {
        overflow: auto;
    }
</style>

<body>

    <main>
        <div id="Iniciar" class="container" style="margin-top: 0px; ">
            <!--Inicio de sesión  -->
            <div class="row" style=" border-radius: 15px; overflow: hidden;">
                <div class="col-sm-6" style="background: #121A1C;">
                    <div class="oscuro" id="logo">
                        <br><br>
                        <center>
                            <h1>LOGIN</h1>
                            <img src="img/logo/Logo.png" alt="Logo" width="40%">
                            <br><br>
                            <a type="button" onclick="inicio()" class="btn btn" style="background: #0B7F46; color: #ffffff; font-weight: bold; width: 80%">Registrate</a>
                            <br><br>
                            <p>¿Aun no tienes una cuenta en GYM UPC?</p>
                            <br><br>
                        </center>
                    </div>
                </div>
                <div class="col-sm-6" style="color: #000000; background: #E5E5E5; padding-left: 50px; padding-right: 50px;">
                    <br>
                    <form action="" method="$_POST" class="entrada">
                        <center>
                            <div style="background: #121A1C; border-radius: 100%; width: 30%; padding: 0;">
                                <img src="img/user.png" alt="Icono" width="100%">
                            </div> <br> <label class="form-control" style=" text-align: left; background: transparent; padding: 0; border: none;">Correo *</label>
                            <div class="input-group mb-3">
                                <input type="email" name="correo" required class="form-control" aria-label="Text input with checkbox">
                                <div class="input-group-text" style="background: #121A1C; color: #E5E5E5;">
                                    <span class="material-symbols-outlined">
                                        mail
                                    </span>
                                </div>
                            </div> <label class="form-control" style=" text-align: left; background: transparent; padding: 0; border: none;">Contraseña *</label>
                            <div style="padding: 0;" class="input-group mb-3">
                                <input id="password" name="password" type="password" required class="form-control">
                                <button style="background: transparent; padding: 0; border: none;">
                                    <div id="ver" onclick="contraseña()" class="input-group-text" style="background: #121A1C; color: #E5E5E5; display: block;">
                                        <span class="material-symbols-outlined" style="vertical-align: middle;"> visibility_off </span>
                                    </div>
                                    <div id="no_ver" onclick="contraseña()" class="input-group-text" style="background: #121A1C; color: #E5E5E5; display: none;">
                                        <span class="material-symbols-outlined">
                                            visibility
                                        </span>
                                    </div>
                                </button>
                            </div>
                            <button class="btn btn" style="background: #0B7F46; color: #ffffff; font-weight: bold; width: 100%">Iniciar Sesión</button>
                            <br><br>
                            <p>He olvidado mi contraseña <a href="" style="text-decoration: none; color: #0B7F46;">Click Aqui</a></p>
                            <br><br>
                        </center>
                    </form>
                </div>

            </div>
            <!-- fin inicio -->

        </div>
        <div id="Registro" class="container" style="display: none; margin-top: 0px; ">
            <!--Registro  -->
            <div class="row" style=" border-radius: 15px; overflow: hidden;">
                <div class="col-sm-6" style="background: #121A1C;">
                    <div class="oscuro">
                        <br><br>
                        <center>
                            <h1>REGISTRO</h1> <br><br>
                            <img src="img/logo/Logo.png" alt="Logo" width="50%">
                            <br><br> <br><br>
                            <a type="button" onclick="inicio()" class="btn btn" style="background: #0B7F46; color: #ffffff; font-weight: bold; width: 80%">Iniciar Sesión</a>
                            <br><br>
                            <p>¿Ya tienes una cuenta activa?</p>
                            <br><br>
                        </center>
                    </div>
                </div>
                <div class="col-sm-6 " style="color: #000000; background: #E5E5E5; padding-left: 30px; padding-right: 50px;">
                    <br>
                    <form action="" method="$_POST" class="entrada">

                        <div style="background: #121A1C; margin: auto; border-radius: 100%; width: 30%; padding: 0; overflow: hidden;">
                            <img src="img/Add.png" alt="Icono" width="100%">
                        </div>
                        <!-- documento -->
                        <label class="form-control" style=" text-align: left; background: transparent; padding: 0; border: none; font-size: 12px;">Documento * </label>
                        <div class="input-group mb-3">
                            <input style="height: 26px;" type="text" name="documento" id="numeroIdentidad" required class="form-control" aria-label="Text input with checkbox">
                            <div class="input-group-text" style=" height: 26px; background: #121A1C; color: #E5E5E5;">
                                <span class="material-symbols-outlined">
                                    tag
                                </span>
                            </div>
                        </div>
                        <!-- nombre -->
                        <label class="form-control" style=" text-align: left; background: transparent; padding: 0; border: none; font-size: 12px;">Nombre Completo* </label>
                        <div class="input-group mb-3">
                            <input style="height: 26px;" type="text" name="nombre" required class="form-control" aria-label="Text input with checkbox">
                            <div class="input-group-text" style=" height: 26px; background: #121A1C; color: #E5E5E5;">
                                <span class="material-symbols-outlined">
                                    person
                                </span>
                            </div>
                        </div>
                        <!-- Correo -->
                        <label class="form-control" style=" text-align: left; background: transparent; padding: 0; border: none; font-size: 12px;">Correo Institucional* </label>
                        <div class="input-group mb-3">
                            <input style="height: 26px;" type="email" name="correo" required class="form-control" aria-label="Text input with checkbox">
                            <div class="input-group-text" style=" height: 26px; background: #121A1C; color: #E5E5E5;">
                                <span class="material-symbols-outlined"> alternate_email </span>
                            </div>
                        </div>
                        <!-- Celular -->
                        <label class="form-control" style=" text-align: left; background: transparent; padding: 0; border: none; font-size: 12px;">Celular* </label>
                        <div class="input-group mb-3">
                            <input style="height: 26px;" id="numerocel" name="celular" type="text" required class="form-control" aria-label="Text input with checkbox">
                            <div class="input-group-text" style=" height: 26px; background: #121A1C; color: #E5E5E5;">
                                <span class="material-symbols-outlined"> smartphone </span>
                            </div>
                        </div>
                        <!-- Contraseña -->
                        <label class="form-control" style=" text-align: left; background: transparent; padding: 0; border: none;">Contraseña *</label>
                        <div style="padding: 0;" class="input-group mb-3 d-flex">
                            <input id="contra" name="password" style="height: 30px;" type="password" required class="form-control">
                            <button onclick="R_contraseña()" style="background: transparent; padding: 0; border: none;">
                                <div id="Remplazo" class="input-group-text" style="background: #121A1C; color: #E5E5E5; display: block;  height: 30px;">
                                    <span style="vertical-align: middle;height: 26px;" class="material-symbols-outlined"> visibility_off </span>
                                </div>
                                <div id="Remplazo2" class="input-group-text" style="background: #121A1C; color: #E5E5E5; display: none; height: 30px;">
                                    <span class="material-symbols-outlined" style="vertical-align: middle; height: 26px;"> visibility </span>
                                </div>

                            </button>
                        </div>
                        <!-- Sede -->
                        <label class="form-control" style=" text-align: left; background: transparent; padding: 0; border: none; font-size: 12px;">Sede * </label>
                        <div class="row">
                            <div class="row -md-3 d-flex align-items-center justify-content-center ">
                                <div class="col-6">
                                    <div class="row ">
                                        <div class="col-2">
                                            <input type="radio" required name="sede" style="margin-top: 0;" value="1">
                                        </div>&ensp; Aguachica
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-2">
                                            <input type="radio" name="sede" required style="margin-top: 0;" value="0">
                                        </div>&ensp; Valledupar

                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- Genero -->
                        <label class="form-control" style=" text-align: left; background: transparent; padding: 0; border: none; font-size: 12px;">Genero * </label>
                        <div class="row -md-3 d-flex align-items-center justify-content-center " style="font-size: 14px;">
                            <div class="col-4">
                                <div class="row" title="Masculino">
                                    <div class="col-2">
                                        <input type="radio" required name="op" style="margin-top: 0; padding: 0;" value="0">
                                    </div> &ensp; M
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="row " title="Femenino">
                                    <div class="col-2">
                                        <input type="radio" required name="op" style="margin-top: 0; padding: 0;" value="1">
                                    </div> &emsp; F
                                </div>
                            </div>
                            <div class="col">
                                <div class="row " title="No Aplica/ No especificar">
                                    <div class="col-2">
                                        <input type="radio" required name="op" style="margin-top: 0;" value="2">
                                    </div>&ensp; NA
                                </div>
                            </div>
                        </div>
                        <br> <br>
                        <center>
                            <button class="btn btn" style="background: #0B7F46; color: #ffffff; font-weight: bold; width: 100%">Registrate</button>
                            <br><br>
                            <br><br>
                        </center>
                    </form>
                </div>

            </div>
            <!-- fin Registro -->

        </div>
        <br><br>
    </main>
    <footer>
        <div
            class="container-fluid"
            style=" background-color: #0b7f46;  padding-top: 10px;  padding-bottom: 10px;  border-top: solid 4px #ffcc53; position: fixed;   bottom: 0;">
            <div class="row">
                <div class="col-8" style="color: #ffffff; text-align: end">
                    <h6>
                        © copyright: Universidad Popular del Cesar, seccional Aguachica
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

    <script>
        document.getElementById('numeroIdentidad').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
        document.getElementById('numerocel').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    </script>
    <script src="assets/js/script.js"></script>
</body>

</html>