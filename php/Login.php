<?php
class Login
{
    private $conexion;
    private $documento;
    private $nombre;
    private $rol;
    private $estado;
    private $telefono;
    private $genero;
    private $email;
    private $contraseña;
    private $direccion;

    public function __construct($conexion, $email, $contraseña, $direccion)
    {
        $this->conexion = $conexion;
        $this->email = $email;
        $this->contraseña = $contraseña;
        $this->direccion = $direccion;
        $this->Accion();
    }

    // Funciones
    // Convierte la cadena a minúsculas y pone la primera letra en mayúscula
    public function convertirFrase($frase)
    {
        return ucwords(strtolower($frase));
    }

    //busca el nombre, celular y sexo dentro de la base de datos en la tabla persona
    function nombre($documento, $conexion)
    {
        $qerry = "SELECT * FROM persona WHERE documento = '$documento'";
        $busqueda = mysqli_query($conexion, $qerry);
        $fila = mysqli_fetch_assoc($busqueda);
        $array = array();
        $array[0] = $fila['nombre completo'];
        $array[1] = $fila['celular'];
        $array[2] = $fila['sexo'];
        return $array;
    }

    //verifica si el correo existe en la base de datos
    function verificar($correo, $conexion)
    {
        $qerry = "SELECT * FROM usuarios WHERE correo = '$correo'";
        $busqueda = mysqli_query($conexion, $qerry);
        if ($busqueda && mysqli_num_rows($busqueda) > 0) {
            return true;
        }
        return false;
    }

    private function Accion()
    {
        $qerry = "SELECT * FROM usuarios WHERE correo = '$this->email'";
        //Ejecución de la consulta y asignacion de valores a los $_session
        if ($this->verificar($this->email, $this->conexion) != false) {
            $busqueda = mysqli_query($this->conexion, $qerry);
            if (!$busqueda) {
                die("Error en la consulta: " . mysqli_error($this->conexion));
            }
            if ($busqueda && mysqli_num_rows($busqueda) > 0) {
                $fila = mysqli_fetch_assoc($busqueda);
                $documento = $fila['id'];
                $rol = $fila['rol'];
                $estado = $fila['estado'];
                $contrasena_almacenada = $fila['contrasena'];
                $datos = $this->nombre($fila['id'], $this->conexion);
                $nombre = $datos[0];
                $telefono = $datos[1];
                $genero = $datos[2];
                $id_user = $fila['id'];
                if (password_verify($this->contraseña, $contrasena_almacenada)) {
                    if ($fila['verificacion'] == '1') {
                        $_SESSION['Email'] = $this->email;
                        $_SESSION['nombre'] = $this->convertirFrase($nombre);
                        $_SESSION['documento'] = trim($id_user);
                        $_SESSION['rol'] = trim($rol);
                        $_SESSION['estado'] = trim($estado);
                        $_SESSION['telefono'] = trim($telefono);
                        $_SESSION['genero'] = trim($genero);
                        // Define la dirección de redirección antes de usarla

                        header("Location: $this->direccion");
                        exit();
                    } else {
                        $email = base64_encode($this->email);
                        echo "<script>
                                        window.location ='../paginas/index/Verificacion_correo.php?correo=$email';
                </script>";
                        exit();
                    }
                } else {
                    echo "<script>
                window.location.href = '../index.php?error=0';
                </script>";
                    exit();
                }
            } else {
                echo "No se encontró el usuario.";
            }
        } else {
            echo "<script>
    window.location.href = '../index.php?error=0';
    </script>";
            exit();
        }
        cerrar_conexion($this->conexion); // Cierra la conexión
    }
}


session_start();
if (!isset($_POST['usuario']) || !isset($_POST['password'])) {
    echo '<script>
    window.location="../index.php";
    </script>';
    exit();
}


include('Conexion_bc.php');
$conexion = conexion(); // Guarda la conexión en una variable
$direccion = '../paginas/view/bienvenida.php';

// Variables
$email = strtolower($_POST['usuario']);
$contraseña = $_POST['password'];


// Consulta para buscar el usuario en la base de datos
$login = new Login($conexion, $email, $contraseña, $direccion);
