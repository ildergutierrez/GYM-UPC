<?php
include 'vendor_validar.php';

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
        $this->contrasena = $contrasena;
        //valida los datos
        // echo $this->correo."<br>" . $this->documento. "<br>". $this->nombre_completo. "<br>". $this->celular. "<br>". $this->genero. "<br>". $this->contrasena. "<br>". $this->sede. "<br>". $this->rol. "<br>". $this->fecha. "<br>". $this->codigo. "<br>". $this->contrasena. "<br>";
        // echo $this->Consulta($this->correo, $this->conexion);
        // echo $this->Contrasena_guardar($this->contrasena);
        // die($this->Validar_datos());
        if ($this->Validar_datos() && $this->Consulta($this->correo, $this->conexion) && $this->Contrasena_guardar($this->contrasena)) {
            // echo $this->contrasena;
            if ($this->rol === "3") {
                if (strpos($this->correo, "@" . $dominio_especifico) !== false) {
                    $this->Registar();
                }
            } else {
                $this->Registar();
            }
        } else {
            die("error");
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
        if (empty($this->documento) || empty(trim($this->nombre_completo)) || empty($this->correo)|| empty($this->celular) || empty($this->genero) || empty($this->contrasena) || empty($this->sede ) || empty($this->rol )) {
        //    echo "error-1";
        //    echo "<br>1". $this->documento. "<br>2". $this->nombre_completo. "<br>3". $this->correo. "<br>4". $this->celular. "<br>5". $this->genero. "<br>6". $this->contrasena. "<br>7". $this->sede. "<br>8". $this->rol. "<br>9". $this->fecha. "<br>10". $this->codigo. "<br>11". $this->contrasena. "<br>";
            return true;
        }
        return false;
    }
    //verifica que el correo sea de la universidad
    private function Consulta($email, $conexion)
    {
        //verificación de correo y usuario
        $consulta_email = "SELECT * FROM usuarios WHERE correo='$email'";
        $Verificacion_email = mysqli_query($conexion, $consulta_email);
        //verificación correo
        if ($Verificacion_email && mysqli_num_rows($Verificacion_email) > 0) {
            return false;
        }
        return true;
    }
    //registra los datos
    private function Registar()
    {
        // echo $this->documento;
        try {
            if (Envio_Token( $this->correo, $this->codigo, $this->nombre_completo)) {
                //registra los datos en las diferentes tablas de la base de datos
                $query_verificar = "INSERT INTO `verificaciones`(`id`, `correo`, `token`) VALUES ('$this->documento','$this->correo','$this->codigo')";
                // die($query_verificar);
                $query_usuarios = "INSERT INTO `usuarios`(`id`, `correo`, `contrasena`, `rol`, `estado`, `verificacion`) VALUES ('$this->documento','$this->correo','$this->contrasena','$this->rol','1','0')";
                $query_personas = "INSERT INTO `persona`(`documento`, `nombre completo`, `celular`, `sexo`, `fecha de ingreso`) VALUES ('$this->documento','$this->nombre_completo','$this->celular','$this->genero','$this->fecha')";
                //ejecuta las consultas
                $ejecutar_persona = mysqli_query($this->conexion, $query_personas);
                $ejecutar_usuarios = mysqli_query($this->conexion, $query_usuarios);
                if ($ejecutar_persona && $ejecutar_usuarios) {
                    mysqli_query($this->conexion, $query_verificar);
                    $email = base64_encode($this->correo);
                    if ($this->rol == '3') {
                        $error = "../index.php?error=2";
                        echo "<script>
                            window.location ='../paginas/index/Verificacion_correo.php?correo=$email';
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
            }
            cerrar_conexion($this->conexion);
        } catch (\Throwable $th) {
            if ($this->rol == '3') {
                // echo $th;
                // die();
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

        // echo "<br>La contra es". $contrasena;
        if (strlen($contrasena) >= 8) {
            if (
                preg_match('/[A-Z]/', $contrasena) && preg_match('/[a-z]/', $contrasena) && preg_match('/[0-9]/', $contrasena)
                && preg_match('/[\'^£$%&*()}.:{@#~?><>,;´¨¿?"°!¡`|=_+¬-]/', $contrasena)
            ) {
                // echo "Contraseña válida para longitud: 8 o más caracteres<br>";
                $this->contrasena = $this->Codificar($contrasena);
                return true;
            }else{
                return false;
            }
        }
        
        return false;
    }
}
include 'Conexion_bc.php';
$conexion = conexion();
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

// echo $_POST['documento']."<br>";
// echo $_POST['nombre']."<br>";
// echo $_POST['correo']."<br>";
// echo $_POST['celular']."<br>";
// echo $_POST['op']."<br>";
// echo $_POST['password']."<br>";
// echo $_POST['rol']."<br>";
// echo $_POST['sede'];

new Registro($conexion, $_POST['documento'], $_POST['nombre'], $_POST['correo'], $_POST['celular'], $_POST['op'], $_POST['password'], $sede, $rol);
