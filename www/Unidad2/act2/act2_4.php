<?php
/*
---
title: Ejercicio 4: Operador Ternario
desc: Uso del operador ternario
tags: [PHP, basico, operadores, ternario]
---
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Act 4</title>

    <style>
        body {
            font-family: 'Libre Baskerville', serif;
        }
    </style>
</head>
<body>
    <?php
    $saldo = "1000";
    $ingreso = 250;
    settype($saldo, "integer");
    $nomina = $saldo + $ingreso; 
    print $nomina > 1200 ? 'Cliente VIP' : 'Cliente normal';
    ?>
</body>
</html>