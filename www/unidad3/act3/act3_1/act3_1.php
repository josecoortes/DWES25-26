<?php
// Iniciamos sesion 
session_start();
// Creamos las variables de sesion que vamos a utilizar para que las tengamos inicializadas antes de usarlas
if (!isset($_SESSION['contadorA'])) {
    $_SESSION['contadorA'] = 0;
}
if (!isset($_SESSION['contadorB'])) {
    $_SESSION['contadorB'] = 0;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>

<body>
    <main>
        <div class="container">
            <form method="post" action="./votar.php">
                <h2>Votación</h2>
                <p>Opcion A: <?= $_SESSION['contadorA'] ?> votos --- Opcion B: <?= $_SESSION['contadorB'] ?> votos</p>
                <button name="opcionA" type="submit">Votar A</button>
                <button name="opcionB" type="submit">Votar B</button>
                <button name="borrar" type="submit">Poner a cero</button>
            </form>
        </div>
        <div class="container">
            <h2>Resultados</h2>
            <p>Opcion A:</p>
            <meter value="<?= $_SESSION['contadorA'] ?>" min="0" max="20">
                <?= $_SESSION['contadorA'] ?>
            </meter>
            <p>Opcion B:</p>
            <meter value="<?= $_SESSION['contadorB'] ?>" min="0" max="20">
                <?= $_SESSION['contadorB'] ?>
            </meter>
            <p>Escala máxima 20 votos</p>
        </div>
    </main>
</body>

</html>