<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>act 9</title>
</head>

<body>
    <?php
    function aumentarVisitas(int &$visitas): int
    {
        $visitas++;
        return $visitas;
    }

    $visitas = 0;
    echo "Visitas antes de llamar a la función: $visitas<br>";

    $nuevo = aumentarVisitas($visitas);

    echo $visitas;
    ?>
</body>

</html>