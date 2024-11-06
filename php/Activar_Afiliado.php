<?php
class Activar_Afiliado
{
    private $id;
    private $fecha;
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;

    }
    //Reactiva a los usuarios que tengan excepciones en la tabla restricciones, Acción exclusiva para el administrador
    public function Accion_Administrador($id)
    {
        $this->id = $id;
        $this->Accion($this->id);
    }
    //Valida si la fecha actual es mayor a la fecha de reactivacion
    private function Validar_Fecha($fecha): bool
    {
        $fechaObj = new DateTime($fecha);
        $this->fecha = date("Y-m-d");

        $fecha1 = strtotime($fecha);
        $fecha2 = strtotime($this->fecha);
        $zonah = ($fecha1 - $fecha2) / 86400;
        if ($zonah >= 1) {

            return false;
        } else {

            return true;
        }
    }
    public function Validar_Activacion()
    {
        //seleccionar todas las restricciones
        $sql = "SELECT * FROM restricciones";
        $consulta = mysqli_query($this->conexion, $sql);
        if ($consulta && $consulta->num_rows > 0) {
            $resultado = mysqli_fetch_array($consulta);
            //bucle para recorrer las restricciones
            while ($consulta) {
                if ($this->Validar_Fecha($resultado['fecha_reactivacion'])) {
                    $this->id = $resultado['id'];
                    $this->Accion($this->id);
                }
            }
        }
    }

    //si la fecha supero la fecha de reactivacion, el sistema activa el usuario de forma automatica
    private function Accion($id)
    {
        //se activa el usuario
        $sql = "UPDATE usuarios SET estado = 1 WHERE id = '$id'";
        $resultado = $this->conexion->query($sql);
        if ($resultado) {
            //se elimina la restriccion
            $sql_restriccione = "DELETE FROM restricciones WHERE id = '$id'";
            $this->conexion->query($sql_restriccione);
        }
    }
}
if (isset($_POST['id'])) {
    include 'Conexion_bc.php';
    $conexion = conexion(); // Guarda la conexión en una variable
    $id = $_POST['id'];
    $activar = new Activar_Afiliado($conexion);
    $activar->Accion_Administrador($id);
    header('Location: ../paginas/Administrador/activar_afiliados.php?activado=true');
} 
