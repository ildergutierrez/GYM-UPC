<?php

class Reactivar_Actividad
{
    private $conexion;
    private $accion;
    private $f_actual;
    private $f_final;

    public function __construct($conexion, $accion, $f_actual, $f_final)
    {
        $this->conexion = $conexion;
        $this->accion = $accion;
        $this->f_actual = $f_actual;
        $this->f_final = $f_final;
       
        if ($this->f_actual != "" && $this->f_final != "") {
            $this->Activacion();
        }
    }

    private function Activacion()
    {
        try { 
            if ($this->accion == "Activar") {
                $consulta = "SELECT * FROM actividades";
                $respuesta = mysqli_query($this->conexion, $consulta);
                if ($respuesta && mysqli_num_rows($respuesta) > 0) {
                    $eliminar = "DELETE FROM actividades";
                    mysqli_query($this->conexion, $eliminar);
                    echo "<script>
                window.location.href = '../paginas/Administrador/actividades.php?respuesta=2';
                </script>";
                } else {
                    echo "<script>
                window.location.href = '../paginas/Administrador/actividades.php?respuesta=4';
                </script>";
                }
            } else {
                if ($this->Comparacion($this->f_actual, $this->f_final)) {
                    $consulta = "SELECT * FROM actividades";
                    $respuesta = mysqli_query($this->conexion, $consulta);
                    if ($respuesta && mysqli_num_rows($respuesta) > 0) {
                        if ($this->accion == "Suspender") {
                            echo "<script>
                        window.location.href = '../paginas/Administrador/actividades.php?respuesta=3';
                        </script>";
                        } 
                    }else {
                        $inicio = new DateTime($this->f_actual);
                        $fin= new DateTime($this->f_final);
                        $inicio = $inicio->format('Y-m-d');
                        $fin = $fin->format('Y-m-d');
                      
                            $guardar = "INSERT INTO `actividades`(`inicio`, `final`) VALUES ('$inicio','$fin')";
                            mysqli_query($this->conexion, $guardar);
                            echo "<script>
                            window.location.href = '../paginas/Administrador/actividades.php?respuesta=2';
                            </script>";
                        }
                }
                else{
                    echo "<script>
                    window.location.href = '../paginas/Administrador/actividades.php?respuesta=4';
                    </script>";
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            echo "<script>
                    window.location.href = '../paginas/Administrador/actividades.php?respuesta=4';
                    </script>";
        } finally {
            cerrar_conexion($this->conexion);
        }
    }



    //Validar fecha, Comparar fecha actual con la fecha de la actividad y la fecha final
    private function Comparacion($inicio, $fin): bool
    {
        $f_actual = new DateTime($inicio);
        $f_actual = strtotime($f_actual->format('Y-m-d'));
        $f_final = new DateTime($fin);
        $f_final = strtotime($f_final->format('Y-m-d'));
        $fecha = date('Y-m-d');
        $fecha = strtotime($fecha);
        $verificacion = ($fecha - $f_actual) / 86400;
        $diferencia = ($f_final - $f_actual) / 86400;
        if ($verificacion >= 0 && $diferencia >= 0) {
            return true;
        } else {
            return false;
        }
    }
}

session_start();
if (!isset($_SESSION['Email'])) {
    header('Location: ../index.php');
}

include 'Conexion_bc.php';
$conexion = conexion();
new Reactivar_Actividad($conexion, $_POST['accion'], $_POST['inicio'], $_POST['final']);
