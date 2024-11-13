<?php
include 'Conexion_bc.php';
$conexion = conexion();
class Registro
{
    private $conexion;
    private $documento;
    private $nombre_completo;
    private $correo;
    private $celular;
    private $genero;
    private $contrasena;
    private $sede;
    private $rol;
    private $fecha;
    private $codigo;
    public function __construct($conexion, $documento, $nombre, $correo, $celular, $genero, $contrasena, $sede, $rol)
    {
        $this->conexion = $conexion;
        $this->documento = $documento;
        $this->nombre_completo = strtolower($nombre);
        $this->correo = strtolower($correo);
        $this->celular = $celular;
        $this->genero = $genero;
        $this->contrasena = $contrasena;
        $this->sede = $sede;
        $this->rol = $rol;
        $this->fecha = date("Y-m-d-");
        $dominio_especifico = "unicesar.edu.co";
        $this->codigo = $this->Token();
        $this->contrasena = $this->Codificar($contrasena);
        //valida los datos
        if ($this->Validar_datos() && $this->Consulta($this->correo, $this->conexion) && $this->Contrasena_guardar($this->contrasena)) {
            if ($this->rol === "3") {
                if (strpos($this->correo, "@" . $dominio_especifico) !== false) {
                    $this->Registar();
                }
            } else {
                $this->Registar();
            }
        } else {
            if ($this->rol == '3') {
                echo '<script>
                window.location ="../index.php?error=1";
                </script>';
            } else {
                echo "<script>
                window.location ='../paginas/Administrador/registrar.php?mensaje=0';
                </script>";
            }
        }
    }
    //funciones
    //valida que los datos esten llenos
    private function Validar_datos()
    {
        //Valida que los datos esten llenos
        if (empty($this->documento) || empty($this->nombre_completo) || empty($this->correo) || empty($this->celular) || empty($this->genero) || empty($this->contrasena) || empty($this->sede) || empty($this->rol)) {
            if ($this->sede === '1') {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    //verifica que el correo sea de la universidad
    private function Consulta($email, $conexion)
    {
        //verificación de correo y usuario
        $consulta_email = "SELECT * FROM usuarios WHERE correo='$email'";
        $Verificacion_email = mysqli_query($conexion, $consulta_email);
        //verificación correo
        if (mysqli_num_rows($Verificacion_email) > 0) {
            return false;
        } else {
            return true;
        }
    }
    //registra los datos
    private function Registar()
    {
        try {
            //registra los datos en las diferentes tablas de la base de datos
            $query_verificar = "INSERT INTO `verificaciones`(`id`, `correo`, `token`) VALUES ('$this->documento','$this->correo','$this->codigo')";
            $query_usuarios = "INSERT INTO `usuarios`(`id`, `correo`, `contrasena`, `rol`, `estado`, `verificacion`) VALUES ('$this->documento','$this->correo','$this->contrasena','$this->rol','1','0')";
            $query_personas = "INSERT INTO `persona`(`documento`, `nombre completo`, `celular`, `sexo`, `fecha de ingreso`) VALUES ('$this->documento','$this->nombre_completo','$this->celular','$this->genero','$this->fecha')";
            //ejecuta las consultas
            $ejecutar_persona = mysqli_query($this->conexion, $query_personas);
            $ejecutar_usuarios = mysqli_query($this->conexion, $query_usuarios);
            if ($ejecutar_persona && $ejecutar_usuarios) {
                mysqli_query($this->conexion, $query_verificar);
                $email = base64_encode($this->correo);
                if ($this->rol == '3') {
                    echo "<script>
                    window.location ='vendor_validar.php?correo=$email&codigo=$this->codigo';
                    </script>";
                } else {
                    echo "<script>
                    window.location ='../paginas/Administrador/registrar.php?mensaje=1';
                    </script>";
                }
            } else {
                if ($this->rol == '3') {
                    echo '<script>
                    window.location ="../index.php?error=1";
                    </script>';
                } else {
                    echo "<script>
                    window.location ='../paginas/Administrador/registrar.php?mensaje=0';
                    </script>";
                }
            }
            cerrar_conexion($this->conexion);
        } catch (\Throwable $th) {
            if ($this->rol == '3') {
                echo '<script>
                window.location ="../index.php?error=1";
                </script>';
            } else {
                echo "<script>
                window.location ='../paginas/Administrador/registrar.php?mensaje=0';
                </script>";
            }
        }
    }
    //genera un token de 8 digitos
    private function Token()
    {
        return rand(10000000, 99999999);
    }
    //codifica la contraseña
    private function Codificar($elemento)
    {
        return password_hash($elemento, PASSWORD_DEFAULT);
    }
    //verifica la contraseña
    private function Contrasena_guardar($contrasena)
    {
        if (strlen($contrasena) >= 8) {
            if (
                preg_match('/[A-Z]/', $contrasena) && preg_match('/[a-z]/', $contrasena) && preg_match('/[0-9]/', $contrasena)
                && preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $contrasena)
            ) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
if ($_POST['rol'] == "Administador") {
    $rol = '1';
    $sede = '1';
} else if ($_POST['rol'] == "Instructor") {
    $sede = '1';
    $rol = '2';
} else {
    $rol = '3';
    $sede = $_POST['sede'];
}

new Registro($conexion, $_POST['documento'], $_POST['nombre'], $_POST['correo'], $_POST['celular'], $_POST['op'], $_POST['password'], $sede, $rol);
