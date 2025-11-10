<?php
try {
    // 1️⃣ Conexión con la base de datos
    $conn = new PDO("mysql:host=db;dbname=dwes;charset=utf8", "root", "root");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 2️⃣ Consulta SQL con parámetros nombrados
    $sql = "SELECT * FROM tienda WHERE nombre = :nombre AND tlf = :tlf";
    $stmt = $conn->prepare($sql);

    // 3️⃣ Enlazamos variables a los parámetros
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':tlf', $tlf);

    // 4️⃣ Asignamos valores
    $nombre = "PetWorld";
    $tlf = "931445566";

    // 5️⃣ Establecemos el modo de obtención como asociativo
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    // 6️⃣ Ejecutamos la consulta
    $stmt->execute();

    // 7️⃣ Mostramos los resultados
    while ($fila = $stmt->fetch()) {
        echo "Código: " . $fila['cod'] . "<br>";
        echo "Nombre: " . $fila['nombre'] . "<br>";
        echo "Teléfono: " . $fila['tlf'] . "<br><br>";
    }

} catch (PDOException $e) {
    echo "❌ Error: " . $e->getMessage();
}
?>