<?php

class EstudianteModelo {

    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }
    public function agregar(string $nombre, int $edad, ?int $cursoId): int {
        $sql = "INSERT INTO estudiantes (nombre, edad, curso_id) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nombre, $edad, $cursoId]);
        
        return (int)$this->pdo->lastInsertId();
    }

    public function actualizarPorNombre(string $nombreActual, string $nuevoNombre, int $nuevaEdad, int $nuevoCursoId): void {
        $sql = "UPDATE estudiantes SET nombre = ?, edad = ?, curso_id = ? WHERE nombre = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nuevoNombre, $nuevaEdad, $nuevoCursoId, $nombreActual]);
    }
    public function eliminarPorNombre(string $nombre): void {
        $sql = "DELETE FROM estudiantes WHERE nombre = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nombre]);
    }
    public function conCurso(): array {
        $sql = "SELECT 
                    e.id, 
                    e.nombre AS estudiante_nombre, 
                    e.edad, 
                    c.nombre AS curso_nombre 
                FROM 
                    estudiantes e
                LEFT JOIN 
                    cursos c ON e.curso_id = c.id";
                    
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function vaciarTodo(): void {
        $sql = "TRUNCATE TABLE estudiantes";
        $this->pdo->exec($sql);
    }
}
