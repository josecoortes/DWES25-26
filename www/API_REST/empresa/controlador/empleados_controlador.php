<?php
class EmpleadosControlador
{
    private EmpleadosModelo $modelo;

    public function __construct(EmpleadosModelo $modelo)
    {
        $this->modelo = $modelo;
    }

    // GET /empleados
    public function listar(): array
    {
        // Aquí solo delegamos en el modelo.
        // Por defecto, si no cambiamos nada, el código HTTP será 200 OK.
        return $this->modelo->obtenerTodos();
    }

    // POST /empleados
    public function crear(array $data): array
    {
        // Validar campos obligatorios
        if (empty($data["nombre"]) || empty($data["email"])) {
            // Error del cliente → 400 Bad Request
            http_response_code(400);
            return ["error" => "nombre y email son obligatorios"];
        }

        // Intentar insertar en la base de datos
        if ($this->modelo->insertar($data["nombre"], $data["email"])) {
            // Recurso creado → 201 Created
            http_response_code(201);
            return ["mensaje" => "Empleado creado correctamente"];
        }

        // Algo ha fallado en el servidor (por ejemplo, la BBDD) → 500 Internal Server Error
        http_response_code(500);
        return ["error" => "No se pudo insertar el empleado"];
    }

    // PUT /empleados?id=5
    public function actualizar(?int $id, array $data): array
    {
        // Validar que se ha pasado un id
        if ($id === null || $id <= 0) {
            http_response_code(400); // Petición incorrecta
            return ["error" => "Debe indicar un id de empleado válido"];
        }

        // Validar datos mínimos (puedes adaptar esto según tus reglas)
        if (empty($data["nombre"]) || empty($data["email"])) {
            http_response_code(400); // Datos incompletos
            return ["error" => "nombre y email son obligatorios para actualizar"];
        }

        // Aquí asumimos que el modelo tiene un método actualizar que devuelve true/false.
        // Podrías, por ejemplo, hacer que devuelva false si el empleado no existe.
        $actualizado = $this->modelo->actualizar($id, $data["nombre"], $data["email"]);

        if ($actualizado === true) {
            // Actualización correcta → 200 OK
            http_response_code(200);
            return ["mensaje" => "Empleado actualizado correctamente"];
        }

        if ($actualizado === null) {
            // Caso opcional: el modelo puede indicar que el empleado no existe
            http_response_code(404); // No encontrado
            return ["error" => "Empleado no encontrado"];
        }

        // Si llega aquí, ha habido un error interno al actualizar
        http_response_code(500);
        return ["error" => "No se pudo actualizar el empleado"];
    }

    // DELETE /empleados?id=5
    public function eliminar(?int $id): array
    {
        // Validar id
        if ($id === null || $id <= 0) {
            http_response_code(400); // Petición incorrecta
            return ["error" => "Debe indicar un id de empleado válido"];
        }

        // Aquí asumimos que el modelo tiene un método eliminar que devuelve true/false/null.
        $eliminado = $this->modelo->eliminar($id);

        if ($eliminado === true) {
            // Eliminado correctamente.
            // Devuelvo 200, para mostrar contenido
            http_response_code(200); 
            return ["mensaje" => "Empleado eliminado correctamente"]; 
        }

        if ($eliminado === null) {
            // Empleado no encontrado
            http_response_code(404);
            return ["error" => "Empleado no encontrado"];
        }

        // Error interno al intentar eliminar
        http_response_code(500);
        return ["error" => "No se pudo eliminar el empleado"];
    }


    public function ver(?int $id): array
    {
        // Validar el id
        if ($id === null || $id <= 0) {
            http_response_code(400); // 400 Bad Request
            return [
                "error" => "Debe indicar un id de empleado válido",
            ];
        }

        // Pedir el empleado al modelo
        $empleado = $this->modelo->obtenerPorId($id);

        if ($empleado === null) {
            // No existe ningún empleado con ese id
            http_response_code(404); // 404 Not Found
            return [
                "error" => "Empleado no encontrado",
            ];
        }

        // Empleado encontrado
        http_response_code(200); // 200 OK
        return $empleado;
    }

}