<?php
    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;

    function requireAuth()
    {
        // Leer todas las cabeceras
        $headers = getallheaders();

        // Si no hay nada, error
        if (empty($headers['Authorization'])) {
            http_response_code(401);
            echo json_encode(['error' => 'Token no enviado (sin cabecera Authorization)']);
            exit;
        }

        // Quitar la palabra "Bearer" (da igual mayúsculas/minúsculas) y espacios
        $token = trim(preg_replace('/^Bearer\s+/i', '', $headers['Authorization']));

        // Si después de quitar "Bearer" no queda nada, error
        if ($token === '') {
            http_response_code(401);
            echo json_encode(['error' => 'Token no enviado (vacío)']);
            exit;
        }

        // Intentar validar el token
        try {
            // Si llega aquí, el token es válido y no está caducado. Se devuelve el payload en formato objeto stdClass.
            return (JWT::decode($token, new Key(JWT_SECRET, 'HS256')));
        } catch (Exception $e) {
            http_response_code(401);
            echo json_encode(['error' => 'Token inválido o caducado']);
            exit;
        }
    }
?>