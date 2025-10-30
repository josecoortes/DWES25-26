<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: act3_2.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Área Privada</title>
    <link rel="stylesheet" href="https://unpkg.com/picocss@1.*/css/pico.min.css">
</head>
<body>
    <main>
        <h1>Bienvenido <?php echo $_SESSION['email']; ?>!</h1>
        <p>Has accedido al área privada.</p>
        <form action="cerrar-sesion.php" method="post">
            <button type="submit">Cerrar sesión</button>
        </form>
    </main>
</body>
</html>
