<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 1</title>
</head>

<body>
    <?php
        $actividad1 = ["María", "Jorge", "Elena", "Pablo"];
        $actividad2 = ["Ana", "Jorge", "Pablo", "Luis"];

        
        $en_ambas = array_intersect($actividad1, $actividad2);

        
        echo "<h1>Personas inscritas en ambas actividades:\n</h1>";
        foreach ($en_ambas as $persona) {
            echo "- " . $persona . "\n";
        }
    ?>
</body>
</html>