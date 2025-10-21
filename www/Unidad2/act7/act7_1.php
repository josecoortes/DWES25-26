<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $num = rand(1,100);
    function esPar(int $num) : bool {
        if ($num % 2) {
            $resultado = true;
        } else{
            $resultado = false;
        } 
        return $resultado;
    }

    $resultado = esPar($num);

    if ($resultado == true) {
        echo "El $num es un numero par";
    } else {
        echo "El $num es un numero impar";
    }
    ?>
</body>
</html>