<?php

class Actualizar_cupos
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
        $this->Actualizar_cupos();
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
                $d=$this->Hora($hora, $fecha);
                if ($d < 0) {
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
    private function Hora($hora, $fecha): int
    {  
        $fecha_estado = $this->Fecha($fecha);
        if ($fecha_estado > 0) {
            return 1;
        }
        if ($fecha_estado == 0) {
            $hora_actual = date("H:i ");//hora actual
            $hora1 = strtotime($hora);//hora de la base de datos
            $hora2 = strtotime($hora_actual);//hora actual
            $zonah = ($hora1 - $hora2) / 3600;
            if ($zonah < 0) {
                return -1;
            }
            else {
                return 1;
            }
        }else{
            return -1;
        }
        
    }

    //validar fecha
    private function Fecha($fecha): int
    {
        $fecha_actual = date("Y-m-d"); //fecha actual
        $fecha1 = strtotime($fecha); //fecha de la base de datos
        $fecha2 = strtotime($fecha_actual); //fecha actual
        $zonah = ($fecha1 - $fecha2) / 86400; //diferencia de dias
        if ($zonah == 0) {
            return -1;
        }
        if ($zonah >= 1) {
            return 1;
        } else {
            return -1;
        }
    }
}
