<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 1</title>
</head>

<body>
    <?php
    $productos_combinados = array_merge($proveedor1, $proveedor2);

    $productos_unicos = array_unique($productos_combinados);

    sort($productos_unicos);

    foreach ($productos_unicos as $producto) {
        echo $producto . "\n";
    }
    ?>
</body>

</html>