<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Act 6</title>
</head>
<body>
    <?php
        function Sumar(int $num1, int $num2) : int {
            $suma = ($num1 + $num2);
            return $suma;
        }
        function Restar(int $num1, int $num2) : int {
            $resta = ($num1 - $num2);
            return $resta;
        }
        function Multiplicar(int $num1, int $num2) : int {
            $multiplicar = ($num1 * $num2);
            return $multiplicar;
        }
        function Dividir(int $num1, $num2)  {
            if ($num2 === 0) {
                return "No se puede dividir entre 0 ";
            }
            $dividir = ($num1 / $num2);
            return $dividir;
        }

        echo "Suma: " . Sumar(4, 2) . "<br>";
        echo "Resta: " . Restar(4, 2) . "<br>";
        echo "Multiplicación: " . Multiplicar(4, 2) . "<br>";
        echo "División: " . Dividir(4, 0) . "<br>";
        
    ?>
</body>
</html>