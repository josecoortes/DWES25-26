<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 5</title>
</head>

<body>
<?php
$ruta = "http://www.linkfred.com/carpeta1/index.php";

// se busca la ultima / para leer el nombre del archivo
$pos = strrpos($ruta, "/");

// Extraemos el texto que viene después de la última /
$nombreFichero = substr($ruta, $pos + 1);

echo "Ruta completa: " . $ruta . "<br>";
echo "Nombre del fichero: " . $nombreFichero . "<br>";
?>
</body>
</html>
