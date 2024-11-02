<?php
session_start();
if (!isset($_SESSION['Email'])) {
    header('Location: ../index.php');
    exit();
}
$caracteresEspeciales = ['@','#','$','%','^','&','*','!','(',')','-','+','=','{','}','[',']','|',':',';','"','\'','<','>','-',',','.','?','/','\\','~','`'];


include('Conexion_bc.php');
$conexion = conexion(); // Guarda la conexión en una variable

$correo = $_SESSION['Email'];
$rol = $_POST['rol'];
$url = $_POST['url'];
if ($rol !== '0') {
    $contrasena = $_POST['password'];
    $contrasena_nueva = $_POST['password_new'];
    if(Validar_pass($contrasena, $correo, $conexion) && Contraseña_Nueva($contrasena_nueva)){
        Registrar();
    }
       else{
        header("Location: $url?respuesta=0");
       }
   
} else {
    $contrasena = $_POST['password'];
    $c_contrasena= $_POST['confirmar_password'];
    if($contrasena === $c_contrasena){
        if(Validar_pass($contrasena, $correo, $conexion) && Contraseña_Nueva($contrasena_nueva)){
            Registrar();
        }
           else{
            header("Location: $url?respuesta=0");
           }
    } else{
        header("Location: $url?respuesta=0");
       }
}



// Funciones
// Funcion para validar los datos, si la contraseña actual es correcta o no
function Validar_pass($contrasena, $correo, $conexion): bool
{
    $qerry = "SELECT * FROM usuarios WHERE correo = '$correo'";
    $busqueda = mysqli_query($conexion, $qerry);
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

// Funcion para validar la contraseña nueva que cumpla con los requisitos
function Contraseña_Nueva($contrasena) {
    global $caracteresEspeciales;
    if (strlen($contrasena) >= 8) {
        if (preg_match('/[A-Z]/', $contrasena) && preg_match('/[a-z]/', $contrasena) &&  preg_match('/[0-9]/', $contrasena)
                   && preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $contrasena)) {
                        return true;
                    } else {
                        return false;
                    }
    } else {
        return false;
    }
               
}

// Funcion para registrar la nueva contraseña
function Registrar(){
    global $conexion;
    global $correo;
    global $contrasena_nueva;
    $contrasena_nueva = password_hash($contrasena_nueva, PASSWORD_DEFAULT);
    $qerry = "UPDATE usuarios SET contrasena = '$contrasena_nueva' WHERE correo = '$correo'";
    $busqueda = mysqli_query($conexion, $qerry);
    if ($busqueda) {
        return true;
    } else {
        return false;
    }
}