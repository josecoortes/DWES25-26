<?php function generarCartasAleatorias(int $aleatorio): array {
    $palos = ['c', 'd', 'p', 't'];
    $cartas = [];
    for ($i = 0; $i < $aleatorio; $i++) {
        $palo = $palos[array_rand($palos)];
        $numero = rand(1, 13);
        $cartas[] = "$palo$numero";
    }
    return $cartas;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $aleatorio = rand(5, 10);
    echo "<h1>$$aleatorio cartas<br>";
    $cartas = generarCartasAleatorias($aleatorio);
    foreach ($cartas as $carta) {
        echo "<img src='cartas/$carta.svg' width='100'>";
    }
    ?>
</body>

</html>