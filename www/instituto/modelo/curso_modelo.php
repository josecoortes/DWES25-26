<?php

namespace modelo;

class curso_modelo
{
private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function agregar(string $nombre): int {
        $sql = "INSERT INTO cursos (nombre) VALUES (?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nombre]);

        // Devuelve el último ID insertado
        return (int)$this->pdo->lastInsertId();
    }

    public function idPorNombre(string $nombre): int {
        $sql = "SELECT id FROM cursos WHERE nombre = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nombre]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Si fetch() devuelve false (no encontrado), devuelve 0
        if (!$result) {
            return 0;
        }

        return (int)$result['id'];
    }

    public function todos(): array {
        $sql = "SELECT * FROM cursos";
        $stmt = $this->pdo->query($sql);

        // Devuelve todos los resultados como un array asociativo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function vaciarTodo(): void {
        // TRUNCATE TABLE es más eficiente que DELETE y resetea el AUTO_INCREMENT
        $sql = "TRUNCATE TABLE cursos";
        $this->pdo->exec($sql);
    }
}