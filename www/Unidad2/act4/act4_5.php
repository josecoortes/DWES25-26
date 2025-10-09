<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Act 5</title>
</head>
<body>
<?php
// 1. Crear un array asociativo de productos
$productos = [
    ["nombre" => "Pan",          "precio" => 1.00,  "iva" => 1],
    ["nombre" => "Leche",        "precio" => 0.90,  "iva" => 2],
    ["nombre" => "Cerveza",      "precio" => 1.50,  "iva" => 3],
    ["nombre" => "Televisor",    "precio" => 400,   "iva" => 4],
    ["nombre" => "Libro",        "precio" => 12.50, "iva" => 1],
    ["nombre" => "Medicamento",  "precio" => 8.00,  "iva" => 2],
    ["nombre" => "Ropa",         "precio" => 35.00, "iva" => 4],
    ["nombre" => "Agua",         "precio" => 0.75,  "iva" => 2],
    ["nombre" => "Perfume",      "precio" => 50.00, "iva" => 4],
    ["nombre" => "Entrada cine", "precio" => 8.00,  "iva" => 3]
];

$ivas = [
    1 => 0.00, 2 => 0.04, 3 => 0.10, 4 => 0.21];

echo "<h2>Listado de productos con IVA</h2>";
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Producto</th><th>Precio sin IVA (€)</th><th>Tipo IVA</th><th>Precio con IVA (€)</th></tr>";

foreach ($productos as $producto) {
    $nombre = $producto["nombre"];
    $precio = $producto["precio"];
    $tipoIVA = $producto["iva"];
    $porcentaje = $ivas[$tipoIVA];
    $precioConIVA = $precio * (1 + $porcentaje);

    echo "<tr>";
    echo "<td>$nombre</td>";
    echo "<td>" . number_format($precio, 2) . "</td>";
    echo "<td>$tipoIVA (" . ($porcentaje * 100) . "%)</td>";
    echo "<td>" . number_format($precioConIVA, 2) . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
</body>
</html>