<?php
// modelo/empleados_modelo.php

class EmpleadosModelo
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Obtener todos los empleados.
     *
     * @return array Lista de empleados (cada uno como array asociativo).
     */
    public function obtenerTodos(): array
    {
        $sql = "SELECT id, nombre, email FROM empleados";
        $stmt = $this->db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $stmt->execute(); // No hay parámetros, pero igual se ejecuta
        return $stmt->fetchAll();
    }

    /**
     * Insertar un nuevo empleado.
     *
     * @return bool true si se ha insertado correctamente, false si hay error.
     */
    public function insertar(string $nombre, string $email): bool
    {
        $sql = "INSERT INTO empleados (nombre, email)
                VALUES (:nombre, :email)";

        $stmt = $this->db->prepare($sql);

        // Enlazar parámetros
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email',  $email);

        // Ejecutar consulta
        return $stmt->execute();
    }

    /**
     * Actualizar un empleado existente.
     *
     * @return bool|null
     *   true  → actualizado correctamente
     *   null  → no existe ese id (no se ha actualizado ninguna fila)
     *   false → error interno
     */
    public function actualizar(int $id, string $nombre, string $email): ?bool
    {
        $sql = "UPDATE empleados 
                SET nombre = :nombre, email = :email
                WHERE id = :id";

        try {
            $stmt = $this->db->prepare($sql);

            // bindParam liga la variable por referencia
            $stmt->bindParam(":nombre", $nombre);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":id", $id);

            $stmt->execute();

            // rowCount() devuelve cuántas filas se han afectado
            $filas = $stmt->rowCount();

            if ($filas === 0) {
                // Lo tratamos como "no existe" para simplificar.
                return null;
            }
            return true;
        } catch (PDOException $e) {
            // Error interno
            return false;
        }
    }


    /**
     * Eliminar un empleado.
     *
     * @return bool|null
     *   true  → eliminado correctamente
     *   null  → no existe ese id (no se ha borrado ninguna fila)
     *   false → error interno
     */
    public function eliminar(int $id): ?bool
{
    $sql = "DELETE FROM empleados WHERE id = :id";

    try {
        $stmt = $this->db->prepare($sql);

        // bindParam enlaza la variable por referencia
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        $stmt->execute();

        $filas = $stmt->rowCount();

        if ($filas === 0) {
            return null; // No había ningún empleado con ese id
        }

        return true;
    } catch (PDOException $e) {
        return false;
    }
}


/**
     * Obtener un único empleado por id.
    */

    public function obtenerPorId(int $id): ?array
    {
        $sql = "SELECT id, nombre, email
                FROM empleados
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        // Enlazar parámetros
        $stmt->bindParam(':id', $id);

        // Ejecutar consulta
        $stmt->execute();

        // fetch() devuelve false si no encuentra datos.
        $empleado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($empleado === false) {
            return null;
        }

        return $empleado;
    }

}