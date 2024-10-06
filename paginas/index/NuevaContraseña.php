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
    <title>Recuperar Contraseña</title>
    <link rel="icon" href="../../img/logo/Logo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet" />
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        rel="stylesheet" />
    <link rel="stylesheet" href="../../boostrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/estilos Recuperar.css" />
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
                            <h1>Recuperar Cuenta</h1>
                            <img src="../../img/logo/Logo.png" alt="Logo" width="40%">
                            <br><br>
                            <a type="button" class="btn btn" href="../../index.php" style="background: #0B7F46; color: #ffffff; font-weight: bold; width: 80%">Volver</a>
                            <br><br><br><br><br>

                        </center>
                    </div>
                </div>
                <div class="col-sm-6" style="color: #000000; background: #E5E5E5; padding-left: 50px; padding-right: 50px;">
                    <br>
                    <form action="" method="$_POST" class="entrada">
                        <center>
                            <div style="background: #121A1C; border-radius: 100%; width: 30%; padding: 0;">
                                <img src="../../img/user.png" alt="Icono" width="100%">
                            </div> <br> <label class="form-control" style=" text-align: left; background: transparent; padding: 0; border: none;">Contraseña *</label>
                            <div class="input-group mb-3">
                                <input  type="password" name="password" required class="form-control" aria-label="Text input with checkbox">
                                <div class="input-group-text" style="background: #121A1C; color: #E5E5E5; display: block;  height: 36px;">
                                        <span class="material-symbols-outlined span"> key </span>
                                    </div>
                                   
                            </div> <br> <label class="form-control" style=" text-align: left; background: transparent; padding: 0; border: none;"> Confirmar Contraseña *</label>
                            <div class="input-group mb-3" id="CN_password">
                                <input id="cnc" type="password" name="password_1" required class="form-control" aria-label="Text input with checkbox">
                                 <div  class="input-group-text" style="background: #121A1C; color: #E5E5E5; display: block;  height: 36px;">
                                        <span class="material-symbols-outlined span"> key </span>
                                    </div>
                                   
                            </div>
                            <button class="btn btn" style="background: #0B7F46; color: #ffffff; font-weight: bold; width: 100%">Actualizar Información</button>
                            <br><br>
                            <br><br>
                        </center>
                    </form>
                </div>

            </div>
            <!-- fin inicio -->

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
        document.getElementById('codigo').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    </script>
    <script src="../../js/script.js"></script>
</body>

</html>