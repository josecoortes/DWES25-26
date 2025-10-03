<?php
/*
---
title: Ejercicio 5: suma de los numeros del 1 al 10
desc: Suma total de los números del 1 al 10 
tags: [PHP, basico, while]
---
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Act 5</title>
</head>
<body>
<?php
$suma = 0;
$i = 1;

while ($i <= 10) {
    $suma += $i;
    $i++;
}

echo "La suma de los números del 1 al 10 es: $suma";
?>
</body>
</html>