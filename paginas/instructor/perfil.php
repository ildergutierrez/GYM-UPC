<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perfil</title>

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
    <link rel="stylesheet" href="../../css/perfil.css" />
    <link rel="icon" href="../../img/logo/Logo.png" />
</head>

<body style="background: #1e1e1e">
    <div class="container-fluid" style="padding: 0;">
        <header>
            <nav class="navbar navbar-expand-lg" style="padding-top: 30px; padding-bottom: 0px; background: #0b7f46; border-top: solid 4px #ffcc53;">
                <div class="container-fluid" style="color: white">
                    <a class="navbar-brand" href="#"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" onclick="logo()">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav justify-content-end ms-auto mt-3 mb-2 mb-lg-0" style="width: 250%">
                            <li class="nav-item">
                                <a class="nav-link active" href="../view/bienvenida.php" style=" color: #ffffff; padding-right: 30px; font-weight: bold;  "><span class="material-icons" style="vertical-align: middle">home</span>INICIO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="listar.php" style="color: #ffffff; border-bottom: solid 4px #ffcc53; padding-right: 30px; font-weight: bold; "><span class="material-icons" style="vertical-align: middle">recent_actors</span> Listar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="leer_qr.php" style="color: #ffffff; padding-right: 30px; font-weight: bold; "><span class="material-icons" style="vertical-align: middle">qr_code_scanner</span>Leer QR</a>
                            </li>
                        </ul>
                        <form
                            class="d-flex justify-content-center align-items-center"
                            style="width: 70%">
                            <div class="container d-flex justify-content-center align-items-center" style=" width: 100%;  background: #ffcc53; font-weight: bold; border-radius: 10px; margin-bottom: 3px;  ">
                                <div
                                    class="container d-flex justify-content-center align-items-center"
                                    style="padding: 0; width: 100%">
                                    <div class="d-flex justify-content-center align-items-center" style=" margin-top: 10px; color: #000000; font-size: 12px; width: 95%; ">
                                        <p>Ilder Alberto Gutierrez Beleño</p> &ensp;
                                    </div>
                                    <div class="dropdown" style="color: #000000">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                                        <ul class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="navbarDropdown">
                                            <li>
                                                <a class="dropdown-item" href="#"> <span class="material-symbols-outlined" style="vertical-align: middle;"> person_outline </span> &ensp; Perfil</a>
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
                <div class="d-flex" style="z-index: 1000; position: fixed; top: 25px; left: 40px; width: 20%; ">
                    <img id="logo_2" src="../../img/logo/Logo.png" alt="Logo" style="width: 15%; display: none" title="Logo" />
                </div>
            </div>
            <!-- Fin posicion del logo -->
            <!-- Linea de nombre -->
            <div class="container" style="margin-top: 80px; ">
                <div id="nombre" class="d-flex Bienvenida" style="display: block;">
                    <p>
                    <h1 id="x2">Configuración</h1>
                    </p>
                </div>
                <!-- Fin de linea de nombre -->
                <br>
            </div>
            <!-- Formulario -->
            <div class="formulario">
                <form action="" method="$_POST">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Docuento -->
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label" style="color: #FFFFFF;">Documento * </label>
                                <div class="input-group-text" style="background: #121A1C; padding: 0; margin: 0; width: 90%; overflow: hidden; border-radius: 5px; border: solid 1px #ffffff;">
                                    <input type="text" disabled style="width: 90%; border-radius: 0;" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <div style=" color: #E5E5E5;  width: 10%;">
                                        <span class="material-symbols-outlined" style=" font-size: 24px;">
                                            tag
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- Correo -->
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label" style="color: #FFFFFF;">Correo * </label>
                                <div class="input-group-text" style="background: #121A1C; padding: 0; margin: 0; width: 90%; overflow: hidden; border-radius: 5px; border: solid 1px #ffffff;">
                                    <input type="email" required style="width: 90%; border-radius: 0;" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <div style=" color: #E5E5E5;  width: 10%;">
                                        <span class="material-symbols-outlined" style=" font-size: 24px;">
                                            mail
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- genero -->
                            <div class="mb-3">
                                <label class="form-control" style=" color:#ffffff; background: transparent; padding: 0; border: none; font-size: 16px;">Genero * </label>
                                <br>
                                <div class="row" style="color: #FFFFFF;">
                                    <div class="col-4">
                                        <div class="row">
                                            <div class="col-2">
                                                <input type="radio" required name="op" style="margin-top: 0; padding: 0;" value="0">
                                            </div> &ensp; Masculino
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="row ">
                                            <div class="col-2">
                                                <input type="radio" required name="op" style="margin-top: 0; padding: 0;" value="1">
                                            </div> &emsp; Fememino
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row " title="No aplica / no especifica">
                                            <div class="col-2">
                                                <input type="radio" required name="op" style="margin-top: 0;" value="2">
                                            </div>&ensp; N/A
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <!-- Nombre -->
                            <div class="mb-3">
                                <label for="lugar" class="form-label" style="color: #FFFFFF;">Nombre completo *</label>
                                <div class="input-group">
                                    <input type="text" required class="form-control" aria-label="Lugar">
                                    <div style=" color: #E5E5E5;  width: 10%;"> <span id="lugar" class="input-group-text" style=" font-size: 24px;">
                                            <i class="material-icons">person</i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Telefono -->
                                    <div class="mb-3">
                                        <label for="hora" class="form-label" style="color: #FFFFFF;">Telefono *</label>
                                        <div class="input-group">
                                            <input type="text" required style="width:70%" id="numerocel" class="form-control" aria-label="Lugar">
                                            <div style=" color: #E5E5E5;  width: 20%; ">
                                                <span id="lugar" class="input-group-text">
                                                    <i class="material-icons">call</i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="lugar" class="form-label" style="color: #ffffff;">Rol *</label>
                                        <div class="input-group">
                                            <input type="text" style="background: #E5E5E5;" required disabled readonly class="form-control" aria-label="Lugar">
                                            <div style=" color: #E5E5E5;  width: 15%;"> <span id="lugar" class="input-group-text">
                                                    <i class="material-icons span2">repeat</i>
                                                </span>
                                            </div><br>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
            </div>
            <div class="container-md">
                <center> <button type="submit" class="btn btn-success A_cupos">Actualizar Informacion</button>
                </center>
            </div>
            </form>
            <div id="activar" style="display: block; padding:10px ;">
                <center> <a onclick="Actualiza_Contrasena()" class="btn btn-success A_cupos">Actualizar Contraseña</a>
                </center>
            </div>
            <!-- Fin Formulario -->
            <!-- Cambiar contraseña -->
            <div id="contra" class="container" style="display: none; height: 300px;">
                <form action="" method="$_POST" style="padding:40px">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="lugar" class="form-label" style="color: #FFFFFF;">Contraseña Actual *</label>
                                <div class="input-group">
                                    <input type="password" require id="C_Actual" class="form-control" placeholder="ingrese su contraseña actual" aria-label="Lugar">
                                    <div style="width: 10%;" onclick="Desifrado(document.getElementById('C_Actual'))">
                                        <span class="input-group-text click">
                                            <i class="material-icons span">key</i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="lugar" class="form-label" style="color: #FFFFFF;">Nueva Contraseña *</label>
                                <div class="input-group">
                                    <input type="password" require id="C_Nueva" class="form-control" placeholder="use caracteres especiales" aria-label="Lugar">
                                    <div style="  width: 10%; " onclick="Desifrado( document.getElementById('C_Nueva'))">
                                        <span class="input-group-text click">
                                            <i class="material-icons ">lock</i>
                                        </span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <center> <button type="submit" class="btn btn-success A_cupos ">Actualizar Contraseña</button>
                        </center>

                    </div>
                    <div id="cancelar" style="display: none; padding: 10px; ">
                        <center> <a onclick="Actualiza_Contrasena()" class="btn btn-success cancelar">Cancelar</a>
                        </center>
                    </div>
                    <br><br>
                </form>
            </div>
            <!-- fin de cambiar contraseña -->
        </main> <br><br><br>
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
        <script src="../../js/usuarios/Configuracion_user.js"></script>

        <script>
            function Lugares() {
                const lugar = document.getElementById('lugar');
                const s_lugar = document.getElementById('s_lugar');
                const opc = document.getElementById('opc');
                const lugarSelect = document.getElementById('lugarSelect');
                if (opc.style.display === 'none') {
                    opc.style.display = 'block';
                    opc.style.position = 'absolute';


                } else {
                    opc.style.display = 'none';
                }
                s_lugar.value = '';
                lugarSelect.addEventListener('change', () => {
                    const selectedOptions = Array.from(lugarSelect.selectedOptions).map(option => option.text);
                    //seleccionar solo un valor
                    s_lugar.value = selectedOptions[0];

                    opc.style.display = 'none';
                });
            }
            document.getElementById('numerocel').addEventListener('input', function(e) {
                this.value = this.value.replace(/[^0-9]/g, '');
            });
        </script>

    </div>
</body>

</html>