<?php

class Actualizar_cupos
{
    private $conexion;

    public function __construct($conexion)
    { date_default_timezone_set('America/Bogota');
        $this->conexion = $conexion;
        // echo "Actualizar cupos";
    //    die($this->Actualizar_cupos());
    }   
    //Actualizar cupos
    public function Actualizar_cupos()
    {
        $sql = "SELECT * FROM `cupos`";
        // echo $sql;
        $resultado = mysqli_query($this->conexion, $sql);
        if ($resultado) {
            while ($cupos = mysqli_fetch_array($resultado)) {
                $id = $cupos['id'];
                $fecha = $cupos['fecha'];
                $hora = $cupos['hora_limite'];
                // echo "<br>id".$id."<br>fecha".$fecha."<br>hora".$hora."<br><br>";
                $d=$this->Hora($hora, $fecha);
                // echo "<br> llamada hora".$d;
                // die();
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
            mysqli_free_result($resultado);//liberar memoria
            // die("Cupos actualizados");
        }
    }

    //validar hora
    function Hora($hora, $fecha):int
    {  
        // echo "<br>Hora (hora)".$hora;
        // echo "<br>Fecha".$fecha;
        $fecha_estado = $this->Fecha($fecha);
        // echo "<br>".$fecha_estado."sss<br>";
        if ($fecha_estado > 1) {
            return 1;
        }
        if ($fecha_estado == 1) {
            $hora_actual = date("H:i ");//hora actual
            $hora1 = strtotime($hora);//hora de la base de datos
            $hora2 = strtotime($hora_actual);//hora actual
            $zonah = ($hora1 - $hora2) / 3600;
            // echo "<br>Diferencia horas".$zonah;
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
            return 1;
        }
        if ($zonah >= 1) {
            return 2;
        } else {
            return -1;
        }
    }
}