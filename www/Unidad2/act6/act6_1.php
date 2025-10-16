<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 1</title>
</head>

<body>
<?php
$comentario = "Este es el texto de ejemplo con el que queremos comprobar si pasa de 160 caracters";


$longitud = strlen($comentario);

$limite = 160;

$diferencia = $limite - $longitud;

echo "El comentario tiene $longitud caracteres.<br>";

if ($diferencia > 0) {
    echo "Faltan $diferencia caracteres para llegar al límite de 160.";
} elseif ($diferencia == 0) {
    echo "El comentario tiene exactamente 160 caracteres.";
} else {
    echo "El comentario excede el límite en " . abs($diferencia) . " caracteres.";
}
?>
</body>

</html>

