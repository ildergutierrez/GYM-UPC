<?php
//*debe ser corregido este archivo*
session_start();
if (isset($_SESSION['Email']) && isset($_SESSION['nombre']) && isset($_SESSION['rol']) == 1) {
    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];
    include '../../php/destruir_sesion.php';
    verificar_inactividad();
} else {
    header('Location: ../../index.php');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividades</title>
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
    <link rel="stylesheet" href="../../css/activar_afiliados.css" />
    <link rel="icon" href="../../img/logo/Logo.png" />
</head>

<body>
    <div class="container-fluid" style="padding: 0;">
        <?php if (isset($_GET['respuesta'])) { ?>
            <div id="accion" class="alert alert-primary" role="alert" style="display: block; border: solid 2px #0b7f46; background: #ffcc53; color:#ffffff; font-weight: bold; position: fixed; z-index: 1100; margin-top: 10px; width: 100%;">
                <center>
                    <?php if ($_GET['respuesta'] == '1') { ?>
                        <div class="container"><span class="material-symbols-outlined" style="vertical-align: middle;">
                                check
                            </span> &ensp; !Activación exitosa!
                            <button onclick="Cerrar_Alerta()" style=" float: inline-end; margin-top: 0px; background: transparent; border: none;  color: #FFFFFF; font-weight: bold;">
                                <p style="border-bottom: solid 2px #0b7f46; padding: 0;"> Cerrar</p>
                            </button>
                        </div>
                    <?php } elseif ($_GET['respuesta'] == '2') { ?>
                        <div class="container"><span class="material-symbols-outlined" style="vertical-align: middle;">
                                check
                            </span> &ensp; !Suspencion Activada!
                            <button onclick="Cerrar_Alerta()" style=" float: inline-end; margin-top: 0px; background: transparent; border: none;  color: #FFFFFF; font-weight: bold;">
                                <p style="border-bottom: solid 2px #0b7f46; padding: 0;"> Cerrar</p>
                            </button>
                        </div>
                    <?php } elseif ($_GET['respuesta'] == '3') { ?>
                        <div class="container"><span class="material-symbols-outlined" style="vertical-align: middle;">
                                warning
                            </span> &ensp; !ups, Ya hay una suspencion Activa!
                            <button onclick="Cerrar_Alerta()" style=" float: inline-end; margin-top: 0px; background: transparent; border: none;  color: #FFFFFF; font-weight: bold;">
                                <p style="border-bottom: solid 2px #0b7f46; padding: 0;"> Cerrar</p>
                            </button>
                        </div>
                    <?php } else { ?>
                        <div class="container"><span class="material-symbols-outlined" style="vertical-align: middle;">
                                warning
                            </span> &ensp; !Ups, Ocurrio un problema!
                            <button onclick="Cerrar_Alerta()" style=" float: inline-end; margin-top: 0px; background: transparent; border: none;  color: #FFFFFF; font-weight: bold;">
                                <p style="border-bottom: solid 2px #0b7f46; padding: 0;"> Cerrar</p>
                            </button>
                        </div>
                    <?php } ?>
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
                                        <p><?php echo $nombre  ?></p> &ensp;
                                    </div>
                                    <div class="dropdown" style="color: #000000">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                                        <ul class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="navbarDropdown">
                                            <li>
                                                <a class="dropdown-item" href="perfil.php"> <span class="material-symbols-outlined" style="vertical-align: middle;"> person_outline </span> &ensp; Perfil</a>
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
                                                <a class="dropdown-item" href="#"> <span class="material-symbols-outlined" style="vertical-align: middle;"> local_activity </span> &ensp;
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
                    <img id="logo" style=" display: block;" src="../../img/logo/Logo.png" alt="Logo" width="150px" title="Logo" />
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
                    <h1 id="x2">Reactivar/ Suspención</h1>
                    </p>
                </div>
                <!-- Fin de linea de nombre -->
                <br>
            </div>
            <div class="formulario">
                <form action="../../php/Actividad.php" method="post">
                    <div class="row">
                        <div class="col-md">
                            <!-- Accion -->
                            <div class="mb-3">
                                <label for="lugar" class="form-label" style="color: #FFFFFF;">Acción *</label>
                                <div class="input-group">
                                    <input type="text" require name="accion" id="s_lugar" readonly class="form-control" placeholder="Seleccionar Acción" aria-label="Lugar">
                                    <div style="color: #E5E5E5;  width: 10%;"> <span id="lugar" onclick="Lugares()" class="input-group-text">
                                            <i class="material-icons">expand_more</i>
                                        </span>
                                    </div>
                                    <div id="opc" style="display: none; width: 100%;">
                                        <select class="form-select" multiple aria-label="multiple select example" id="lugarSelect">
                                            <option value="1">Activar</option>
                                            <option value="2">Suspender</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Inicio Fecha -->
                            <div class="mb-3">
                                <label class="form-label" style="color: #FFFFFF;">Inicio de restricción * </label>
                                <div class="input-group">
                                    <input type="text" name="inicio" readonly required id="seleccion_i" class="form-control" aria-label="Lugar">
                                    <div style=" color: #E5E5E5;  width: 10%;"> <span id="fecha_i" class="input-group-text">
                                            <i class="material-icons" onclick="Fecha(document.getElementById('fecha_i'),document.getElementById('seleccion_i'))">today</i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin fechas -->
                        <div class="mb-3">
                            <label for="lugar" class="form-label" style="color: #FFFFFF;">Fecha de finalización *</label>
                            <div class="input-group">
                                <input type="text" name="final" readonly required id="seleccion" class="form-control" aria-label="Lugar">
                                <div style=" color: #E5E5E5;  width: 10%;"> <span id="fecha" class="input-group-text">
                                        <i class="material-icons" onclick="Fecha(document.getElementById('fecha'),document.getElementById('seleccion'))">today</i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container s2">
                        <center> <button type="submit" class="btn btn-success A_cupos ">Guardar</button>
                        </center>
                    </div>
                </form>
            </div>
            <br><br>
    </div>
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
    <script src="../../js/script.js"></script>
    <!-- Flatpickr JS -->
    <!-- Permite desplegar el calendario y al elegir una opcion se le pase al input o label -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="../../js/usuarios/Apartar_cupos.js"></script>
    <script>
        // Funcion para seleccionar la fecha
        function Fecha(fechaIcon, seleccionInput) {
            const calendar = flatpickr(fechaIcon, {
                onChange: function(selectedDates, dateStr, instance) {
                    seleccionInput.value = dateStr;
                },
                enableTime: false,
                dateFormat: "d-m-Y"
            });
            calendar.open();
        }
    </script>

    <!-- Si selecciona activar se cierra los otros input -->
    <script>
        document.getElementById('s_lugar').addEventListener('selectionchange', function() {

            if (document.getElementById('s_lugar').value == 'Activar') {
                document.getElementById('seleccion_i').style.display = 'none';
                document.getElementById('fecha_i').style.display = 'none';
                document.getElementById('fecha').style.display = 'none';
                document.getElementById('seleccion_i').value = '';
                document.getElementById('seleccion').style.display = 'none';
                document.getElementById('seleccion').value = '';
            } else {
                document.getElementById('seleccion_i').style.display = 'block';
                document.getElementById('seleccion').style.display = 'block';
                document.getElementById('fecha_i').style.display = 'block';
                document.getElementById('fecha').style.display = 'block';

            }
        });
    </script>

    </div>
</body>

</html>