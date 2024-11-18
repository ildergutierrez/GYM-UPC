<!-- Destruye la sesion que esta iniciada y devuelve al usuario al index para que inicie sesion nuevamente -->
<?php
session_start();
class Cerrar_Sesion
{

    public function __construct()
    {
        $this->Destruir();
    }

    private function Destruir()
    {
        session_destroy();
        echo '<script> 
        window.location="../../index.php";
        </script>';
    }
}
new Cerrar_Sesion();
