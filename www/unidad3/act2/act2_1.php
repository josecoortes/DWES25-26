<?php 
$mensaje = '';
$color = $_POST['color'] ?? 'blanco';
$mostrar_formulario = true;
if (!empty($_POST)) {
    if (!empty($_POST['color'])) {
        $color = $_POST['color'];
        $mensaje = "<p>Color seleccionado con exito<p>";
        $mostrar_formulario = false;
    } else
        $mensaje = "<p>Faltan datos o son incorrectos</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>act1</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" >
</head>
<body style="background-color: <?php $color?>;">
    <main class="container">
        <?php if ($mostrar_formulario):?>
            <h1>Selecciona un color de fondo</h1>
            <form method="post" action="">
                <label>color
                    <select name="color">
                        <option value="#FFFFFFF">Blanco</option>
                        <option value="FF0000">rojo</option>
                        <option value="00FF00">verde</option>
                        <option value="0000FF">azul</option>
                        <option value="FFFF00">amarillo</option>
                        <option value="FFA500">naranja</option>
                        <option value="FFC0CB">rosa</option>
                    </select>
                </label>
                <input type="submit" value="Cambiar color">
            </form>
                <?php endif;?>
</main>
</body>
</html>