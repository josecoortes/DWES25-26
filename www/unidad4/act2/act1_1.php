<?php

/**
 * Punto de entrada principal de la aplicación.
 * Se encarga de:
 * 1. Cargar la configuración y las clases.
 * 2. Establecer la conexión con la base de datos.
 * 3. Instanciar los modelos y el controlador.
 * 4. Ejecutar la lógica de negocio.
 * 5. Pasar los datos a la vista para su renderizado.
 */

require_once __DIR__ . '/config.php'; 

//Cargamos las clases tras cargar previamente la configuracion de la conexión a la BD
require_once __DIR__ . '/modelo/curso_modelo.php';
require_once __DIR__ . '/modelo/estudiante_modelo.php'; 
require_once __DIR__ . '/controlador/instituto_controlador.php';

//Conexión de la BD
try {
    // Usamos las constantes definidas en config.php
    $pdo = new PDO(DB_DSN, DB_USER, DB_PASS);
    
    // Configuramos PDO para que lance excepciones en caso de error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // Si la conexión falla, detenemos la ejecución y mostramos el error
    die("Error al conectar con la base de datos: " . $e->getMessage());
}

$modelocurso = new CursoModelo($pdo); 
$modeloestudiante = new EstudianteModelo($pdo); 

$controlador = new InstitutoControlador($modelocurso, $modeloestudiante); 

// El controlador hace todo el trabajo (borrar, insertar, modificar, consultar)
$data = $controlador->ejecutar(); //

// Se pone al final para que pueda acceder correctamente a todos los datos
require_once __DIR__ . '/../vista/vista_instituto.php';

?>