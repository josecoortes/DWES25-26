<?php
/*
---
title: Ejercicio 4: lista de numeros pares hasta el 50
desc: generamos todos los números pares hasta el número 50 en una lista desordenada
tags: [PHP, basico, for]
---
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Act 4</title>
</head>
<body>
    <ul>
        <?php
        for ($i = 0; $i <= 50; $i += 2) {
            echo "<li>$i</li>";
        }
        ?>
    </ul>
</body>
</html>