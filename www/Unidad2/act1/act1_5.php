<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

      
    <?php
    $dado1 = rand(1, 6);
    $dado2 = rand(1, 6);

    $total = $dado1 + $dado2;
    ?>

    <h1>¡Lanzamiento de Dados!</h1>
    
    <img src="img/<?php echo $dado1; ?>.svg" alt="Dado <?php echo $dado1; ?>">
    <img src="img/<?php echo $dado2; ?>.svg" alt="Dado <?php echo $dado2; ?>">    
    <h2>Total de puntos: <?php echo $total; ?></h2>




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