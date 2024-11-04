<?php

class Actualizar_cupos
{
    private $conexion;

    public function __construct(mysqli $conexion)
    {
        $this->conexion = $conexion;
    }
//Actualizar cupos
    public function Actualizar_cupos()
    {
        $sql = "SELECT * FROM `cupos`";
        $resultado = mysqli_query($this->conexion, $sql);

        if ($resultado) {
            while ($cupos = mysqli_fetch_array($resultado)) {
                $id = $cupos['id'];
                $fecha = $cupos['fecha'];
                $hora = $cupos['hora_limite'];
                if (!$this->Hora($hora, $fecha)) {
                    // Si la hora o fecha no son válidas, actualiza el registro
                    $sql_update = "UPDATE `cupos` SET `lugar`='0' WHERE id = ?";
                    $stmt = mysqli_prepare($this->conexion, $sql_update);
                    if ($stmt) {
                        mysqli_stmt_bind_param($stmt, "i", $id);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_close($stmt);
                    }
                }
            }
            mysqli_free_result($resultado);
        } 
    }

    //validar hora
    private function Hora($hora, $fecha): bool
    {
        if ($this->Fecha($fecha) > 0) {
            if ($this->Fecha($fecha) > 1) {
                $hora_actual = date("H:i ");
                $hora1 = strtotime($hora);
                $hora2 = strtotime($hora_actual);
                $zonah = ($hora1 - $hora2) / 3600;

                return $zonah >= 0;
            }
            return true;
        }
        return false;
    }

    //validar fecha
    private function Fecha($fecha): int|bool
    {
        $fechaObj = new DateTime($fecha);
        $fecha_actual = date("Y-m-d");

        $fecha1 = strtotime($fecha);
        $diaSemana = $fechaObj->format('N');
        $fecha2 = strtotime($fecha_actual);
        $zonah = ($fecha1 - $fecha2) / 86400;


        if ($zonah === 0) {
            return 2;
        }
        if ($zonah >= 1) {

            return 1;
        } else {

            return 0;
        }
    }
}
