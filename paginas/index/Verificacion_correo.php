<?php
session_start();

if (isset($_SESSION['usuario'])) {
    header("location: bienvenida.php");
} else {
    if (isset($_GET['correo'])) {
        $correo = base64_decode($_GET['correo']);
    }
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Verificación</title>
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
                            <h1>Validar Cuenta</h1>
                            <img src="../../img/logo/Logo.png" alt="Logo" width="40%">
                            <br><br>
                            <a type="button" class="btn btn" href="../../index.php" style="background: #0B7F46; color: #ffffff; font-weight: bold; width: 80%">Volver</a>
                            <br><br><br><br><br>

                        </center>
                    </div>
                </div>
                <div class="col-sm-6" style="color: #000000; background: #E5E5E5; padding-left: 50px; padding-right: 50px;">
                    <br>

                    <center>
                        <div style="background: #121A1C; border-radius: 100%; width: 30%; padding: 0;">
                            <img src="../../img/user.png" alt="Icono" width="100%">
                        </div> <br>
                        <form id="miFormulario" action="../../php/Validar_usuario.php" method="get">
                            <label class="form-control" style=" text-align: left; background: transparent; padding: 0; border: none;">Correo *</label>
                            <div class="input-group mb-3">
                                <input type="text" readonly  value="<?php echo $correo ?>" required class="form-control" aria-label="Text input with checkbox">
                                <input type="hidden" readonly  name="correo" value="<?php echo $_GET['correo'] ?>" required class="form-control" aria-label="Text input with checkbox">
                                <div class="input-group-text" style="background: #121A1C; color: #E5E5E5;">
                                    <span class="material-symbols-outlined">
                                        mail
                                    </span>
                                </div>
                            </div> <br> <label class="form-control" style=" text-align: left; background: transparent; padding: 0; border: none;"> Codigo de Verificación *</label>
                            <div class="input-group mb-3">
                                <input type="text" name="codigo" maxlength="8" id="codigo" required class="form-control" aria-label="Text input with checkbox">
                                <div class="input-group-text" style="background: #121A1C; color: #E5E5E5;">
                                    <span class="material-symbols-outlined">
                                        tag
                                    </span>
                                </div>
                            </div>
                            <button class="btn btn" id="boton" style="display: none; background: #0B7F46; color: #ffffff; font-weight: bold; width: 100%">Confirmar</button>
                            <br><br>
                        </form>
                        <br><br>
                    </center>

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
        const boton = document.getElementById('boton');
        document.getElementById('codigo').addEventListener('input', function(e) {
            // Reemplaza caracteres no numéricos
            this.value = this.value.replace(/[^0-9]/g, '');

            // Verifica si la longitud del valor es 8
            if (this.value.length === 8) {
                boton.style.display = "block";
            } else {
                boton.style.display = "none";
            }
        });
    </script>
    <script src="assets/js/script.js"></script>
</body>

</html>