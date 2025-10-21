<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 1</title>
</head>

<body>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }

        th,
        td {
            border: 1px solid #aaa;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #ddd;
        }
    </style>

    <h2>Todos los productos</h2>
    <?php
    $productos = [
        ["nombre" => "Camiseta", "precio" => 15],
        ["nombre" => "Zapatos", "precio" => 45],
        ["nombre" => "Pantalón", "precio" => 30],
        ["nombre" => "Calcetines", "precio" => 5],
        ["nombre" => "Chaqueta", "precio" => 60],
    ];


    $productos_filtrados = array_filter($productos, function ($producto) {
        return $producto["precio"] > 20;
    });
    ?>

    <table>
        <tr>
            <th>Nombre</th>
            <th>Precio (€)</th>
        </tr>
        <?php foreach ($productos as $p): ?>
            <tr>
                <td><?= $p["nombre"] ?></td>
                <td><?= $p["precio"] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Productos con precio superior a 20 €</h2>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Precio (€)</th>
        </tr>
        <?php foreach ($productos_filtrados as $p): ?>
            <tr>
                <td><?= $p["nombre"] ?></td>
                <td><?= $p["precio"] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>