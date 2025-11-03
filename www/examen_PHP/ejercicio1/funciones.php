<?php

function categoria(int $num) : string {
    $numBajo = 0;
    $numMedio = 0;
    $numAlto = 0;
    if ($num <= 39 && $num >=0) {
        $texto = "bajo";
        $numBajo++;
        return $texto;
    } elseif ($num <=69  && $num >=39) {
        $texto = "medio";
        $num++;
        return $texto;
    } else {
        $texto = "alto";
        $numAlto++;
        return $texto;
    }
}

function escribir(int $num): void{
    $path = __DIR__ . "/salida.log";
    $fh = fopen($path, "a");
    if ($fh === false) {
        exit("No se pudo abrir el fichero para añadir contenido.");
    }
    $texto = categoria($num);
    $fecha = date("Y-m-d");
    fwrite($fh, "$fecha El número $num pertenece a la categoria de $texto \n");
}