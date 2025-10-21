<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>act 4</title>
</head>
<body>
    <?php 
    function mayor(array $numeros): int {
    $mayor = $numeros[0];
    
    foreach ($numeros as $num) {
        if ($num > $mayor) {
            $mayor = $num; 
        }
    }

    return $mayor;
}

    $array = [2,3,4,5,1,6,34];
    $numMayor = mayor($array);

    echo "El número mayor es : $numMayor"
    ?>
</body>
</html>