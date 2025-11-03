<?php
include 'funciones.php';
$cantidad = 5;
$aleatorios = [];
$sumaArray = 0;

for ($i=0; $i < $cantidad; $i++) { 
    $aleatorios[] = rand(1,100);
}
$arrayOrdenado[] = sort($aleatorios);
foreach ($aleatorios as $num) {
    $sumaArray += $num;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="../pico.min.css">
</head>
<body>
    <h1>Numeros y Categorias</h1>
    <main class="container">
    <table>
        <tr>
            <td>numeros</td>
            <td>Categoria</td>
            <td>codigo</td>
        </tr>
        <?php 
        $numAltos = 0;
        $numBajos = 0;
        $numMedio = 0;
        foreach ($aleatorios as $num) {
            $texto = categoria($num); 
            $codigo = substr($texto, 0, 2);
            echo "<tr>
                    <td>$num</td>";
                    echo "<td>";
                    if ($texto == "bajo") {
                        $numBajos++;
                        echo"<p class='verde'>bajo</p>";
                    } elseif ($texto == "medio") {
                        echo "<p class='amarillo'>medio</p>";
                        $numMedio++;
                    } elseif ($texto == "alto"){
                        echo "<p class='rojo'>alto</p>";
                        $numAltos++;
                    }
                    echo "</td>
                    <td>$codigo-$num</td>
                </tr>";
                escribir($num);
        }
        ?>
    </table>
    <h2>SUMA TOTAL:<?php echo $sumaArray?></h2>
    <p>Rango bajo: <?= $numBajos?> números</p>
    <p>Rango medio: <?= $numMedio?> números</p>
    <p>Rango alto: <?= $numAltos?> números</p>
    </main>
</body>
</html>