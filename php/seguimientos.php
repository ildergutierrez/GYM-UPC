<?php
if (!isset($_SESSION['Email']) && !isset($_SESSION['nombre']) && !isset($_SESSION['rol'])) {
    header('Location: ../index.php');
}
include_once('Sancion.php');
class seguimeintos
{
    private $sancion;
    private $conexion;
    private $documento;

    public function __construct($conexion, $documento)
    {
        $this->conexion = $conexion;
        $this->documento = $documento;
        // echo $this->documento . "<br> Seguimientos";
        // die($this->Fallas());
        $this->Fallas();
    }
// Función para verificar las fallas
    private function  Fallas()
    {
        // echo "<br> Existe: <br>".$this->Existe()."Existencia <br>";
       
        if ($this->Existe()) {
            if ($this->Sumar() >= 3) {
                $this->sancion = new Sancion($this->conexion, $this->documento);
            } else {
                $sql = "INSERT INTO `seguimeintos`(`id`, `fallas`) VALUES ('$this->documento','1')";
                mysqli_query($this->conexion, $sql);
                $stmt = $this->conexion->prepare("DELETE FROM `cupos` WHERE  `id` = ?");
                $stmt->bind_param("s", $this->documento);
                $stmt->execute();
            }
        }
        
    }
    // Función para sumar las fallas
    private function Sumar()
    {
        $cont = 0;
        $sql = "SELECT * FROM `seguimeintos` WHERE `id` = '$this->documento'";
        $respuesta = mysqli_query($this->conexion, $sql);
        if ($respuesta && mysqli_num_rows($respuesta) > 0) {
            for ($i = 0; $i < mysqli_num_rows($respuesta); $i++) {
                $fila = mysqli_fetch_array($respuesta);
                if ($fila['id']) {
                    $cont++;
                }
            }
            return $cont;
        }
        return $cont;
    }
    // Función para verificar si existe el usuario
    private function Existe(): bool
    {
        $sql = "SELECT * FROM `cupos` WHERE `id` = '$this->documento'";
        $respuesta = mysqli_query($this->conexion, $sql);
        if ($respuesta && mysqli_num_rows($respuesta) > 0) {
            $fila = mysqli_fetch_array($respuesta);
            // echo $fila['lugar'];
            if ($fila['lugar'] == 0) {
                return true;
            }
        }
        // echo "No existe";
        return false;
    }
}
