<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 3</title>
</head>

<body>
<?php
$texto = "PHP es un lenguaje de programación. php es muy usado para la web. Me gusta PHP.";
$termino = "PHP";

$resultado = str_replace($termino, "<mark>$termino</mark>", $texto);

echo $resultado;
?>
</body>

</html>

