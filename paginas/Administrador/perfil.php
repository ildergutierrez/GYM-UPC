<?php
session_start();
if (isset($_SESSION['nombre']) && isset($_SESSION['documento']) && isset($_SESSION['rol']) && isset($_SESSION['estado']) && isset($_SESSION['Email'])) {
    if ($_SESSION['rol'] != '1') {
        header('Location: ../view/bienvenida.php');
    }
    $email = $_SESSION['Email'];
    $nombre = $_SESSION['nombre'];
    $documento = $_SESSION['documento'];
    $rol = $_SESSION['rol'];
    if ($rol === '1') {
        $rol = "Administrador";
    }
    $estado = $_SESSION['estado'];
    $sede = "Aguachica";
    $telefono = $_SESSION['telefono'];
    $sexo = $_SESSION['genero'];
} else {
    header('Location: ../../index.php');
}
?>
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
        <?php if (isset($_GET['respuesta']) && $_GET['respuesta'] == "1") { ?>
            <div id="accion" class="alert alert-primary" role="alert" style="display: block; border: solid 2px #ffcc53; background: #0b7f46; color:#ffffff; font-weight: bold; position: fixed; z-index: 1000; margin-top: 10px; width: 100%;">
                <center>
                    <div class="container"><span class="material-symbols-outlined" style="vertical-align: middle;">
                            check
                        </span> &ensp; !Actualizacion exitosa!
                        <button onclick="Cerrar_Alerta()" style=" float: inline-end; margin-top: 0px; background: transparent; border: none;  color: #FFFFFF; font-weight: bold;">
                            <p style="border-bottom: solid 2px #ffcc53; padding: 0;"> Cerrar</p>
                        </button>

                    </div>
                </center>

            </div>
        <?php } ?>

        <?php if (isset($_GET['respuesta']) && $_GET['respuesta'] == "0") { ?>
            <div id="accion" class="alert alert-primary" role="alert" style="display: block; background: red;  color:#ffffff; font-weight: bold; border: none; position: fixed; z-index: 999; margin-top: 0; width: 100%;">
                <center>
                    <div class="container"><span class="material-symbols-outlined" style="vertical-align: middle;">
                            warning
                        </span> &ensp; !upss. ocurrio un error!
                        <button onclick="Cerrar_Alerta()" style=" float: inline-end; margin-top: 0px; background: transparent; border: none;  color: #FFFFFF; font-weight: bold;">
                            <p style="border-bottom: solid 2px #ffcc53; padding: 0;"> Cerrar</p>
                        </button>

                    </div>
                </center>

            </div>
        <?php } ?>

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
                                <a class="nav-link" href="enlistar.php" style="color: #ffffff; padding-right: 30px; font-weight: bold;  "><span class="material-symbols-outlined" style="vertical-align: middle; border: solid 1px #ffffff;"> user_attributes </span> Listar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="registrar.php" style="color: #ffffff; padding-right: 30px; font-weight: bold; "><span class="material-symbols-outlined" style="vertical-align: middle;">person_add </span>Registra</a>
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
                                                <a class="dropdown-item" href="#"> <span class="material-symbols-outlined" style="vertical-align: middle;"> person_outline </span> &ensp; Perfil</a>
                                            </li>
                                            <li>

                                            <li class="nav-item dropdown">
                                                <a class="dropdown-item cabeza_cel" href="#"> <span class="material-symbols-outlined" style="vertical-align: middle;"> reduce_capacity </span> &ensp;
                                                    Capacidad</a>
                                                <ul class="dropdown-menu cel" aria-labelledby="navbarDropdownMenuLink">
                                                    <li><a class="dropdown-item" href="capacidad.php"> <span class="material-symbols-outlined" style="vertical-align:middle;">scatter_plot</span> &ensp; Cupos GYM</a></li>
                                                    <li><a class="dropdown-item" href="asignar_instructor.php"> <span class="material-symbols-outlined" style="vertical-align: middle;"> personal_places </span> &ensp; Asig Instructor</a></li>
                                                </ul>
                                            </li>

                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="actividades.php"> <span class="material-symbols-outlined" style="vertical-align: middle;"> local_activity </span> &ensp;
                                                    Actividad</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="activar_afiliados.php"> <span class="material-symbols-outlined" style="vertical-align: middle;"> patient_list </span> &ensp;
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
                <form action="../../php/perfil.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Docuento -->
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label" style="color: #FFFFFF;">Documento * </label>
                                <div class="input-group-text" style="background: #121A1C; padding: 0; margin: 0; width: 90%; overflow: hidden; border-radius: 5px; border: solid 1px #ffffff;">
                                    <input type="text" readonly name="documento" value="<?Php echo $documento ?>" style="width: 90%; border-radius: 0;" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
                                    <input type="email" required name="correo" value="<?php echo $email ?>" style="width: 90%; border-radius: 0;" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
                                                <?php if ($sexo === '0') { ?>
                                                    <input type="radio" required checked name="op" style="margin-top: 0; padding: 0;" value="0">
                                                <?php } else { ?>
                                                    <input type="radio" required name="op" style="margin-top: 0; padding: 0;" value="0">
                                                <?php } ?>
                                            </div> &ensp;Masculino
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="row ">
                                            <div class="col-2">
                                                <?php if ($sexo === '1') { ?>
                                                    <input type="radio" required checked name="op" style="margin-top: 0; padding: 0;" value="1">
                                                <?php } else { ?>
                                                    <input type="radio" required name="op" style="margin-top: 0; padding: 0;" value="1">
                                                <?php } ?>
                                            </div>&ensp;Fememino
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="row " title="No aplica / no especifica">
                                            <div class="col-2">
                                                <?php if ($sexo === '2') { ?>
                                                    <input type="radio" required checked name="op" style="margin-top: 0; padding: 0;" value="2">
                                                <?php } else { ?>
                                                    <input type="radio" required name="op" style="margin-top: 0; padding: 0;" value="2">
                                                <?php } ?>
                                            </div>&ensp;N/A
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
                                    <input type="text" name="nombre" required value="<?php echo  $nombre ?>" class="form-control" aria-label="Lugar">
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
                                            <input type="text" name="celular" required value="<?php echo $telefono ?>" style="width:70%" id="numerocel" class="form-control" aria-label="Lugar">
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
                                            <input type="text" name="rol" style="background: #E5E5E5;" required value="<?php echo $rol ?>" readonly class="form-control" aria-label="Lugar">
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
                <center> <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success A_cupos">Actualizar Informacion</a>
                </center>
            </div>
            <!-- Modal contraseña -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" style="background: #121A1C;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: #FFFFFF; font-weight: bold;">Ingrese la contraseña actual</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <center>
                                <div style="padding: 0;" class="input-group mb-3">
                                    <input id="password" name="password" type="password" required class="form-control">
                                    <div onclick="Desifrado( document.getElementById('password'))" id="ver" class="input-group-text" style="background: #121A1C; color: #E5E5E5; display: block; cursor: pointer;">
                                        <span class="material-symbols-outlined span"> key </span>
                                    </div>
                                </div>
                            </center>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary A_cupos" style="border: none;">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- fin modal de contraseña -->
            </form>
            <div id="activar" style="display: block; padding:10px ;">
                <center> <a onclick="Actualiza_Contrasena()" class="btn btn-success A_cupos">Actualizar Contraseña</a>
                </center>
            </div>
            <!-- Fin Formulario -->
            <!-- Cambiar contraseña -->
            <div id="contra" class="container" style="display: none; height: 300px;">
                <form action="../../php/Actualizar_Contraseña.php" method="post" style="padding:40px">
                    <input name="Email" type="hidden" value="<?php echo $email ?>">
                    <input name="rol" type="hidden" value="<?php echo $rol ?>">
                    <input name="url" type="hidden" value="../paginas/instructor/perfil.php">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="lugar" class="form-label" style="color: #FFFFFF;">Contraseña Actual *</label>
                                <div class="input-group">
                                    <input name="password" minlength="8" type="password" require id="C_Actual" class="form-control" placeholder="ingrese su contraseña actual" aria-label="Lugar">
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
                                    <input name="password_new" type="password" require minlength="8" id="C_Nueva" class="form-control" placeholder="use caracteres especiales" aria-label="Lugar">
                                    <div style="width: 10%; " onclick="Desifrado( document.getElementById('C_Nueva'))">
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
            <!-- Eliminar Cuenta -->
            <form action="../../php/Eliminar_cuenta.php" method="post">
                <input type="hidden" name="identidad" value="<?php echo $documento ?>">
                <!-- Modal contraseña -->
                <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" style="background: #121A1C;">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel" style="color: #FFFFFF; font-weight: bold;">Ingrese la contraseña actual Para eliminar su cuenta</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <center>
                                    <div style="padding: 0;" class="input-group mb-3">
                                        <input id="password" name="contra" type="password" required class="form-control">
                                        <div onclick="Desifrado( document.getElementById('password'))" id="ver" class="input-group-text" style="background: #121A1C; color: #E5E5E5; display: block; cursor: pointer;">
                                            <span class="material-symbols-outlined span"> key </span>
                                        </div>
                                    </div>
                                </center>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary A_cupos" style="border: none;">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- fin modal de contraseña -->
                <div class="container-md">
                    <center> <a data-bs-toggle="modal" data-bs-target="#Modal" class="btn btn-success A_cupos">Eliminar Cuenta</a>
                    </center>
                </div>
            </form>
            <!-- fin eliminar cuenta -->
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
        <script src="../../js/script.js"></script>

        <script>
            document.getElementById('numerocel').addEventListener('input', function(e) {
                this.value = this.value.replace(/[^0-9]/g, '');
            });
        </script>

    </div>
</body>

</html>