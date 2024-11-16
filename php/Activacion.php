<?php 
class Activar_Automatica{
    private $inicio;
    private $fin;
    public function Activavcion($conxion){
        $sql ="SELECT * FROM actividades";
        $consulta = mysqli_query($conxion, $sql);
        if($consulta &&  mysqli_num_rows($consulta) > 0){
            $fila = mysqli_fetch_assoc($consulta);
            $this->inicio= new DateTime($fila['inicio']);
            $this->inicio= strtotime($this->inicio->format('Y-m-d'));
            $this->fin= new DateTime($fila['final']);
            $this->fin= strtotime($this->fin->format('Y-m-d'));
            $f_actual = date('Y-m-d');
            $f_actual = strtotime($f_actual);
            $diff = ($f_actual - $this->fin)/86400;
            $firs = ($this->inicio - $f_actual)/86400;
            if($firs <= 0 && $diff>=0){
                $_SESSION['Suspencion'] ='1';
                $eliminar = "DELETE FROM actividades";
                mysqli_query($conxion, $eliminar);
            }else{
            $_SESSION['final'] =$fila['final'];
            $_SESSION['Suspencion'] ='0';}
        }else{
        $_SESSION['Suspencion'] ='1';}
    }
}