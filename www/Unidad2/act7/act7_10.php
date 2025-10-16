<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>act 10</title>
</head>

<body>
    <?php
    // Declaramos las variables
    $iva = 0.21;
    $precio1 = 100;
    $precio2 = 250;
    $precio3 = 50;

    // Función flecha
    $precioConIVA = fn($precio) => $precio +($precio * $iva);

    
    $resultado1 = $precioConIVA($precio1);
    $resultado2 = $precioConIVA($precio2);
    $resultado3 = $precioConIVA($precio3);

    echo "El IVA es del 21%</br>";
    echo "Precio dinal de $precio1 : es $resultado1</br>";
    echo "Precio dinal de $precio2 : es $resultado2</br>";
    echo "Precio dinal de $precio3 : es $resultado3</br>";

    ?>
</body>

</html>