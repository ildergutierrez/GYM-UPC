<?php
if (!isset($_SESSION['Email']) && !isset($_SESSION['nombre']) && !isset($_SESSION['rol'])) {
    header('Location: ../index.php');
}

class Sancion
{
    private $conexion;
    private $documento;
    private $fecha;
    private $hoy;
    public function __construct($conexion, $documento)
    {
        $this->hoy = date("Y-m-d");
        $this->fecha = date("Y-m-d", strtotime($this->hoy . "+ 15 days"));
        $this->conexion = $conexion;
        $this->documento = $documento;
        $this->Accion();

    }

private function Accion(){
   
        $this->Bloqueo();
    
}

    private function Eliminar_segimineto(): void
    {
        // Preparar la consulta para eliminar seguimientos
        $stmt = $this->conexion->prepare("DELETE FROM `seguimeintos` WHERE `id` = ?");
        $stmt->bind_param("s", $this->documento); // "s" indica que el parámetro es una cadena
        $resultado = $stmt->execute();

        if ($resultado) {
            // Preparar la consulta para actualizar el estado del usuario
            $stmt = $this->conexion->prepare("UPDATE `usuarios` SET `estado` = '0' WHERE `id` = ?");
            $stmt->bind_param("s", $this->documento);
            $stmt->execute();
        } 
    }

    private function Bloqueo(): void
    {
        $sql = "INSERT INTO `restricciones`(`id`, `fecha_inicio`, `fecha_reactivacion`) VALUES ('$this->documento','$this->hoy','$this->fecha')";
        $accion = mysqli_query($this->conexion, $sql);
        if ($accion) {
            $this->Eliminar_segimineto();
        }
    }
}
