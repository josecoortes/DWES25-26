<?php
/*
---
title: Ejercicio 2: 2 número al azar
desc: 2 numeros al azar y la media de estos
tags: [PHP, basico, operadores]
---
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
    <title>Act 2</title>

    <style>
        body {
            font-family: 'Libre Baskerville', serif;
        }
    </style>
</head>
<body>
    <?php
    $a = random_int(1,100);
    $b = random_int(1,100);
    $media = (($a + $b) /2);

        print 'el primer numero al azar es ' . $a . '<br>';
        print 'El segundo número al azar es ' . $b . '<br>';
        print 'La media aritmetica es '. $media .'<br>'
    ?>
</body>
</html>