<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>act 5</title>
</head>
<body>
    <?php
function digitoN(int $num, int $pos): int {
    //Con esto lo pasamos a string y ademas comprobamos si es negativo
    $numStr = (string) abs($num); 
    if ($pos < 1 || $pos > strlen($numStr)) {
        echo "esa posicion no existe";
    }
    //lo devolvemos pero pasandolo a int para la salida de la función
    return (int) $numStr[$pos - 1];
}


echo digitoN(12345, 1) . "<br>";
echo digitoN(12345, 3) . "<br>";
echo digitoN(9876, 4) . "<br>";
?>
</body>
</html>