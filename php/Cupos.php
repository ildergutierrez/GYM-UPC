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

class Cupos
{
    private $conexion;
    private $documento;
    private $fecha;
    private $hora;
    private $sede;

    private $url;

    public function __construct($conexion, $documento, $fecha, $hora, $sede,  $url)
    {
        $this->conexion = $conexion;
        $this->documento = $documento;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->sede = $sede;
        $this->url = $url;
        $this->Accion();
    }


    private function Accion()
    {
        if ($this->Validar_Hora($this->hora) && $this->Validar_Fecha($this->fecha) >= 0) {

            if (!$this->Estado($this->documento, $this->conexion)) {

                if ($this->Registros($this->conexion)) {

                    header("Location: ../$this->url");
                    exit();
                } else {

                    header("Location: ../paginas/usuarios/apartar_cupos.php?mensaje=0");
                    exit();
                }
            } else {

                header("Location: ../paginas/usuarios/apartar_cupos.php?mensaje=0");
                exit();
            }
        } else {

            header("Location: ../paginas/usuarios/apartar_cupos.php?mensaje=0");
            exit();
        }
    }

    //Registrar cupos
    function Registros($conexion): bool
    {
       
        $this->sede = $this->Retornar_id_lugar($this->sede);
        $hora_limite = date("H:i", strtotime($this->hora . "+ 15 minutes"));
        $sql = "INSERT INTO `cupos`(`id`, `fecha`, `hora`, `hora_limite`, `lugar`) VALUES ('$this->documento','$this->fecha','$this->hora','$hora_limite','$this->sede')";
//revisar aca
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
        if ($this->Validar_Fecha($fecha) == 2) {
            $hora_actual = date("H:i ");
            $hora1 = strtotime($hora);
            $hora2 = strtotime($hora_actual);
            $zonah = ($hora1 - $hora2) / 3600;

            if ($zonah >= 1) {
                return true;
            } else {
                return false;
            }
        }
        return true;
    }

    //validar fecha
    private function Validar_Fecha($fecha): int|bool
    {
        $fechaObj = new DateTime($fecha);
        $fecha_actual = date("Y-m-d");

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

    private function Retornar_id_lugar($nombre): string
    {
        $nombre = trim($nombre);
        $id = "";
        $consulta = "SELECT * FROM lugares where nombre = '$nombre'";
        $retorno = mysqli_query($this->conexion, $consulta);
        if($retorno && $retorno->num_rows > 0){
            $fila = mysqli_fetch_array($retorno);
            $id = $fila['id'];
        }
        return $id;
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
include('Conexion_bc.php');
$conexion = conexion(); // Guarda la conexión en una variable
date_default_timezone_set('America/Bogota'); //configuración de zona horaria a colombia


//------------------- Variables ----------------------------------
$documento = $_POST['documento'];
$sede = $_POST['sede'];
$rol = $_SESSION['rol'];
$url = $_POST['url'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$hora = date("H:i ", strtotime($hora));
//--------------------------------------------

$Cupos = new Cupos($conexion, $documento, $fecha, $hora, $sede,  $url);
