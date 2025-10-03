<?php
/*
---
title: Ejercicio 5: Mayor de 3 números
desc: 3 números aleatorios y muestra cual es el mayor
tags: [PHP, basico, while]
---
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Act 1</title>
</head>
<?php
$suma = 0;
$i = 1;

while ($i <= 10) {
    $suma += $i;
    $i++;
}

echo "La suma de los números del 1 al 10 es: $suma";
?>