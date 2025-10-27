<?php 
if (isset($_POST['color'])){
    $value = $_POST['color'];
    setcookie("colorFondo", $value, time() + 3600);
    $color = $value;
    } else {
        $color = $_COOKIE["colorFondo"] ?? 'white';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>act1</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>
<body style="background-color: <?= $color?>;">
    <main class="container">
            <h1>Selecciona un color de fondo</h1>
            <form method="post" action="">
                <label>color
                    <select name="color">
                        <option value="#FFFFFF">Blanco</option>
                        <option value="#FF0000">rojo</option>
                        <option value="#00FF00">verde</option>
                        <option value="#0000FF">azul</option>
                        <option value="#FFFF00">amarillo</option>
                        <option value="#FFA500">naranja</option>
                        <option value="#FFC0CB">rosa</option>
                    </select>
                </label>
                <button type="submit">Cambiar color</button>

                <p>La cookie se guardara durante 1 hora</p>
            </form>
</main>
</body>
</html>