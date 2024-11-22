<?php
  // Función para manejar la destrucción de la sesión por inactividad
  function verificar_inactividad($rol, $tiempoInactividad = 15 * 60) {
      if ($rol != 2) { // Aplicar solo para roles diferentes de 2
          // Iniciar la sesión si no se ha iniciado
          if (session_status() == PHP_SESSION_NONE) {
              session_start();
          }
  
          // Verificar si existe la variable de última actividad
          if (!isset($_SESSION['ultima_actividad'])) {
              $_SESSION['ultima_actividad'] = time(); // Inicializar la última actividad
          } else {
              // Calcular el tiempo transcurrido desde la última actividad
              $tiempoTranscurrido = time() - $_SESSION['ultima_actividad'];
  
              // Si el tiempo de inactividad supera el límite, destruir la sesión
              if ($tiempoTranscurrido > $tiempoInactividad) {
                  session_unset(); // Eliminar todas las variables de sesión
                  session_destroy(); // Destruir la sesión
                  header('Location: ../../index.php?usuario=session_expired'); // Redirigir al inicio
                  exit();
              }
          }
  
          // Actualizar la marca de tiempo de la última actividad
          $_SESSION['ultima_actividad'] = time();
      }
  }
  

  ?>

