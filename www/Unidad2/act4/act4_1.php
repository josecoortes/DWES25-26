<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 1</title>
</head>
<body>
    <?php
    $personas = ["Ana" => 165, "Luis" => 172, "Marta" => 158];
    $mediaAltura = 0;
    $masAlto = "";
    $maxima = 0;
        echo "<tr>
                <td><b>Nombre<b/></td> 
                <td>Altura</td>
            </tr>";
        foreach ($personas as $nombre => $altura) {
            echo "<tr>
                <td>$nombre</td> 
                <td>$Altura</td>
            </tr> ";
            $alturaTotal += $altura;
            if ($altura > $maxima) {
            $maxima = $altura;
            $masAlto = $nombre;
        }
        $mediaAltura = ($alturaTotal / 3);
        }
        echo "<td><b>Media</b></td> 
                <td>$mediaAltura</td>
            </tr> 
            <tr>
                <td><b>Más alto </b></td> 
                <td>$masAlto</td>
            </tr>";
    ?>
</body>
</html>