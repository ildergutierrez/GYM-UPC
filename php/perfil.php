<?php
session_start();
if (!isset($_POST['documento']) && !isset($_POST['rol'])) {

    header('Location: ../index.php');
    exit();
}
include('Conexion_bc.php');

class Perfil
{

    private  $conexion = conexion(); // Guarda la conexión en una variable

    private $rol ;
    private $documento ;
    private $correo ;
    private $nombre;
    private $celular;
    private $genero ;
    private $sede ;
    private $contrasena ;

    public function __construct($conexion, $documento, $correo, $nombre, $celular, $genero, $sede, $contrasena,$rol)
    {
        $this->conexion = $conexion;
        $this->documento = trim($documento);
        $this->correo = trim($correo);
        $this->nombre = $nombre;
        $this->celular = $celular;
        $this->genero = $genero;
        $this->sede = $this->Sede($sede);
        $this->contrasena = $contrasena;
        $this->rol = $rol;
        $this->Reescribir();
    }

    // Funciones

    private function Sede($sede): int
    {
        if ($this->sede === "Aguachica") {
            return 1;
        } else {
            return 2;
        }
    }

    // Funcion para validar los datos, si estan vacios o no
    function Validar_Datos(): bool
    {

        if (empty($this->correo) || empty($this->nombre) || empty($$this->elular) || empty($this->genero) || empty($this->sede) || empty($this->contrasena) || empty($this->documento) || empty($this->rol)) {
            if ($this->rol === "3" && str_contains($this->correo, "@unicesar.edu.co") && $this->sede === 1) {
                return true;
            } else {
                return false;
            }
            if ($rol !== "3") {
                return true;
            }
        }
        return false;
    }

    //funcion para validar la contraseña
    function Contrasena_actual($contrasena): bool
    {

        $qerry = "SELECT * FROM usuarios WHERE id = '$this->documento'";
        $busqueda = mysqli_query($this->conexion, $qerry);
        if ($busqueda && mysqli_num_rows($busqueda) > 0) {
            $fila = mysqli_fetch_assoc($busqueda);
            $contrasena_almacenada = $fila['contrasena'];
            if (password_verify($contrasena, $contrasena_almacenada)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    // Funcion para actualizar los datos del usuario
    function Actualizar_Datos()
    {

        $this->contrasena = password_hash($this->contrasena, PASSWORD_DEFAULT);
        $qerry_usuario = "UPDATE `usuarios` SET`correo`='$this->correo' WHERE id= '$this->documento'";
        $qerry_persona = "UPDATE `persona` SET `nombre completo`='$this->nombre',`celular`='$this->celular',`sexo`='$this->genero' WHERE documento = '$this->documento'";
        $actualizar = mysqli_query($this->conexion, $qerry_usuario);
        $actualizar_persona = mysqli_query($this->conexion, $qerry_persona);
        if ($actualizar && $actualizar_persona) {
            return true;
        } else {
            return false;
        }
    }
    private function Reescribir()
    {
        if ($this->Validar_Datos() && $this->Contrasena_actual($this->contrasena)) {

            if ($this->Actualizar_Datos()) {
                $_SESSION['Email'] = $this->correo;
                $_SESSION['nombre'] = strtoupper($this->nombre);
                $_SESSION['documento'] = trim($this->documento);
                $_SESSION['telefono'] = trim($this->celular);
                $_SESSION['genero'] = trim($this->genero);

                header("Location: ../paginas/usuarios/Configuracion.php?respuesta=1");
                exit();
            }
            exit();
        } else {
            header("Location: ../paginas/usuarios/Configuracion.php?respuesta=0");
            exit();
        }
    }
}

$perfil = new Perfil($conexion, $_POST['documento'], $_POST['correo'], $_POST['nombre'], $_POST['celular'], $_POST['op'], $_POST['sede'], $_POST['password'], $_POST['rol']);
