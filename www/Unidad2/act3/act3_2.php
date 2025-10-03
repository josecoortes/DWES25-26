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
    <h1>Simulación de Calificación</h1>
<?php
   $num = random_int(1,10);
   $nota;
   $notaString;

   switch ($num) {
    case 1:
    case 2:
    case 3:
    case 4:
        $nota = $num;
        $notaString = "Calificación: Insuficiente";
        break;
    case 5: 
        $nota = $num;
        $notaString = "Calificación: Suficiente";
        break;
    case 6:
        $nota = $num;
        $notaString = "Calificación: Bien";
        break;
    case 7:
    case 8: 
        $nota = $num;
        $notaString = "Calificación: Notable";
        break;
    case 9: 
    case 10:
        $nota = $num;
        $notaString = "Calificación: Sobresaliente"; 
    default:
        echo "Nota erronea";
        break;
   }
?>
<p>La nota generada es: <?php $nota?></p>
<h2><?php $notaString?></h2>
</body>
</html>