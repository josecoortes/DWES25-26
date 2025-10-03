<?php
/*
---
title: Ejercicio 1: Mayor de 3 números
desc: 3 números aleatorios y muestra cual es el mayor
tags: [PHP, basico, if-else]
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
<body>
<?php
    $num1 = random_int(1,100);
    $num2 = random_int(1,100);
    $num3 = random_int(1,100);
    $numMayor;

    if ($num1 > $num2 && $num1 > $num3) {
        $numMayor = $num1;
    } else if ($num2 > $num1 && $num2 > $num3){
        $numMayor = $num2;
    } else {
        $numMayor = $num3;
    }    
?>
<h1>Juego: Mayor de tres números</h1>
    <ul>
        <li>Número 1: <b><?php echo $num1 ?></b></li>
        <li>Número 2: <b><?php echo $num2 ?></b></li>
        <li>Número 3: <b><?php echo $num3 ?></b></li>
    </ul>

    <h3>El número mayor es: <?php echo $numMayor?></h3>
</body>
</html>