<?php  
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

$commentAleatorio = array_rand($comentarios);
$fecha = date("Y-m-d H:i:s");

$path = __DIR__ . "/comentarios.txt";

//abrimos el archivo en modo lectura
$fh = fopen($path , 'a');

if ($fh === false) {
    exit("No se puede abrir para escritura");
}

//escribimos varias lineas dentro del archivo
fwrite($fh, $fecha ." " . $aleatorio);
fclose($fh);

$fh = fopen($path, 'r');

if ($fh === false) {
    exit("No se puede abrir para lectura");
}
if (fgets($fh) === false) {
    
}
while (($linea = fgets($fh)) !== false)  {
    echo htmlspecialchars($linea) . "<br>";
}

fclose($fh);
?>
