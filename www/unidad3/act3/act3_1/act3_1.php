<?php
session_start();

if (!isset($_SESSION['votosA'])) $_SESSION['votosA'] = 0;
if (!isset($_SESSION['votosB'])) $_SESSION['votosB'] = 0;

$maxVotos = 20;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Votación</title>
    <link rel="stylesheet" href="pico.min.css">
</head>

<body>
    <main class="contenedor" style="max-width:600px;margin:40px auto;">
        <h1>Votación</h1>

        <p>Opción A: <?php echo $_SESSION['votosA']; ?> votos</p>
        <meter value="<?php echo $_SESSION['votosA']; ?>" min="0" max="<?php echo $maxVotos; ?>"></meter>

        <p>Opción B: <?php echo $_SESSION['votosB']; ?> votos</p>
        <meter value="<?php echo $_SESSION['votosB']; ?>" min="0" max="<?php echo $maxVotos; ?>"></meter>

        <form action="votar.php" method="post">
            <button type="submit" name="opcion" value="A">Votar A</button>
            <button type="submit" name="opcion" value="B">Votar B</button>
            <button type="submit" name="opcion" value="reset">Poner a cero</button>
        </form>
    </main>
</body>

</html>