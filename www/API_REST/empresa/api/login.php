<?php
header("Content-Type: application/json; charset=utf-8");

//Carga automáticamente todas las clases de las librerías que has instalado
require __DIR__ . "/../vendor/autoload.php";
require __DIR__ . "/../config.php";

use Firebase\JWT\JWT;

// Aceptar solo POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Method Not Allowed
    echo json_encode(["error" => "Método no permitido. Usa POST."]);
    exit;
}

// Leer JSON de entrada
$input = json_decode(file_get_contents("php://input"), true) ?? [];

$email    = $input["email"]    ?? "";
$password = $input["password"] ?? "";

// Comprobación muy simple (sin base de datos, solo para el ejemplo)
if ($email !== "alumno@ejemplo.com" || $password !== "1234") {
    http_response_code(401); // Unauthorized
    echo json_encode(["error" => "Credenciales incorrectas"]);
    exit;
}

// Datos que queremos meter dentro del token. Payload.
$payload = [
    "id"   => 1,                      // id de usuario (de ejemplo)
    "email" => $email,
    "rol" => 'administrador',         // rol del usuario.
    "iat"   => time(),                // fecha de emisión
    "exp"   => time() + 3600,         // fecha de expiración (1 hora)
];

// Crear token
$token = JWT::encode($payload, JWT_SECRET, 'HS256');

// Devolver token al cliente
http_response_code(200);
echo json_encode([
    "token" => $token,
]);