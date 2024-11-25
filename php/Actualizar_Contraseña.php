<?php
// Incluimos los archivos necesarios
if ($rol !== '0') {
    session_start();
    if (!isset($_SESSION['Email'])) {
        header('Location: ../index.php');
        exit();
    }
}
include('Conexion_bc.php');
// Clase para actualizar la contraseña
class Actualizar_Contraseña
{
    private $correo;
    private  $conexion;
    private $rol;
    private $url;
    private $contrasena_actual;
    private $n_contrasena;

    public function __construct($conexion, $rol, $url, $contrasena_actual, $n_contrasena, $correo)
    {
        $this->conexion = $conexion;
        $this->rol = $rol;
        $this->url = $url;
        $this->contrasena_actual = $contrasena_actual;
        $this->n_contrasena = $n_contrasena;
        $this->correo = $correo;
        $this->Update();
    }
    // Funciones
    // Funcion para validar los datos, si la contraseña actual es correcta o no
    function Validar_pass(): bool
    {
        $qerry = "SELECT * FROM usuarios WHERE correo = '$this->correo'";
        $busqueda = mysqli_query($this->conexion, $qerry);
        if ($busqueda && mysqli_num_rows($busqueda) > 0) {
            $fila = mysqli_fetch_assoc($busqueda);
            $contrasena_almacenada = $fila['contrasena'];
            if (password_verify($this->contrasena_actual, $contrasena_almacenada)) {
                return true;
            } else {

                return false;
            }
        } else {
            return false;
        }
    }

    // Funcion para validar la contraseña nueva que cumpla con los requisitos
    function Contraseña_Nueva()
    {
        if (strlen($this->n_contrasena) >= 8) {
            if (
                preg_match('/[A-Z]/', $this->n_contrasena) && preg_match('/[a-z]/', $this->n_contrasena) &&  preg_match('/[0-9]/', $this->n_contrasena)
                && preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $this->n_contrasena)
            ) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    // Funcion para registrar la nueva contraseña
    function Registrar()
    {
        $contrasena_nueva = password_hash($this->n_contrasena, PASSWORD_DEFAULT);
        $qerry = "UPDATE usuarios SET contrasena = '$contrasena_nueva' WHERE correo = '$this->correo'";
        $busqueda = mysqli_query($this->conexion, $qerry);
        if ($busqueda) {
            return true;
        } else {
            return false;
        }
    }
// Funcion para actualizar la contraseña
    private function Update()
    {
        if ($this->rol !== '0') {

            if ($this->Validar_pass() && $this->Contraseña_Nueva()) {
                $this->Registrar();
                cerrar_conexion($this->conexion);
                header("Location: $this->url?respuesta=1");
            } else {
                cerrar_conexion($this->conexion);
                header("Location: $this->url?respuesta=0");
            }
        } else {
            if ($this->contrasena_actual === $this->n_contrasena) {
                $this->Registrar();
                cerrar_conexion($this->conexion);
                header("Location: $this->url?respuesta=1");
            } else {
                cerrar_conexion($this->conexion);
                header("Location: $this->url?respuesta=0");
            }
        }
    }
}

// Instancia de la clase
$conexion = conexion();
$actualizar = new Actualizar_Contraseña($conexion, $_POST['rol'], $_POST['url'], $_POST['password'],  $_POST['password_new'], $_POST['Email']);
