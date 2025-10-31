<?php
// Iniciamos sesion 
session_start();
// Metemos la variable de la sesion y la relacionamos con los contadores
if (!isset($_SESSION['contadorA'])) {
    $_SESSION['contadorA'] = 0;
}
if (!isset($_SESSION['contadorB'])) {
    $_SESSION['contadorB'] = 0;
}

// Hacemos que se vayan contando los votos y el borrado de los mismos
if (isset($_POST['opcionA'])) {
    $_SESSION['contadorA']++;
}
if (isset($_POST['opcionB'])) {
    $_SESSION['contadorB']++;
}
if (isset($_POST['borrar'])) {
    $_SESSION['contadorA'] = 0;
    $_SESSION['contadorB'] = 0;
}


// Redirigimosa a la pagina principal
header("Location: ./act3_1.php");
exit;
