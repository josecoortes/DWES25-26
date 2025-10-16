<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>act 10</title>
</head>
<body>
    <?php
        $random = rand(2,7);
        $dados = [];
        for ($i=0; $i < $random ; $i++) { 
            $dados[] = rand(1,6);
        }
        echo "<h1>Tirada de $random dados<br></h1>";
        foreach ($dados as $dado) {
            echo "<img src='img/$dado.svg'>";
        }
        echo "<h1>Tirada Ordenada<br></h1>";
        sort($dados);
        foreach ($dados as $dadosOrd) {
            echo "<img src='img/$dadosOrd.svg'>";
        }
    ?>
</body>
</html>