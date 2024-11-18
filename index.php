<?php
session_start();
if (isset($_SESSION['Email'])) {
    header("location: paginas/view/bienvenida.php");
    exit();
}
if(isset($_GET['usuario'])){
    $h=1;}
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
    <link rel="stylesheet" href="boostrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/estilos.css" />
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
<?php if (isset($_GET['usuario'])) { ?>
        <div class="alert alert-primary" id="accion" role="alert" style="border-top: none; border-bottom: solid 2px #ffcc53; border-right: solid 2px #0B7F46; border-left: solid 2px #0B7F46; border-bottom-right-radius: 15px; border-bottom-left-radius: 15px; background: #121A1C; color:#ffffff;  position: fixed; z-index: 999; margin-top: 0; width: 100%; display: block;">
            <center>
                <div class="container"><span class="material-symbols-outlined" style="vertical-align: middle;">
                sentiment_sad
                    </span> &ensp; !Su usuario <i> <?php echo $_GET['usuario'] ?></i> Se a eliminado satisfactoriamente!
                    <button onclick="Cerrar_Alerta()" style="float: inline-end; margin-top: 0px; background: transparent; border: none;  color: #FFFFFF; font-weight: bold;">
                        <p style="border-bottom: solid 2px #ffcc53; padding: 0;"> Cerrar</p>
                    </button>
                </div>
            </center>
        </div> <?php } ?>
   
    <?php if (isset($_GET['conexion'])) { ?>
        <div class="alert alert-primary" id="accion" role="alert" style="background: red; color:#ffffff; font-weight: bold; border: none; position: fixed; z-index: 999; margin-top: 0; width: 100%; display: block;">
            <center>
                <div class="container"><span class="material-symbols-outlined" style="vertical-align: middle;">
                        warning
                    </span> &ensp; !Upssss, Ocurrio un error con la conexión!
                    <button onclick="Cerrar_Alerta()" style="float: inline-end; margin-top: 0px; background: transparent; border: none;  color: #FFFFFF; font-weight: bold;">
                        <p style="border-bottom: solid 2px #ffcc53; padding: 0;"> Cerrar</p>
                    </button>
                </div>
            </center>
        </div> <?php } ?>
    <?php if (isset($_GET['error']) && $_GET['error'] == "1") { ?>
        <div class="alert alert-primary" role="alert" id="accion" style="background: red; color:#ffffff; font-weight: bold; border: none; position: fixed; z-index: 999; margin-top: 0; width: 100%; display: block;">
            <center>
                <div class="container"><span class="material-symbols-outlined" style="vertical-align: middle;">
                        warning
                    </span> &ensp; !Upssss, Ocurrio un error!
                    <button onclick="Cerrar_Alerta()" style="float: inline-end; margin-top: 0px; background: transparent; border: none;  color: #FFFFFF; font-weight: bold;">
                        <p style="border-bottom: solid 2px #ffcc53; padding: 0;"> Cerrar</p>
                    </button>
                </div>
            </center>
        </div>
    <?php } ?>
    <?php if (isset($_GET['error']) && $_GET['error'] == "2") { ?>
        <div class="alert alert-primary" id="accion" role="alert" style="background: #ffcc53; color:#ffffff; font-weight: bold; border: none; position: fixed; z-index: 999; margin-top: 0; width: 100%; display: block;">
            <center>
                <div class="container"><span class="material-symbols-outlined" style="vertical-align: middle;">
                        warning
                    </span> &ensp; !Upssss, Ocurrio un error al enviar el correo!
                    <button onclick="Cerrar_Alerta()" style="float: inline-end; margin-top: 0px; background: transparent; border: none;  color: #FFFFFF; font-weight: bold;">
                        <p style="border-bottom: solid 2px #0B7F46; padding: 0;"> Cerrar</p>
                    </button>
                </div>
            </center>
        </div>
    <?php } ?>
    <?php if (isset($_GET['respuesta']) && $_GET['respuesta'] == "1") { ?>
        <div class="alert alert-primary" id="accion" role="alert" style="background: #0b7f46; color:#ffffff; font-weight: bold; border: none; position: fixed; z-index: 999; margin-top: 0; width: 100%; display: block;">
            <center>
                <div class="container"><span class="material-symbols-outlined" style="vertical-align: middle;">
                        check
                    </span> &ensp; !Registro exitoso!
                    <button onclick="Cerrar_Alerta()" style="float: inline-end; margin-top: 0px; background: transparent; border: none;  color: #FFFFFF; font-weight: bold;">
                        <p style="border-bottom: solid 2px #ffcc53; padding: 0;"> Cerrar</p>
                    </button>
                </div>
            </center>
        </div>
    <?php } ?>
    <main>
        <?php if ((isset($_GET['error']) && $_GET['error'] == "1") || (isset($_GET['error']) && $_GET['error'] == "2")) { ?>
            <div id="Iniciar" class="container" style="display: none; margin-top: 0px; ">
            <?php } else { ?>
                <div id="Iniciar" class="container" style="margin-top: 0px; "> <?php } ?>
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
                        <form action="php/Login.php" method="post" class="entrada">
                            <center>
                                <div style="background: #121A1C; border-radius: 100%; width: 30%; padding: 0;">
                                    <img src="img/user.png" alt="Icono" width="100%">
                                </div> <br> <label class="form-control" style=" text-align: left; background: transparent; padding: 0; border: none;">Correo *</label>
                                <?php if (isset($_GET['error']) && $_GET['error'] == "0") { ?>
                                    <p style="color: red;">El usuario o la contraseña es incorrecta</p>
                                <?php } ?>
                                <div class="input-group mb-3">
                                    <input name="usuario" type="email" required class="form-control">
                                    <div class="input-group-text" style="background: #121A1C; color: #E5E5E5;">
                                        <span class="material-symbols-outlined">
                                            mail
                                        </span>
                                    </div>
                                </div> <label class="form-control" style=" text-align: left; background: transparent; padding: 0; border: none;">Contraseña *</label>
                                <div style="padding: 0;" class="input-group mb-3">
                                    <input id="password" name="password" type="password" required class="form-control">
                                    <div onclick="Desifrado( document.getElementById('password'))" id="ver" class="input-group-text" style="background: #121A1C; color: #E5E5E5; display: block; cursor: pointer;">
                                        <span class="material-symbols-outlined span"> key </span>
                                    </div>

                                </div>
                                <button class="btn btn" style="background: #0B7F46; color: #ffffff; font-weight: bold; width: 100%">Iniciar Sesión</button>
                                <br><br>
                                <p>He olvidado mi contraseña <a href="paginas/index/Olvidecontraseña.php" style="text-decoration: none; color: #0B7F46;">Click Aqui</a></p>
                                <br><br>
                            </center>
                        </form>
                    </div>

                </div>
                <!-- fin inicio -->

                </div>
                <?php if ((isset($_GET['error']) && $_GET['error'] == "1") || (isset($_GET['error']) && $_GET['error'] == "2")) { ?>
                    <div id="Registro" class="container" style="display: block; margin-top: 0px; ">
                    <?php } else { ?>
                        <div id="Registro" class="container" style="display: none; margin-top: 0px; ">
                        <?php } ?>
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
                                <form action="php/Registros_usuarios.php" method="post" class="entrada">
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
                                        <input style="height: 26px;" type="text" name="nombre" id="documento" required class="form-control" aria-label="Text input with checkbox">
                                        <div class="input-group-text" style=" height: 26px; background: #121A1C; color: #E5E5E5;">
                                            <span class="material-symbols-outlined">
                                                person
                                            </span>
                                        </div>
                                    </div>   <div style="display: none; color: red; font-weight: bold;" id="mensaje"><p><i>Se detecto un intento de inyeccion MYSQL</i></p></div>
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
                                        <input style="height: 26px;" name="rol" type="hidden" value="3">
                                        <input style="height: 26px;" id="numerocel" name="celular" type="text" required class="form-control" aria-label="Text input with checkbox">
                                        <div class="input-group-text" style=" height: 26px; background: #121A1C; color: #E5E5E5;">
                                            <span class="material-symbols-outlined"> smartphone </span>
                                        </div>
                                    </div>
                                    <!-- Contraseña -->
                                    <label class="form-control" style=" text-align: left; background: transparent; padding: 0; border: none;">Contraseña *</label>
                                    <div style="padding: 0;" class="input-group mb-3 d-flex">
                                        <input id="contra" name="password" style="height: 30px;" type="password" required class="form-control" minlength="8" placeholder="debe contener Numero, mayusculas, menusculas y caractere especial">
                                        <div id="Remplazo" onclick="Desifrado( document.getElementById('contra'))" class="input-group-text" style="background: #121A1C; color: #E5E5E5; display: block;  height: 30px; cursor: pointer;">
                                            <span style="height: 26px;" class="material-symbols-outlined span"> key </span>
                                        </div>

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
                                        <button id="btn_registro" class="btn btn" style="background: #0B7F46; color: #ffffff; font-weight: bold; width: 100%;">Registrate</button>
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
        document.getElementById('numeroIdentidad').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
        document.getElementById('numerocel').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
        //  Validar inyecciones SQL
        const sqlInjections = ["' OR '1'='1",
            "' OR '1'='1' --",
            "' OR '1'='1' #",
            "' OR 1=1 --",
            "' OR 1=1 #",
            "' OR x=x --",
            "' OR x=x #",
            "' OR 1=1/*",
            "'; DROP TABLE users; --",
            "'; DROP TABLE students; --",
            "' OR '1'='1' /*",
            "'; SELECT * FROM users WHERE '1'='1'; --",
            "' UNION SELECT null, username, password FROM users --",
            "' UNION SELECT null, table_name, column_name FROM information_schema.tables --",
            "admin' --",
            "admin' #",
            "admin'/*",
            "' OR '1'='1' AND 'a'='a",
            "' OR '1'='1' AND 'a'='b",
            "1' ORDER BY 1--",
            "1' AND 1=1--",
            "1' AND 1=2--",
            "1' UNION SELECT username, password FROM users--",
            "' OR EXISTS(SELECT * FROM users WHERE username = 'admin' AND password = 'password')--",
            "' AND (SELECT COUNT(*) FROM users) > 0--",
            "'; EXEC xp_cmdshell('dir'); --",
            "'; SHUTDOWN --",
            "'; DROP DATABASE exampleDB; --",
            "' UNION ALL SELECT null, version(), user() --",
            "' UNION SELECT 1, @@version --",
            "' AND 1=(SELECT COUNT(*) FROM users); --",
            "'; INSERT INTO users (username, password) VALUES ('hacker', 'password123'); --"
        ];
        document.getElementById('documento').addEventListener('input', function(e) {
            document.getElementById('documento').addEventListener('input', function(e) {
                const inputValue = this.value.toLowerCase(); // Convertimos a minúsculas para evitar diferencias
                for (const sqlInjection of sqlInjections) {
                    if (inputValue.includes(sqlInjection.toLowerCase())) { // Comparar usando includes
                        document.getElementById('mensaje').style.display = 'block'; // Mostrar mensaje
                        document.getElementById('btn_registro').disabled = true; // Deshabilitar el botón
                        // this.value = '';// Limpiar el campo
                        break; // Detener el bucle
                    }else{
                            document.getElementById('btn_registro').disabled = false; // Habilitar el botón
                            document.getElementById('mensaje').style.display = 'none'; // Ocultar mensaje
                        }
                }
            });
        });
    </script>
    <script src="js/script.js"></script>
    <script src="js/Bienvenida.js"></script>
</body>

</html>