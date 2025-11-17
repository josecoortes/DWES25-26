<?php

class CursoModelo
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
        // 1. Borramos todas las filas.
        // Esto funciona porque el controlador ya ha vaciado 'estudiantes'
        $this->pdo->exec('DELETE FROM cursos');
        
        // 2. Reiniciamos el contador AUTO_INCREMENT manualmente
        $this->pdo->exec('ALTER TABLE cursos AUTO_INCREMENT = 1');
    }
}