<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>act 3</title>
</head>
<body>
    <?php 
    function arrayDeMayorAMenor(array $array) : array{
        foreach ($array as $num) {
            if ($num > 10) {
                $resultado[] = $num; 
            }
        }
        return $resultado;
    }

    $array =[2,11,12,14,5,17,89,2,19];
    $arrayFuncion =  arrayDeMayorAMenor($array);
    print_r($arrayFuncion);
    ?>
</body>
</html>