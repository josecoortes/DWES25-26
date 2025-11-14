<?php

/**
 * index.php
 *
 * Punto de entrada principal de la aplicación.
 * Se encarga de:
 * 1. Cargar la configuración y las clases.
 * 2. Establecer la conexión con la base de datos.
 * 3. Instanciar los modelos y el controlador.
 * 4. Ejecutar la lógica de negocio.
 * 5. Pasar los datos a la vista para su renderizado.
 */

// --- 1. Cargar Configuración ---
require_once __DIR__ . '/../config.php'; // ✅ CORREGIDO

// --- 2, 3 y 4. Cargar Clases (Modelos y Controlador) ---
// ANTES: require_once __DIR__ . '/modelo/curso_modelo.php';
require_once __DIR__ . '/../modelo/curso_modelo.php'; // ✅ CORREGIDO
require_once __DIR__ . '/../modelo/estudiante_modelo.php'; 
require_once __DIR__ . '/../controlador/instituto_controlador.php';

// --- 5. Crear Conexión PDO ---
try {
    // Usamos las constantes definidas en config.php
    $pdo = new PDO(DB_DSN, DB_USER, DB_PASS);
    
    // Configuramos PDO para que lance excepciones en caso de error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // Si la conexión falla, detenemos la ejecución y mostramos el error
    die("Error al conectar con la base de datos: " . $e->getMessage());
}

// --- 6. Instanciar Modelos ---
// Pasamos la conexión PDO a los constructores de los modelos
$modelocurso = new CursoModelo($pdo); //
$modeloestudiante = new EstudianteModelo($pdo); //

// --- 7. Instanciar Controlador ---
// Pasamos los modelos al constructor del controlador
$controlador = new InstitutoControlador($modelocurso, $modeloestudiante); //

// --- 8. Ejecutar la lógica y obtener datos ---
// El controlador hace todo el trabajo (borrar, insertar, modificar, consultar)
$data = $controlador->ejecutar(); //

// --- 9. Cargar la Vista ---
// La vista 'vista_instituto.php' tendrá acceso automático a la variable $data
require_once __DIR__ . '/../vista/vista_instituto.php';

?>