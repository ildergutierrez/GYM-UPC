<?php
class Activar_Automatica
{
    private $inicio;
    private $fin;
    public function Activavcion($conxion)
    {
        $sql = "SELECT * FROM actividades";
        $consulta = mysqli_query($conxion, $sql);
        
        //Se verifica si la consulta se realizo correctamente y si hay datos
        if (mysqli_num_rows($consulta) > 0) {
            $fila = mysqli_fetch_assoc($consulta);
            $this->inicio = new DateTime($fila['inicio']);//Se crea un objeto de tipo DateTime
            $this->inicio = strtotime($this->inicio->format('Y-m-d'));//Se convierte la fecha a un formato de tiempo
            $this->fin = new DateTime($fila['final']);//Se crea un objeto de tipo DateTime
            $this->fin = strtotime($this->fin->format('Y-m-d'));//Se convierte la fecha a un formato de tiempo

            $f_actual = date('Y-m-d');//Se obtiene la fecha actual
            $f_actual = strtotime($f_actual);//Se convierte la fecha a un formato de tiempo

            $diff = ($f_actual - $this->fin) / 86400;//Se obtiene la diferencia de dias entre la fecha actual y la fecha final
            $firs = ($this->inicio - $f_actual) / 86400;//Se obtiene la diferencia de dias entre la fecha de inicio y la fecha actual

            //Se verifica si la fecha actual es mayor o igual a la fecha final y si la fecha de inicio es mayor a la fecha actual
            if ($firs <= 0 && $diff <= 0) {
                $eliminar = "DELETE FROM actividades";
                mysqli_query($conxion, $eliminar);
                $_SESSION['Suspencion'] = '1';
            } else {
                //Se verifica si la fecha de inicio es mayor a la fecha actual
                if ($firs > 0) {
                    $_SESSION['Suspencion'] = '1';
                } else {
                    $_SESSION['final'] = $fila['final'];
                    $_SESSION['Suspencion'] = '0';
                }
            }
        } else {
            $_SESSION['Suspencion'] = '1';
        }
    }
}
