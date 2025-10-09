<?php
$numeros = [];
for ($i = 0; $i < 10; $i++) {
    $numeros[] = rand(1, 100);
}
echo "<h1>Rotado:" . implode(", ", $numeros ) . "</h1>";

$ultimo = array_pop($numeros);
array_unshift($numeros, $ultimo);

echo "<h1>Rotado:" . implode(", ", $numeros ) . "</h1>";
?>
