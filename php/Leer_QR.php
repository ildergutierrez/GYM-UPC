<?php
session_start();
if (!isset($_SESSION['documento'])) {
    header('Location: ../index.php');
}
if (!isset($_GET['documento']) && !isset($_GET['fecha']) && !isset($_GET['hora']) && !isset($_GET['sede']) && !isset($_GET['limite'])) {
    header('Location: ../index.php');
}
require_once('seguimientos.php');

//class para leer el qr
class Leer_QR
{
    private $segimiento;
    private $conexion;
    private $documento;
    private $fecha;
    private $hora;
    private $limite;
    private $sede;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
        $this->documento = $_GET['documento'];
        $this->fecha = $_GET['fecha'];
        $this->hora = $_GET['hora'];
        $this->sede = $_GET['lugar'];
        $this->limite = $_GET['limite'];
        $this->V_Asistencia();
    }

    //Registrar cupos
    public function V_Asistencia(): void
    {
        if ($this->Validar_Fecha($this->fecha)) {
            if ($this->Validar_Hora($this->limite)) {

                $sql = "SELECT * FROM `cupos` WHERE `id` = '$this->documento'";
                $respuesta = mysqli_query($this->conexion, $sql);
                if ($respuesta && mysqli_num_rows($respuesta) > 0) {
                    $fila = mysqli_fetch_array($respuesta);
                    if ($fila['lugar'] > 0) {
                        $accion = "DELETE FROM `cupos` WHERE `id` = '$this->documento'";
                        $respuesta = mysqli_query($this->conexion, $accion);
                    } else {
                        //Sanciona  al afiliado
                        $this->segimiento = new seguimeintos($this->conexion, $this->documento);
                        $accion = "DELETE FROM `cupos` WHERE `id` = '$this->documento'";
                        $respuesta = mysqli_query($this->conexion, $accion);
                        header("location: ../paginas/instructor/leer_qr.php?mensaje=2&documento=$this->documento&hora=$this->hora&fecha=$this->fecha&lugar=$this->sede&limite=$this->limite");
                        exit();
                    }
                } else {
                    header("location: ../paginas/instructor/leer_qr.php?mensaje=3");
                    exit();
                }
            } else {
                $this->Proceso();
            }
        } else {
            $this->Proceso();
        }
    }
    //Proceso de eliminacion
    private function Proceso():void
    {
        $this->segimiento = new seguimeintos($this->conexion, $this->documento);
        $accion = "DELETE FROM `cupos` WHERE `id` = '$this->documento'";
        mysqli_query($this->conexion, $accion);
        header("location: ../paginas/instructor/leer_qr.php?mensaje=2&documento=$this->documento&hora=$this->hora&fecha=$this->fecha&lugar=$this->sede&limite=$this->limite");
        exit();
    }
    //Validar la hora
    private function Validar_Hora($limite): bool
    {
        $hora_actual = date("H:i ");
        $hora = strtotime($limite);
        $hora_actual = strtotime($hora_actual);
        $diferncia = ($hora - $hora_actual) / 3600;
        return $diferncia >= 0;
    }
    //Validar la fecha
    private function Validar_Fecha($limite): bool
    {
        $fecha_actual = date("Y-m-d");
        $fecha = strtotime($limite);
        $fecha_actual = strtotime($fecha_actual);
        $diferncia = ($fecha - $fecha_actual) / 86400;
        if ($diferncia === 0) {
            return true;
        } else {
            return false;
        }
    }
}
include('Conexion_bc.php');
$conexion = conexion();
new Leer_QR($conexion);
