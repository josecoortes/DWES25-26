<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>act 8</title>
</head>
<body>
    <?php
function dividir(float $dividendo, $divisor = 4) {
    if ($divisor === 0) {
        return "Error: no se puede dividir entre 0";
    }
    return $dividendo / $divisor; 
}


echo dividir(20, 5) . "<br>";  
echo dividir(20) . "<br>";      
echo dividir(20, 0) . "<br>";   
?>
</body>
</html>