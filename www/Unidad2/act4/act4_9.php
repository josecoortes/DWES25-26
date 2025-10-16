<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>act 9</title>
</head>
<body>
    <?php
        $numeros = [];
        $random = rand(5,10);
        $emoticonoAzar = rand(128512,128580);
        for ($i=0; $i < $random; $i++) { 
            $numeros[] = rand(128512,128580);
        }

        foreach ($numeros as $num) {
            echo "&#$num";
        }

        echo "<h1>Elegido: &#$emoticonoAzar</h1>";

        $result = in_array($emoticonoAzar, $numeros);

        
        if ($result == true) {
            echo "Si esta en el grupo";
        }else{
            echo "No esta en el grupo";
        }
    ?>
</body>
</html>