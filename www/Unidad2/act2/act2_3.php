<?php
/*
---
title: Ejercicio 3: nave espacial
desc: Uso del operador <=>
tags: [PHP, basico, operadores, <=>]
---
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Act 3</title>

    <style>
        body {
            font-family: 'Libre Baskerville', serif;
        }
    </style>
</head>
<body>
    <?php
    $a = 1;
    echo ($a <=> 0) == 0 ? 'cero' : (($a <=> 0) == 1 ? 'positivo' : 'negativo');
    ?>
</body>
</html>