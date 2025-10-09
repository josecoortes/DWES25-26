<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>act 8</title>
</head>
<body>
    <?php
    $numeros = [];
    $random = rand(5,15);
    echo"<h3>Entre estas $random bolas</h3>";
    for ($i=0; $i < $random; $i++) { 
        $numeros[] = rand(10102,10111);
    }
    foreach ($numeros as $num) {
        echo "&#$num"; 
    }
    $arrayUnique = array_unique($numeros);
    $contador = count($arrayUnique);
    echo"<h3>... hay $contador bolas distintas</h3>";
    foreach ($arrayUnique as $nume) {
        
        echo "&#$nume";

    }
    ?>
</body>
</html>