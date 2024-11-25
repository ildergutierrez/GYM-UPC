<?php
session_start();
if (isset($_SESSION['nombre']) && isset($_SESSION['documento']) && isset($_SESSION['rol']) && isset($_SESSION['estado'])) {
    if ($_SESSION['rol'] != '3') {
        header('Location: ../view/bienvenida.php');
    }
    include('../../php/Conexion_bc.php');
    $conexion = conexion();
    function Estado($documento): int
    {
        global $conexion;
        $sql = "SELECT * FROM `usuarios` WHERE `id` = '$documento'";
        $result = mysqli_query($conexion, $sql);
        $mostrar = mysqli_fetch_array($result);
        if ($mostrar['estado'] == '0' || $_SESSION['Suspencion']=='0') {
            return 0;
        }
        return 1;
    }
    $nombre = $_SESSION['nombre'];
    $documento = $_SESSION['documento'];
    $rol = $_SESSION['rol'];
    $estado = Estado($documento);
    include '../../php/destruir_sesion.php';
    verificar_inactividad();
} else {
    header('Location: ../../index.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Apartar Cupos</title>
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
    <link rel="stylesheet" href="../../css/Apartarcupos.css" />
    <link rel="icon" href="../../img/logo/Logo.png" />
</head>
<body style="background: #1e1e1e">
    <!-- Modal Suspencion-->
    <div class="modal fade" id="estado" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background: #121A1C; color: #E5E5E5;">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Advertencia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php if($_SESSION['Suspencion']!=0){ ?> 
                    <p>El sistema a detectado que ha faltado a 3 citas en el GYM-UPC. <br>
                        Esa es la razón por la cual no puede apartar cupos. <br><br>
                        <b>Nota:</b> Si tiene alguna excusa justificable, por favor comuníquese con el administrador del sistema.
                        </p>  <?php } else{ ?>
                            <p>
                                El sistema detecto que se han suspendido las actividades de forma temporal, Si deseas apartar cupos debes esparar que finalice la fecha de suspención. <br>
                            <b> Fecha de finalización: </b> <i> <?php echo $_SESSION['final']?></i>
                            </p> 
                        <?php } ?>
                    
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" style="background: #0b7f46;" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Advertencia-->
    <div class="modal fade" id="miModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background: #121A1C; color: #E5E5E5;">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Alerta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Primero debe seleccionar la Jornada.</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" style="background: #0b7f46;" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- fin modal -->
    <!-- Modal Registros -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <?php
        // Consulta de la base de datos sobre los cupos
       
        $sql = "SELECT * FROM `cupos`";
        $result = mysqli_query($conexion, $sql);
        $cardio = 0;
        $peso = 0;
        while ($mostrar = mysqli_fetch_array($result)) {
            if ($mostrar['lugar'] == '137') {
                $cardio++;
            } else {
                $peso++;
            }
        }
        ?>
        <div class="modal-dialog">
            <div class="modal-content" style="background: #121A1C; color: #E5E5E5;">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Registros</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5><b>Cardio: </b><?php echo $cardio ?></h5>
                    <h><b>Peso: </b> <?php echo $peso ?> </h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" style="background: #0b7f46;" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- fin modal -->
    <!-- Alertas -->
    <?php if (isset($_GET['mensaje']) ) { ?>
        <div id="accion" class="alert alert-primary" role="alert" style="display: block; background: red;  color:#ffffff; font-weight: bold; border: none; position: fixed; z-index: 999; margin-top: 0; width: 100%;">
            <center>
                <div class="container"><span class="material-symbols-outlined" style="vertical-align: middle;">
                        warning
                        <?php if($_GET['mensaje'] == "0"){ ?>
                    </span> &ensp; !upss. ocurrio un error!<br>Verifica Fecha y/o Hora. <br>Nota: Tal ves tu cupo ya fue apartado.
                    <?php } elseif($_GET['mensaje'] == "2") {?>
                        </span> &ensp; Verifica que la fecha selecionada  no este dentro del rango de fechas sin actividad en GYM. <br>No hay actvidades desde el día <?php echo $_SESSION['r_inicio'] ?> hasta <?php echo $_SESSION['r_final'] ?>
                        <?php } elseif($_GET['mensaje'] == "3"){ ?>
                            </span> &ensp; !upss. ocurrio un error!<br>Verifica que la fecha no sea mayor a 7 días.  <?php } ?>
                    <button onclick="Cerrar_Alerta()" style=" float: inline-end; margin-top: 0px; background: transparent; border: none;  color: #FFFFFF; font-weight: bold;">
                        <p style="border-bottom: solid 2px #ffcc53; padding: 0;"> Cerrar</p>
                    </button>

                </div>
            </center>

        </div>
    <?php } ?>
    <!-- Fin de Alertas -->
    <div class="container-fluid" style="padding: 0;">
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
                                <a class="nav-link" href="#" style="color: #ffffff; padding-right: 30px; font-weight: bold;  border-bottom: solid 4px #ffcc53;"><span class="material-icons" style="vertical-align: middle">calendar_month</span> APARTAR CUPO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="qr.php" style="color: #ffffff; padding-right: 30px; font-weight: bold"><span class="material-icons" style="vertical-align: middle">qr_code</span> QR</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="imc.php" style="color: #ffffff; padding-right: 30px; font-weight: bold"><span class="material-symbols-outlined" style="vertical-align: middle">cardiology</span>
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
                                        <p><?php echo $nombre ?></p> &ensp;
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
                    <h1 id="x2">Apartar Cupos</h1>
                    </p>
                </div>
                <!-- Fin de linea de nombre -->
                <br>
            </div>
            <!-- Formulario -->
            <div class="formulario">
                <form action="../../php/Cupos.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Docuento -->
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label" style="color: #FFFFFF;">Documento * </label>
                                <div class="input-group-text" style="background: #121A1C; padding: 0; margin: 0; width: 90%; overflow: hidden; border-radius: 5px; border: solid 1px #ffffff;">
                                    <input name="documento" type="text" readonly value="<?php echo $documento ?>" style="width: 90%; border-radius: 0;" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <input type="hidden" name="url" value="paginas/usuarios/qr.php">
                                    <div style=" color: #E5E5E5;  width: 10%;">
                                        <span class="material-symbols-outlined" style=" font-size: 24px;">
                                            person
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- Fecha -->
                            <div class="mb-3 px">
                                <label for="fecha" class="form-label" style="color: #FFFFFF;">Fecha *</label>
                                <div class="input-group" style="width: 90%; border:solid 1px #FFFFFF; border-radius: none;">
                                    <input name="fecha" type="text" required readonly id="seleccion" style="width: 80%" class="form-control" placeholder="Seleccionar fecha" aria-label="Fecha">
                                    <div style=" color: #E5E5E5;  width: 10%; border-radius: none; border-left: none;">
                                        <span class="input-group-text " id="fecha">
                                            <i class="material-icons">today</i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Lugar -->
                            <div class="mb-3">
                                <label for="lugar" class="form-label" style="color: #FFFFFF;">Sección *</label>
                                <div class="input-group" style="width: 100%;">
                                    <input name="sede" type="text" require id="s_lugar" readonly class="form-control" placeholder="Seleccionar Lugar" aria-label="Lugar">
                                    <div style=" color: #E5E5E5;  width: 10%;"> <span id="lugar" onclick="Lugares()" class="input-group-text">
                                            <i class="material-icons">expand_more</i>
                                        </span>
                                    </div>
                                    <div id="opc" style="display: none; width: 100%;">
                                        <select class="form-select" multiple aria-label="multiple select example" id="lugarSelect">
                                            <option value="1">Cardio</option>
                                            <option value="2">Peso</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Hora -->
                                    <div class="mb-3">
                                        <label for="hora" class="form-label" style="color: #FFFFFF;">Hora *</label>
                                        <div class="input-group">
                                            <input name="hora" type="text" required style="width:70%" id="s_hora" readonly class="form-control" placeholder="Seleccionar Lugar" aria-label="Lugar">
                                            <div style=" color: #E5E5E5;  width: 20%; ">
                                                <span id="lugar" onclick="Hora()" class="input-group-text">
                                                    <i class="material-icons">watch_later</i>
                                                </span>
                                            </div>
                                            <div id="opc_hora" style="display: none;  width: 100%; ">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Jornadas -->
                                    <label class="form-control" style=" text-align: left;color:#ffffff; background: transparent; padding: 0; border: none; font-size: 16px;">Jornada * </label>
                                    <br>
                                    <div class="row -md-3 d-flex align-items-center justify-content-center " style="font-size: 14px; color: #FFFFFF;">
                                        <div class="col-4">
                                            <div class="row" title="Mañana">
                                                <div class="col-2">
                                                    <input type="radio" onclick="Horarios()" required name="op" style="margin-top: 0; padding: 0;" value="0">
                                                </div> &ensp; M/na
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="row " title="Tarde">
                                                <div class="col-2">
                                                    <input type="radio" onclick="Horarios()" required name="op" style="margin-top: 0; padding: 0;" value="1">
                                                </div> &emsp; Tarde
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row " title="Noche">
                                                <div class="col-2">
                                                    <input type="radio" onclick="Horarios()" required name="op" style="margin-top: 0;" value="2">
                                                </div>&ensp; Noche
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="container">
                            <button type="submit" class="btn btn-success A_cupos">Apartar Cupos</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="container">
                            <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success V_registrados">Ver Registros</a>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <!-- Fin Formulario -->
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
        <?php if ($estado === 0) { ?>
            <script>
                var modal = document.getElementById('estado');
                modal.addEventListener('hidden.bs.modal', function(event) {
                    // Aquí puedes realizar la acción que desees, por ejemplo redireccionar
                    window.location.href = '../view/bienvenida.php'; // Cambia esto según tu lógica
                });
                document.addEventListener('DOMContentLoaded', function() {
                    var modal = new bootstrap.Modal(document.getElementById('estado'));
                    modal.show();
                });
            </script>
        <?php } ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="../../js/Bienvenida.js"></script>
        <script src="../../js/usuarios/Apartar_cupos.js"></script>
        <script src="../../js/script.js"></script>
        <!-- Flatpickr JS -->
        <!-- Permite desplegar el calendario y al elegir una opcion se le pase al input o label -->
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>
            const seleccionInput = document.getElementById('seleccion');
            const fechaIcon = document.getElementById('fecha');
            const calendar = flatpickr(fechaIcon, {
                onChange: function(selectedDates, dateStr, instance) {
                    seleccionInput.value = dateStr;
                },
                enableTime: false,
                dateFormat: "Y-m-d"
            });
            fechaIcon.addEventListener('click', () => {
                calendar.open();
            });
        </script>

    </div>
</body>

</html>