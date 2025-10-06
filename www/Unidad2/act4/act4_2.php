<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Act 2</title>
</head>
<body>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
    <?php 
        $personas = [
        ['nombre' => 'fede', 'altura' => '193', 'email' => 'fede@correo.com'],
        ['nombre' => 'Ana', 'altura' => '165', 'email' => 'ana@correo.com'],
        ['nombre' => 'Luis', 'altura' => '172', 'email' => 'luis@correo.com']
        ];
    foreach ($personas as $persona): ?>
        <table></table>
            <tr>
                <td><?= $persona['nombre'] ?></td>
                <td><?= $persona['altura'] ?></td>
                <td><?= $persona['email'] ?></td>
            </tr>
        </table>
        <?php endforeach; ?>
</body>
</html>