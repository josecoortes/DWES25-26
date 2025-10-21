<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 1</title>
</head>

<body>
    <?php
    $obligatorios = ["nombre", "email", "telefono", "direccion"];

    $enviados = ["nombre", "email", "direccion"];

    $faltantes = array_diff($obligatorios, $enviados);
    
        echo "Faltan los siguientes campos obligatorios:\n";
        foreach ($faltantes as $campo) {
            echo "- " . $campo . "\n";
        }
    ?>
</body>

</html>