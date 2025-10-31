<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    // Esto sirve para guardar los errores
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    ini_set("log_errors", 1);
    ini_set("error_log", __DIR__ . "/app.log");
    // el directorio dnd se guardara el archivo
    $path = __DIR__ . "/comentarios.txt";

    $comentarios = [
        "Me ha encantado la web",
        "Faltan más imágenes",
        "Buena organización del contenido",
        "Muy útil la información publicada",
        "El diseño es muy claro y sencillo",
        "Sería bueno añadir un buscador",
        "Los colores son agradables",
        "Faltan ejemplos prácticos",
        "La velocidad de carga es buena",
        "La sección de contacto funciona muy bien"
    ];

   //comentario al azar
    $comentarioRamdon = $comentarios[array_rand($comentarios)];
    $totalComentarios = 0;
    $fecha = date("Y-m-d H:i:s");
    // Abrimos el archivo para añadir elementos
    $fh = fopen($path, "a");
    // Comprobamos que el fichero exista  y sino salta un error 
    if ($fh === false) {
        $mensaje = "Error al abrir el archivo para escritura.";
        echo "<p>$mensaje</p>";
        error_log($mensaje);
    } else {
        if (fwrite($fh, "$fecha  $comentarioRamdon\n") === false) {
            $mensaje = "Error al escribir en el archivo.";
            echo "<p>$mensaje</p>";
            error_log($mensaje);
        }
    }   
    fclose($fh);
    
    echo "<h2>📝 Gestor de Comentarios (sin BD)</h2>";

    // Contamos los comentarios
    if (file_exists($path)) {
        $lineas = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $totalComentarios = count($lineas);
        echo "<p><b>Total comentarios guardados:</b> $totalComentarios</p>";
    } else {
        echo "<p>El archivo no existe aún.</p>";
    }

    // ultimo comentario guardado
    echo "<p>Último comentario añadido: $comentarioRamdon</p>";

    // leemos de nuevo el archivo 
    echo "<h2>Historial</h2>";
    $fh = fopen($path, 'r');

    if ($fh === false) {
        exit("No se pudo abrir el archivo");
    }
    // Leemos el fichero
    while (($linea = fgets($fh)) !== false) {
        echo "<ul><li>($linea)<br></li></ul>";
    }  
    fclose($fh);


    ?>
</body>

</html>