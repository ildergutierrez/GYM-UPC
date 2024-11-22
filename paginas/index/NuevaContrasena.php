<?php

if (!isset($_GET['correo'])) {
    header("location: ../../index.php");
}
$correo = base64_decode($_GET['correo']);

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
    <link rel="stylesheet" href="../../css/estilos_Recuperar.css" />
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
    <?php if (isset($_GET['respuesta']) && $_GET['respuesta'] == "0") { ?>
        <div id="accion" class="alert alert-primary" role="alert" style="display: block; background: red;  color:#ffffff; font-weight: bold; border: none; position: fixed; z-index: 999; margin-top: 0; width: 100%;">
            <center>
                <div class="container"><span class="material-symbols-outlined" style="vertical-align: middle;">
                        warning
                    </span> &ensp; !upss. ocurrio un error!
                </div>
            </center>

        </div>
    <?php } ?>

    <?php if (isset($_GET['respuesta']) && $_GET['respuesta'] == "1") { ?>
        <div id="accion" class="alert alert-primary" role="alert" style="display: block; background: red;  color:#ffffff; font-weight: bold; border: none; position: fixed; z-index: 999; margin-top: 0; width: 100%;">
            <center>
                <div class="container"><span class="material-symbols-outlined" style="vertical-align: middle;">
                        check
                    </span> &ensp; !Actización realizada!
                </div>
            </center>

        </div>
    <?php } ?>

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
                    <form action="../../php/Actualizar_Contraseña.php" method="post" class="entrada">
                        <center>
                            <div style="background: #121A1C; border-radius: 100%; width: 30%; padding: 0;">
                                <img src="../../img/user.png" alt="Icono" width="100%">
                            </div> <br> <label class="form-control" style=" text-align: left; background: transparent; padding: 0; border: none;">Contraseña *</label>
                            <div class="input-group mb-3">
                                <input type="password" name="password" id="cont" required class="form-control" minlength="8" aria-label="Text input with checkbox">
                                <div class="input-group-text" onclick="Desifrado(document.getElementById('cont'))" style="background: #121A1C; color: #E5E5E5; display: block;  height: 36px;">
                                    <span class="material-symbols-outlined span"> key </span>
                                </div>
                            </div> <br> <label class="form-control" style=" text-align: left; background: transparent; padding: 0; border: none;"> Confirmar Contraseña *</label>
                            <div class="input-group mb-3" id="CN_password">
                                <input id="cnc" minlength="8" type="password" name="password_new" required class="form-control" aria-label="Text input with checkbox">
                                <div  onclick="Desifrado(document.getElementById('cnc'))" class="input-group-text" style="background: #121A1C; color: #E5E5E5; display: block;  height: 36px;">
                                    <span class="material-symbols-outlined span"> key </span>
                                </div>
                                <input type="hidden" name="rol" value="0">
                            </div>
                            <button class="btn btn" style="background: #0B7F46; color: #ffffff; font-weight: bold; width: 100%">Actualizar Información</button>
                            <br><br>
                            <br><br>
                        </center>
                        <input type="hidden" name="Email" value="<?php echo $correo ?>">
                        <input type="hidden" name="url" value="../paginas/index/NuevaContrasena.php">
                    </form>
                </div>

            </div>
            <!-- fin inicio -->

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
    <script>
        document.getElementById('codigo').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    </script>
    <script src="../../js/script.js"></script>
</body>

</html>