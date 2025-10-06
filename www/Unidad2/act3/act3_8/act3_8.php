<?php
/*
---
title: Ejercicio 8: Dados
desc: de 1 a 5 numeros al azar se muestran como si tirases los dados y verifica cual es el menor
tags: [PHP, basico, operadores, imagenes]
---
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $num_dados = rand(1, 5);
    echo "<h2>Tirada de $num_dados dado(s):</h2>";

    $minimo = 7; // valor mayor que cualquier cara posible (1–6)

    for ($i = 0; $i < $num_dados; $i++) {
        $valor = rand(1, 6);
        echo "<img src='img/$valor.svg' alt='Dado $valor'>";

        if ($valor < $minimo) {
            $minimo = $valor;
        }
    }

    echo "<h3>Valor mínimo obtenido: $minimo</h3>";
?>

    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
            margin-top: 50px;
            background-color: #f0f0f0;
        }
        img {
            width: 100px;
            margin: 10px;
        }
        h2 {
            margin-top: 20px;
        }
    </style>
</body>
</html>