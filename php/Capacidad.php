<?php
class Capacidad
{
    private $cantidad;
    private $actual;
    private $lugar;
    private $conexion;
    public function __construct($conexion, $actual, $cantidad, $lugar)
    {
        $this->cantidad = $cantidad;
        $this->lugar = $lugar;
        $this->actual = $actual;
        $this->conexion = $conexion;
    }
    public function accion(): bool{
        return $this->Guardar();
    }
    private function Guardar(): bool
    {
        if ($this->actual > 0) {
            $sql = "UPDATE capacidades SET capacidad='$this->cantidad' WHERE lugar='$this->lugar' ";
        } else {
            $sql = "INSERT INTO capacidades(`lugar`, `capacidad`) VALUES ('$this->lugar','$this->cantidad')";
        }

        $accion = mysqli_query($this->conexion, $sql);
        if ($accion)
            return true;
        return false;
    }
}
session_start();
include 'Conexion_bc.php';
if (isset($_POST['capacidad']) || isset($_POST['actualm']) || isset($_POST['nueva']) && is_int($_POST['nueva'])) {
    if ($_POST['nueva'] > 0) {
        $conexion = conexion();
        $guardar = new Capacidad($conexion, $_POST['actualm'], $_POST['nueva'], $_POST['capacidad']);
        if($guardar->accion()){
           cerrar_conexion($conexion);
            echo "<script>
    window.location.href = '../paginas/Administrador/capacidad.php?realizacion=1';
    </script>";
        }else{
            cerrar_conexion($conexion);
            echo "<script>
    window.location.href = '../paginas/Administrador/capacidad.php?realizacion=0';
    </script>";
        }
    }
} else {
    echo "<script>
window.location.href = '../paginas/Administrador/capacidad.php?realizacion=2';
</script>";
}
