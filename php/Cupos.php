<?php
//iniciar sesion
session_start();
include('Verificacion_fechas.php');
if (!isset($_SESSION['documento']) && !isset($_SESSION['rol']) === "3") {
    header('Location: ../index.php');
    exit();
}
//validar campos vacios
if (empty($_POST['documento']) || empty($_POST['sede'])  || empty($_POST['fecha']) || empty($_POST['hora'])) {
    header('Location: ../index.php');
    exit();
}
//Clase para registrar cupos por parte de los usuarios
class Cupos
{
    private $conexion;
    private $documento;
    private $fecha;
    private $hora;
    private $sede;
    private $url;
    private $capacidad;

    public function __construct($conexion, $documento, $fecha, $hora, $sede,  $url)
    {
        date_default_timezone_set('America/Bogota');
        $this->conexion = $conexion;
        $this->documento = $documento;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->sede = $sede;
        $this->url = $url;
        if ($this->Validar_Fecha($this->fecha) == -1) {
            header("Location: ../paginas/usuarios/apartar_cupos.php?mensaje=0");
            exit();
        }
        // die($this->Validar_Hora($this->hora));
        if ($this->validar_hora($this->hora) == false) {
            header("Location: ../paginas/usuarios/apartar_cupos.php?mensaje=0");
            exit();
        }
        $this->Retornar_id_lugar($this->sede);
        $this->Accion();
    }

    private function Accion()
    {
        if ($this->Validar_Fecha($this->fecha) == 1) {
            // die("entro");       
            if (!$this->Estado($this->documento, $this->conexion)) {

                if ($this->Registros($this->conexion)) {
                    cerrar_conexion($this->conexion);
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
            if ($this->Validar_Hora($this->hora)) {

                if (!$this->Estado($this->documento, $this->conexion)) {

                    if ($this->Registros($this->conexion)) {
                        cerrar_conexion($this->conexion);
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
    }

    //Registrar cupos
    function Registros($conexion): bool
    {
        $this->sede = $this->Retornar_id_lugar($this->sede);
        // die($this->Estado_Capacidad($this->hora, $this->fecha, $this->sede));
        if($this->Estado_Capacidad($this->hora,$this->fecha,$this->sede)){
        $hora_limite = date("H:i", strtotime($this->hora . "+ 15 minutes"));
        $sql = "INSERT INTO `cupos`(`id`, `fecha`, `hora`, `hora_limite`, `lugar`) VALUES ('$this->documento','$this->fecha','$this->hora','$hora_limite','$this->sede')";
        $resultado = mysqli_query($conexion, $sql);
        if ($resultado) {
            return true;
        } else {
            return false;
        }}else
        return false;
    }

    //determinar diferencia entre las horas
    function Validar_Hora($hora): bool
    {
        $valido = $this->Validar_Fecha($this->fecha);
        if ($valido == 2) {
            $hora_actual = date("H:i ");
            $hora1 = strtotime($hora);
            $hora2 = strtotime($hora_actual);
            $zonah = ($hora1 - $hora2) / 3600;
            // echo "<br>Hora ".$zonah;
            if ($zonah >= 1) {
                return true;
            } else {
                return false;
            }
        }
        if ($valido == 1) {
            return true;
        }
        return false;
    }

    //validar fecha
    private function Validar_Fecha($fecha): int
    {
        $fecha_actual = date("Y-m-d"); //fecha actual
        $fecha1 = strtotime($fecha); //fecha del formulario
        $fecha2 = strtotime($fecha_actual); //fecha actual transfromada
        $zonah = ($fecha1 - $fecha2) / 86400; //diferencia de dias
        $diaSemana = date('N', strtotime($fecha)); //numero de dia de la semana
        // echo "<br>Formulario ".$fecha1;
        // echo "<br>Actual ".$fecha2;
        // echo "<br>Dife ".$zonah;
        // echo "<br>semana ".$diaSemana;
        if ($diaSemana == 6 || $diaSemana == 7) {
            return -1;
        }
        if ($zonah == 0) {
            return 2;
        }
        if ($zonah >= 1) {
            // echo "<br>Fecha valida";
            return 1;
        }
        return -1;
    }

    private function Retornar_id_lugar($nombre): string
    {
        $nombre = trim($nombre);
        $id = "";
        $consulta = "SELECT * FROM lugares where nombre = '$nombre'";
        $retorno = mysqli_query($this->conexion, $consulta);
        if ($retorno && $retorno->num_rows > 0) {
            $fila = mysqli_fetch_array($retorno);
            $id = $fila['id'];
        }
        return $id;
    }

    //Determina si se alcanzo la capacidad el lugar segun la hora y fecha
    private function Estado_Capacidad($hora, $fecha, $lugar): bool
    {
        $tabla_capacidades = "SELECT * FROM `capacidades`WHERE lugar = '$lugar'";
        $querry = mysqli_query($this->conexion, $tabla_capacidades);
        if ($querry) {
            $valor = mysqli_fetch_array($querry);
            $this->capacidad = $valor['capacidad'];
        }
        if ($this->capacidad > 0) {
            $filas = 0;
            // -------------------- Consultar los cupos --------------------------//
            $cupos = "SELECT fecha, hora FROM cupos WHERE fecha ='$fecha' AND  hora ='$hora'";
            $consulta_cupos  = mysqli_query($this->conexion, $cupos);
            if ($consulta_cupos) {
                $filas = mysqli_num_rows($consulta_cupos);
                // echo "El número de filas es: " . $filas;
                // echo "El número de capacidad  es: " . $this->capacidad;
            }

            // echo "<br> retorno: ";

            if ($filas >= $this->capacidad)
                return false;
            else
            return true;
        } else
            return false;
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
if (!verificacion($conexion, $fecha)) {
    header("Location: ../paginas/usuarios/apartar_cupos.php?mensaje=2");
    exit();
}
if (!Diferencia($fecha)) {
    header("Location: ../paginas/usuarios/apartar_cupos.php?mensaje=3");
    exit();
} else {
    $Cupos = new Cupos($conexion, $documento, $fecha, $hora, $sede,  $url);
}
