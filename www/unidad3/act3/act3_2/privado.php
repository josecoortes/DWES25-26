<?php
session_start();

if(empty($_SESSION['usuario'])){
    header("Location: ./");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Document</title>
</head>
<style>
    p{
        color: red;
    }
</style>
<body>
    <main class="container">
        <div >
            <p >Estas en una zona secreta, solo puedes verla si eres una persona identificada</p>
            <a href="cerrar-sesion.php">Cerrar sesión</a>
        </div>
    </main>
</body>

</html>