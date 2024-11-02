<!-- Destruye la sesion que esta iniciada y devuelve al usuario al index para que inicie sesion nuevamente -->
<?php
session_start();

Destruir();

function Destruir(){
session_destroy();
echo '
<script> 
window.location="../../index.php";
</script>';
}