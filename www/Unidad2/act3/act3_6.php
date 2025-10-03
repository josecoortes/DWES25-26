<?php
/*
---
title: Ejercicio 6: Tabla de multiplicar del 7
desc: tabla del 7 con formato de HTML y codigo en php
tags: [PHP, basico, for]
---
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Act 6</title>
</head>
<body>
    <style>
table, th, td {
  border:1px solid black;
}
</style>
    <h1>Tabla de multiplicar del 7</h1>
    <table>
        <?php
        $constante = 7;
        for ($i = 0; $i <= 10; $i++) {
            $multiplicando = $constante * $i;
            echo "<tr><td>$constante</td> 
            <td>x</td>
            <td>$i</td>
            <td>=</td>
            <td>$multiplicando</td>
            </tr>";
        }
        ?>
</table>
</body>
</html>