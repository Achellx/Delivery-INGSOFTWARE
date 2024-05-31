<?php
// Inicia la sesión
session_start();

// Destruye todas las variables de sesión
$_SESSION = array();

// Finaliza la sesión
session_destroy();

// Redirige a la página de inicio
header("Location: login.php");
exit();
?>
