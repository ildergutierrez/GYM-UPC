<?php

if (!isset($_POST['documento']) && !isset($_POST['rol'])) {

    header('Location: ../index.php');
    exit();
}
$documento = $_POST['documento'];
$correo = $_POST['correo'];
$nombre = $_POST['nombre'];
$celular = $_POST['celular'];
$genero = $_POST['op'];
$sede = $_POST['sede'];
if ($sede === "Aguachica") {
    $sede = '1';
} else {
    $sede = '2';
}
$contrasena = $_POST['password'];
echo $contrasena . "<br>";
echo "correo" . $correo . '<br>';
echo "nombre" . $nombre . '<br>';
echo "celular" . $celular . '<br>';
echo "genero" . $genero . '<br>';
echo "sede" . $sede . '<br>';


exit();
