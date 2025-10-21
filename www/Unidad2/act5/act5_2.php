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

    <h2>Lista de Empleados Activos</h2>

    <table>
        <tr>
            <th>Nombre</th>
            <th>Departamento</th>
        </tr>
        <?php
        $empleados = [
            ["nombre" => "Ana Gómez", "departamento" => "Recursos Humanos", "estado" => "activo"],
            ["nombre" => "Luis Pérez", "departamento" => "Finanzas", "estado" => "inactivo"],
            ["nombre" => "Carla Ruiz", "departamento" => "Marketing", "estado" => "activo"],
            ["nombre" => "Miguel Torres", "departamento" => "IT", "estado" => "inactivo"],
            ["nombre" => "Sofía López", "departamento" => "Ventas", "estado" => "activo"],
        ];

        $activos = array_filter($empleados, function ($e) {
            return $e['estado'] === 'activo';
        });

        usort($activos, function ($a, $b) {
            return strcmp($a['nombre'], $b['nombre']);
        });


        $filas = [];
        foreach ($activos as $e) {
            $fila = "<tr><td>" . implode("</td><td>", [$e['nombre'], $e['departamento']]) . "</td></tr>";
        }
        echo implode("\n", $filas);
        ?>
    </table>
</body>

</html>