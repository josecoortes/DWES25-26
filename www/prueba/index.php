<?php
try {
    // Conexión con la base de datos
    $conn = new PDO("mysql:host=db;dbname=dwes;charset=utf8mb4", "root", "root");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Crear una tabla
    $conn->exec("CREATE TABLE IF NOT EXISTS productos (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(100) NOT NULL,
            precio DECIMAL(10,2)
        )");

    // Agregar una columna nueva
    $conn->exec("ALTER TABLE productos ADD COLUMN stock INT DEFAULT 0");

    // Vaciar una tabla
    $conn->exec("TRUNCATE TABLE productos");

    echo "Operaciones DDL ejecutadas correctamente.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>