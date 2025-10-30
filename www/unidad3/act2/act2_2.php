<?php

if (isset($_POST['aceptar_cookies'])) {

    setcookie('cookies_aceptadas', 'si', time() + 86400);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
} elseif (isset($_POST['borrar_cookies'])) {

    setcookie('cookies_aceptadas', '', time() - 3600);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}


$cookiesAceptadas = isset($_COOKIE['cookies_aceptadas']) && $_COOKIE['cookies_aceptadas'] === 'si';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
    <title>Página con Cookies</title>
</head>

<body>
    <main class="container" style="max-width:600px;margin:40px auto;">
        <div>
            <h1>Bienvenido</h1>
            <p>Contenido de tu página principal...</p>
        </div>

        <?php if (!$cookiesAceptadas): ?>
            <div>
                <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
                    <p>Usamos cookies para mejorar tu experiencia. Al continuar aceptas nuestra Política de Cookies.</p>
                    <button type="submit" name="aceptar_cookies">Aceptar cookie</button>
                </form>
            </div>
        <?php else: ?>
            <div>
                <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
                    <button type="submit" name="borrar_cookies">🧹Borrar cookies</button>
                </form>
            </div>
        <?php endif; ?>
    </main>
</body>

</html>