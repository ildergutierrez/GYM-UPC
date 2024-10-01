<?php
session_start();

// if (isset($_SESSION['usuario'])) {
//   header("location: bienvenida.php");
// }

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Recuperar Contraseña</title>
    <link rel="icon" href="../../img/logo/Logo.png" />

    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="../../css/style.css" />
</head>

<body>
    <main>
        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="contenedor__login-register">
                    <form action="" method="post" class="formulario__login">
                        <h2>Recuperar Contraseña</h2>
                        <input type="text" placeholder="Correo Institucional" name="Correo" />
                        <center>
                            <button style="border-radius: 8px">Enviar</button> <br />
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>