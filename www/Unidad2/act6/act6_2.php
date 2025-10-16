<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 2</title>
</head>

<body>
<?php
$nombreCompleto = "Ana Maria Lopez Perez";

// Separar por palabras
$partes = explode(" ", $nombreCompleto);

// Elimina los dos apeldios del array para tener solamente el nombre 
$segundoApellido = array_pop($partes);
$primerApellido = array_pop($partes);

// este seria el array de solamente el nombre
$nombre = implode(" ", $partes);

// creamos las iniciales
$iniciales = "";
foreach (explode(" ", $nombreCompleto) as $palabra) {
    $iniciales .= strtoupper($palabra[0]) . ".";
}

echo "Nombre completo: $nombreCompleto<br><br>";
echo "Nombre: $nombre<br>";
echo "Primer apellido: $primerApellido<br>";
echo "Segundo apellido: $segundoApellido<br>";
echo "Iniciales: $iniciales";
?>
</body>

</html>

