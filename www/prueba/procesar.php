<?php
if (!empty($_POST['nombre']))
    echo "El nombre es " . $_POST['nombre'] . "<br>";
else
    echo 'No se ha especificado el nombre';

define('OPCIONES1', ['es', 'mx', 'ar', 'co']);
if (!empty($_POST['pais'])) {
    if (in_array($_POST['pais'], OPCIONES1))
        echo "Pais: Se ha recibido " . $_POST['pais'] . "<br>";
    else
        echo 'El pais no tiene un valor válido';
} else
    echo 'El pais no se ha recibido';

$lenguajes_permitidos = ['html', 'css', 'javascript', 'php'];
if (!empty($_POST['lenguajes']) && is_array($_POST['lenguajes'])) {
    $no_validos = array_diff($_POST['lenguajes'], $lenguajes_permitidos);
    if (count($no_validos) == 0)
        echo 'Los lenguajes recibidos están dentro de los esperados y son: ' . implode(', ', $_POST['lenguajes']);
    else
        echo 'Se han recibido lenguajes no esperados';
} else
    echo 'No se han recibido los lenguajes o no son del tipo esperado.';
echo "<br>";
