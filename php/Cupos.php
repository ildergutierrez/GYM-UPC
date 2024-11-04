<?php
session_start();
if (!isset($_SESSION['documento']) && !isset($_SESSION['rol']) === "3") {
    header('Location: ../index.php');
    exit();
}

if (empty($_POST['documento']) || empty($_POST['sede'])  || empty($_POST['fecha']) || empty($_POST['hora'])) {
    header('Location: ../index.php');
    exit();
}


class Cupos{
//Registrar cupos
function Registros($conexion): bool
{
    global $documento, $fecha, $hora, $sede;
    $hora_limite = date("H:i", strtotime($hora . "+ 15 minutes"));
    $sql = "INSERT INTO `cupos`(`id`, `fecha`, `hora`, `hora_limite`, `lugar`) VALUES ('$documento','$fecha','$hora','$hora_limite','$sede')";
    $resultado = $conexion->query($sql);
    if ($resultado) {
        cerrar_conexion($conexion);
        return true;
    } else {
        cerrar_conexion($conexion);
        return false;
    }
}

//determinar diferencia entre las horas
function Validar_Hora($hora): bool
{
    global $fecha;
    if( $this->Validar_Fecha($fecha)==2){
    $hora_actual = date("H:i ");
    $hora1 = strtotime($hora);
    $hora2 = strtotime($hora_actual);
    $zonah = ($hora1 - $hora2) / 3600;
    
    if ($zonah >= 1) {
        return true;
    } else {
        return false;
    }}
    return true;
}

//validar fecha
function Validar_Fecha($fecha): int|bool
{  
    $fechaObj = new DateTime($fecha);
    $fecha_actual =date("Y-m-d");
   
    $fecha1 = strtotime($fecha);
    $diaSemana = $fechaObj->format('N');
    $fecha2 = strtotime($fecha_actual);
    $zonah = ($fecha1 - $fecha2) / 86400;
  
    
    if ($diaSemana == 6 || $diaSemana == 7) {
        return 0;
    }
    if ($zonah === 0) {
        return 2;
    } 
    if ($zonah >= 1) {
        
        return 1;
    } else {
       
        return 0;
    }
}

//validar si ya tiene cupos asignados
function Estado($documento, $conexion): bool
{
    $sql = "SELECT * FROM cupos WHERE id = '$documento'";
    $resultado = $conexion->query($sql);
    $filas = $resultado->num_rows;
    if ($filas > 0) {
        return true;
    } else {
        return false;
    }
}
}

$c_afiliado = new Cupos();

include('Conexion_bc.php');
$conexion = conexion(); // Guarda la conexión en una variable
date_default_timezone_set('America/Bogota'); //configuración de zona horaria a colombia


//------------------- Variables ----------------------------------
$documento = $_POST['documento'];
$sede = $_POST['sede'];
if ($sede == "Cardio") {
    $sede = "137";
} else {
    $sede = "125";
}
$rol = $_SESSION['rol'];
$url = $_POST['url'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$hora = date("H:i ", strtotime($hora));
//--------------------------------------------


if ($c_afiliado-> Validar_Hora($hora) && $c_afiliado->Validar_Fecha($fecha) >= 0) {
   
    if (!$c_afiliado->Estado($documento, $conexion)) {

       if ($c_afiliado->Registros($conexion)) {
        
            header("Location: ../$url");
            exit();
        } else {
            
            header("Location: ../paginas/usuarios/apartar_cupos.php?mensaje=0");  
            exit();
        }
    } else {
       
        header("Location: ../paginas/usuarios/apartar_cupos.php?mensaje=0");  
        exit();
    }
    
}else {
       
    header("Location: ../paginas/usuarios/apartar_cupos.php?mensaje=0");  
    exit();
}