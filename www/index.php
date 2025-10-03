<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>act1</title>
</head>
<body>
<?php
$booleano = true;
$frutas = array("manzanas", "Banana", "naranja");

print_r($booleano);
echo "<br>";
print_r($frutas);
echo "<br>";
var_dump($frutas);

$accion = random_int(1,10)<5 ? 'cantar' : 'bailar';
echo 'Ahora tienes que ' . $accion;

$array1 = array('Lunes' =>7.3, 'martes' => 3, 'miercoles' =>12);
print_r($array1)
?>
</body>
</html>