<?php
/*
---
title: Ejercicio 4: Porcentaje Aleatorio
desc: genera un porcentaje y sale una barra midiendo el porcentaje
tags: [PHP, basico, meter]
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
    <h1>Porcentaje Aleatorio: 
    <?php echo $porcentaje = rand(0, 100); ?>%</h1>
    <meter value="<?php echo $porcentaje; ?>" min="0" max="100">
        <?php echo $porcentaje; ?>%
    </meter>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        meter {
            width: 50%;
            height: 30px;
        }
    </style>
</body>
</html>