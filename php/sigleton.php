<?php
class ConexionSingleton
{
    private $host = 'sql207.infinityfree.com';
    private $usuario = 'if0_37735602';
    private $contrasena = 'Jb1TDHK7tXtJ';
    private $basedd = 'if0_37735602_gymupc';
    private $port = '3306';
    // La instancia estática de la clase, inicializada como null
    private static $instancia = null;
    // La propiedad que guarda la conexión a la base de datos
    private $conexion;

    // El constructor es privado, para que no se pueda crear una nueva instancia desde fuera
    private function __construct()
    {
        
        // Conexión a la base de datos
        // $this->conexion = new mysqli("sql207.infinityfree.com", "if0_37735602", "Jb1TDHK7tXtJ", "if0_37735602_gymupc", "3306");
        $this->conexion = new mysqli("localhost", "root", "", "gymupc");
        if ($this->conexion->connect_error) {
            die('Error de conexión: ' . $this->conexion->connect_error);
        }
    }

    // Método estático para obtener la única instancia de la clase
    public static function getInstancia()
    {
        // Si no existe una instancia, la creamos
        if (self::$instancia === null) {
            self::$instancia = new ConexionSingleton();
        }
        // Devolvemos la instancia
        return self::$instancia;
    }

    // Método para obtener la conexión a la base de datos
    public function getConexion()
    {
        return $this->conexion;
    }

    // Método para cerrar la conexión
    public function cerrarConexion()
    {
        if ($this->conexion) {
            $this->conexion->close();
            self::$instancia = null;  // Se elimina la instancia cuando se cierra la conexión
        }
    }
}

