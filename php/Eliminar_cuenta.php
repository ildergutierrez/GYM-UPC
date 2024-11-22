<?php
//Archivo para eliminar la cuenta de un usuario
if (isset($_POST['identidad']) && isset($_POST['contra'])) {
    session_start();
    include("Conexion_bc.php");
    $conexion = conexion();
    $documento = $_POST['identidad'];
    $contrasena = $_POST['contra'];
    $correo = $_SESSION['Email'];
    try{ $qerry_b = "SELECT * FROM usuarios WHERE id = '$documento'";
    $busqueda = mysqli_query($conexion, $qerry_b);
    if ($busqueda && mysqli_num_rows($busqueda) > 0) {
        $fila = mysqli_fetch_assoc($busqueda);
        $contrasena_almacenada = $fila['contrasena'];
        if (password_verify($contrasena, $contrasena_almacenada)) {
            $qerry = "
            DELETE usuarios, persona
            FROM usuarios
            INNER JOIN persona ON usuarios.id = persona.documento
            WHERE usuarios.id = '$documento';
        ";//Se elimina la persona
            $eliminar = mysqli_query($conexion, $qerry);//Se elimina la cuenta
            if($eliminar){//Si se elimina la cuenta
                session_destroy();//Se cierra la sesion
                header("Location: ../index.php?usuario=$correo");//Se redirige al index
            }
        }
    }else{
        header("Location: ../index.php");//Se redirige al index
    }
}catch(Exception $e){
        echo $e;
    }
} else {
    header('Location: ../index.php');
    exit();
}
