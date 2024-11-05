<?php

//esta clase genera el listado de lo usuarios del la plataforma y al instructor se le muestra las personas que estan en su lugar de trabajo
class Listar
{
    private $conexion;
    private $rol;
    public function __construct($conexion)
    {

        $this->conexion = $conexion;
    }
    //esta funcion genera el listado de los afiliados, esto es solo exclusivo para el instructor
    function Lista($instructor): array
    {
        $instructor = $this->Instructor($instructor);


        $conta = 0;
        $consulta = "SELECT * FROM cupos";
        $resultado = mysqli_query($this->conexion, $consulta);
        $lista = array();
        $devolver = array();
        while ($fila = mysqli_fetch_array($resultado)) {
            if ($fila['lugar'] !== '0' && $fila['lugar'] === $instructor) {

                $hora = $fila['hora'];
                $hora = strtotime($hora);
                $hora = date("g:i A", $hora);
                $lista[0] = $fila['id'];
                $lista[1] = $this->Retornar_Nombre($fila['id']);
                $lista[2] = $this->Retornar_Lugar($fila['lugar']);
                $lista[3] = date("d-m-Y", strtotime($fila['fecha']));
                $lista[4] = $hora;
                $devolver[$conta] = $lista[0] . " ;" . $lista[1] . " ;" . $lista[2] . "; " . $lista[3] . " ;" . $lista[4];
                $conta++;
            }
        }
        return $devolver;
    }

    //esta funcion retorna el nombre de la persona que se encuentra en la base de datos
    private function Retornar_Nombre($id): string
    {
        $consulta = "SELECT * FROM persona where documento = $id";
        $resultado = mysqli_query($this->conexion, $consulta);
        $nombre = "";
        if ($fila = mysqli_fetch_array($resultado)) {
            $nombre =  ucwords(strtolower($fila['nombre completo']));
        }
        return $nombre;
    }

    private function Retornar_Correo($id): string
    {
        $consulta = "SELECT * FROM usuarios where id = $id";
        $resultado = mysqli_query($this->conexion, $consulta);
        $correo = "";
        if ($fila = mysqli_fetch_array($resultado)) {
            $correo =  strtolower($fila['correo']);
            $this->rol = $fila['rol'];
        }
        return $correo;
    }

    //esta funcion retorna el nomre del lugar donde el afiliado esta inscrito, es exclusivo para el instructor
    private function Retornar_Lugar($id): string|bool
    {

        $consulta = "SELECT * FROM lugares where id = $id";
        $resultado = mysqli_query($this->conexion, $consulta);
        $lugar = "";
        if ($fila = mysqli_fetch_array($resultado)) {
            $lugar = $fila['nombre'];
            return $lugar;
        }
        return 0;
    }
    //Retorna el id del lugar donde el instructor esta designado 
    private function Instructor($documento): string
    {
        $consulta = "SELECT * FROM instructores where id = '$documento'";
        $resultado = mysqli_query($this->conexion, $consulta);
        $instructor = "";
        if ($fila = mysqli_fetch_array($resultado)) {
            $instructor = $fila['lugar'];
        }
        return $instructor;
    }

    //esta funcion retorna el listado de los usuarios que se encuentran en la base de datos, esto es exclusivo para el administrador
    public function Listado()
    {
        $personas = "SELECT * FROM `persona`";
        $resultado = mysqli_query($this->conexion, $personas);
        $lista = array();
        $devolver = array();
        $conta = 0;

        while ($fila = mysqli_fetch_array($resultado)) {
            $lista[0] = $fila['documento'];
            $lista[1] = ucwords(strtolower($fila['nombre completo']));
            $lista[2] = $this->Retornar_Correo($fila['documento']);
            $lista[3] = $fila['celular'];
            $lista[4] = $this->Rol($this->rol);
            $fecha=$fila['fecha de ingreso'];
            $lista[5] = date("d-m-Y", strtotime($fecha));
          
            $devolver[$conta] = $lista[0] . " ;" . $lista[1] . " ;" . $lista[2] . "; " . $lista[3] . " ;" . $lista[4] . " ;" . $lista[5];
            $conta++;
        }
        return $devolver;
    }
//esta funcion retorna el rol de la persona que se encuentra en la base de datos
    private function Rol($id): string
    {

        switch ($id) {
            case '1':
                return "Administrador";

            case '2':
                return "Instructor";

            case '3':
                return "Afiliado";

            default:
                return "Error";
        }
    }
}
