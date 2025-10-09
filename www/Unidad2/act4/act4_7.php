<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Act 7</title>
</head>
<body>
    <h1>Numeros con colores</h1>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
<?php
    $numeros = [];

    for ($i=0; $i < 10; $i++) { 
        $numeros[] = rand(1,100);
    }
    echo "<table>";
    echo "<tr>";
    foreach ($numeros as $num) {
        
        if ($num % 2 == 0) {
            $color = 'blue';
        } else {
            $color = 'red';
        }
        echo "<td style = 'color: $color'> $num </td>";
    }
    echo "</tr>";
    echo "</table>"
?>
</body>
</html>