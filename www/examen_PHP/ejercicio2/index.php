<?php
session_start();
if (isset($_SESSION['intentos'])) {
    $_SESSION['intentos']++;
    $intentos = $_SESSION['intentos'];
} else{
    $_SESSION['intentos'] = 0;
    $numAleatorio = rand(1,10);
    $_SESSION['aleatorio'] = $numAleatorio; 
}
if (empty($_POST)) {
    $mensaje = "";
    }else if ($_POST['numero'] == $_SESSION['aleatorio']) {
        $mensaje =  "¡¡¡ Acertaste !!!. Has necesitado $intentos intentos";
        unset($_SESSION);
        session_destroy();
    }elseif ($_POST['numero'] > $_SESSION['aleatorio']) {
        $mensaje =  "El numero es mas bajo";
    }elseif ($_POST['numero'] < $_SESSION['aleatorio']) {
        $mensaje = "El numero es mayor";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Act2</title>
    <link rel="stylesheet" href="../pico.min.css">
</head>
<body>
    <main class="container">
    <h1>Número Secreto: Elige número entre 1 y 10</h1>
    <form method="post" action="">
    <label for="number">Números<br><input type="number" name="numero"></label>
    <button type="submit">comprobar</button>
    </form>
    <?php
    echo "<h3>$mensaje</h3>";
    ?>
    </main>
</body>
</html>