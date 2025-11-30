<?php
        session_start();
        // Borrar variables de sesión
        unset($_SESSION);
        // Destruir la sesión
        session_destroy();
        // Redirigir de nuevo
        header("Location: carrito.php");
        exit();
?>


