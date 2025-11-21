<?php
// Todas las respuestas serán JSON.
// Todas las respuestas serán JSON.
header("Content-Type: application/json; charset=utf-8");

require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../config.php";
require_once __DIR__ . "/../database.php";
require_once __DIR__ . "/../modelo/empleados_modelo.php";
require_once __DIR__ . "/../controlador/empleados_controlador.php";
require_once __DIR__ . '/auth.php';

// Comprueba el token.
$user = requireAuth(); // Obtenemos el payload.

// Crear conexión, modelo y controlador.
$db = Database::getConnection();
$modelo = new EmpleadosModelo($db);
$controlador = new EmpleadosControlador($modelo);

// Método HTTP de la petición (GET, POST, PUT, DELETE, ...)
$metodo = $_SERVER["REQUEST_METHOD"];

// id por query string: ?id=5
$id = isset($_GET["id"]) ? (int) $_GET["id"] : null;

switch ($metodo) {
    case "GET":
        // GET /empleados.php  → listar empleados
        if ($id === null) {
            // Sin id → devolvemos la lista completa
            echo json_encode($controlador->listar());
        } else {
            // Con id → devolvemos un solo empleado (o error)
            echo json_encode($controlador->ver($id));
        }
        break;
        
    case "POST":
        // POST /empleados.php → crear empleado
        $input = json_decode(file_get_contents("php://input"), true) ?? [];
        echo json_encode($controlador->crear($input));
        break;

    case "PUT":
        // PUT /empleados.php?id=5 → actualizar empleado
        $input = json_decode(file_get_contents("php://input"), true) ?? [];
        echo json_encode($controlador->actualizar($id, $input));
        break;

    case "DELETE":
        // DELETE /empleados.php?id=5 → borrar empleado
        echo json_encode($controlador->eliminar($id));
        break;

    default:
        // Método no permitido
        http_response_code(405);
        echo json_encode(["error" => "Solo GET, POST, PUT y DELETE"]);
        break;
}