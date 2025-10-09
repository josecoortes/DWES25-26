<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Act 3</title>
</head>
<body>
<?php
$generos = [];
for ($i = 0; $i < 5; $i++) {
    $generos[] = (rand(0, 1) === 0) ? 'M' : 'F';
}

echo "Array generado: ";
print_r($generos) + "<br>";

$resultado = array_count_values($generos);

$resultado += ['M' => 0, 'F' => 0];

echo "<br>Resultado final:\n<br>";
print_r($resultado);
?>
</body>
</html>
