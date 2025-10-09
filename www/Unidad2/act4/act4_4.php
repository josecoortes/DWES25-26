<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Act 4</title>
</head>
<body>
<?php
$numeros = range(0, 100);

$aleatorios = array_rand($numeros, 3);

$num1 = $numeros[$aleatorios[0]];
$num2 = $numeros[$aleatorios[1]];
$num3 = $numeros[$aleatorios[2]];

$media = ($num1 + $num2 + $num3) / 3;

echo "La media de $num1, $num2 y $num3 es $media";
?>
</body>
</html>