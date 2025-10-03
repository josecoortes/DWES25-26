<?php
/*
---
title: Ejercicio 3: paso de digito a cadena
desc: un número aleatorio entre 1 y 3 y se muestra como digito y como String
tags: [PHP, basico, match]
---
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Act 3</title>
</head>
<?php
$num = random_int(1,10);

$texto = match ($num) {
    1 => 'uno',
    2 => 'dos',
    3 => 'tres',
};

echo "El número generado es $num y en castellano es: $texto";
?>