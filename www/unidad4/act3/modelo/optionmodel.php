<?php

class optionModel
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function obtenerOpciones()
    {
        $sql = "SELECT * FROM votaciones";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function agregarOpcion(string $texto)
    {
        $sql = "INSERT INTO votaciones (opcion) VALUES (:opcion)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':opcion', $texto);
        $stmt->execute();
    }

    public function votar(int $id)
    {
        $sql = "UPDATE votaciones SET votos = votos + 1 WHERE id = (:id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

    }

    public function eliminar(int $id)
    {
        $sql = "DELETE FROM votaciones WHERE id = (:id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
 