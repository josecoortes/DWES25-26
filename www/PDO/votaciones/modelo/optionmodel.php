<?php
class OptionModel{

    private PDO $db;
    public function __construct(PDO $db){
        $this->db = $db;
    }

    public function obtenerOpciones(): array{
        $sql = "SELECT id, opcion, votos FROM votaciones";
        $stmt = $this->db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function agregrarOpciones(string $texto): void{
        $sql = "INSERT INTO votaciones (opcion) VALUES (:opcion)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':opcion', $texto);
        $stmt->execute();
    }

    public function votar(int $id){
        $sql = "UPDATE votaciones SET votos = votos + 1 WHERE id =(:id)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function eliminar(int $id){
        $sql = "DELETE FROM votaciones WHERE id =(:id)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}