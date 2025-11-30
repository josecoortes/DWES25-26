<?php

require_once __DIR__ . '/config.php';
require_once __DIR__ .'/modelo/optionmodel.php'; 
require_once __DIR__ .'/controlador/voto_controlador.php'; 

try {
    $pdo = new PDO(DB_DSN, DB_USER, DB_PASS);
    
    $modelo = new optionModel($pdo);
    $controlador = new VoteController($modelo);

    $data = $controlador->ejecutar();


} catch (PDOException $e) {
    echo "Error en la base de datos: " . $e->getMessage();
}

require_once __DIR__ . '/vista/vista_voto.php';

?>