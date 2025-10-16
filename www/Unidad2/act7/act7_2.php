<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>act 2</title>
</head>
<body>
    <?php 
    function arrayAzar(int $min, int $max,) : array{
        $tam = rand($min, $max);
        $resultado = [];
    
        for ($i=0; $i < $tam; $i++) { 
            $resultado[] = rand(1,10);
        }
    return $resultado;
    }

    $arrayAzar = arrayAzar(2,10);
    print_r($arrayAzar);
    ?>
</body>
</html>