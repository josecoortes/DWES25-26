<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>PHP fácil</title>
</head>
<body>
<!-- Muestra una frase con HTML -->
Hola mundo<br>
<!-- Muestra una frase con PHP -->
        <?php echo "Es muy fácil programar en PHP."; 
        //Variables en PHP tiene que empezar con $, no hace falta definir el tipo y hay que inicializarlas
        $nombre = "María";
        $numero = 5;
        $suerte = true;
        echo "<br>Hola $nombre";
        echo "<br>El número es $numero";
        echo "<br>El valor de sinValor es $sinValor";
        echo "<br>El valor de suerte es $suerte";
        //serie de variables predefinidas en PHP
        echo "Tu IP es " . $_SERVER['REMOTE_ADDR'] . "<br>";    //IP
        echo "Servidor: " . $_SERVER['SERVER_NAME'] . "<br>";       //nombre del servidor
        echo "Software del servidor: " . $_SERVER['SERVER_SOFTWARE'] . "<br>";      //software del servidor
        echo "Ruta del Script: " . $_SERVER['SCRIPT_FILENAME'] . "<br>";    //ruta del script
        echo "User Agent: " . $_SERVER['HTTP_USER_AGENT'] . "<br>";  //navegador
        //Constantes en PHP no se definen con $ y se ponen en mayúsculas
        define("PI", 3.1416);
        const IVA = 0.21;
        echo PHP_VERSION . "<br>"; //version PHP
        
        //Referencias en PHP
        $dato = 9;
        $ref1=&$dato; //referencia a la variable dato y son la misma variable si cambio una cambia la otra
        $ref1++;  
        echo $dato;

        //proyeccion de datos
        $a = random_int(1,100);
        $b = random_int(1,100);

        echo 'el primer numero al azar es ', $a, '<br>';

        print 'El segundo número al azar es ' . $b . '<br>';

        //comillas simple y dobles
        $var = "mundo";
        echo "Hola $var <br>"; //interpreta variables
        echo 'Hola $var <br>'; //no interpreta variables, pone directamente $var

        //secuencias de escape
        "\\"; //barra invertida
        "\'"; //comilla simple
        "\""; //comilla doble
        "\n"; //salto de línea
        "\r"; //retorno de carro
        "\t"; //tabulador
        "\v"; //tabulador vertical
        "\f"; //Avance de pagina
        "\$"; //signo de dólar

        //Escribir con sintaxis abreviadas
        ?>      <!-- salimos de PHP para poder escribir sin comillas ni echo-->
        los dos valores elegidos son <?=$a?> y <?=$b?><br>
        <?php       //Volvemos a entrar en PHP
        printf("Los dos valores elegidos son %d y %d", $a, $b);
        ?>
    </body>
</html>