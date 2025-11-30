<?php
session_start();

// Si no existe el carrito en la sesión, se crea
if (!isset($_SESSION["carrito"])) {
    $_SESSION["carrito"] = array();
}

// Si se agrega un producto (desde el formulario)
if (isset($_POST["producto"]) && $_POST["producto"] != "") {
    $producto = $_POST["producto"];
    $_SESSION["carrito"][] = $producto; // Se añade al array de la sesión
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Carrito de compras con sesión</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
</head>
<body>
    <main class="container" style="max-width:600px;margin:40px auto;">
        <h1>🛒 Carrito de compras</h1>

        <form method="post" action="">
            <label>Agregar producto:</label>
            <input type="text" name="producto" required>
            <button type="submit">Agregar</button>
        </form>

        <h2>Productos en el carrito:</h2>
        <?php
        if (empty($_SESSION["carrito"])) {
            echo "<p>No hay productos en el carrito.</p>";
        } else {
            echo "<ul>";
            foreach ($_SESSION["carrito"] as $item) {
                echo "<li>" . htmlspecialchars($item) . "</li>";
            }
            echo "</ul>";
        }
        ?>

        <a href="vaciar.php">Vaciar carrito</a>
    </main>
</body>
</html>
