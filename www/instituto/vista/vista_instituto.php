<?php
/**
 * vista_instituto.php
 *
 * Esta es la vista. Su única responsabilidad es "pintar" el HTML
 * usando los datos que le proporciona la variable $data.
 *
 * NO debe hacer consultas a la BBDD ni tener lógica de negocio.
 */

// Función auxiliar para imprimir un estudiante (evita repetir código)
function imprimirEstudiante($estudiante) {
    $nombre = htmlspecialchars($estudiante['estudiante_nombre']);
    $edad = htmlspecialchars($estudiante['edad']);
    
    // Usamos el operador "Null Coalescing" (??) para manejar cursos nulos
    $curso = htmlspecialchars($estudiante['curso_nombre'] ?? 'Sin curso asignado');
    
    echo "<li>$nombre ($edad años) - Curso: $curso</li>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instituto (MVC - POO - PDO)</title>
    <style>
        body { 
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; 
            margin: 2em; 
            background-color: #f9f9f9;
            color: #333;
        }
        h1 { color: #005a9c; }
        h2 { border-bottom: 2px solid #005a9c; padding-bottom: 5px; margin-top: 30px;}
        ul { list-style-type: none; padding-left: 10px; }
        li { background-color: #fff; border: 1px solid #ddd; padding: 10px; margin-bottom: 5px; border-radius: 4px; }
        code { background-color: #eee; padding: 2px 4px; border-radius: 3px; }
    </style>
</head>
<body>

    <h1>Instituto (MVC - POO - PDO)</h1>

    <h2>📚 Cursos</h2>
    <p>Cursos creados en la base de datos:</p>
    <ul>
        <?php foreach ($data['cursos'] as $curso): ?>
            <li><?php echo htmlspecialchars($curso['nombre']); ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>👩‍🎓 Lista Inicial</h2>
    <p>Estudiantes justo después de ser insertados:</p>
    <ul>
        <?php foreach ($data['listaInicial'] as $estudiante): ?>
            <?php imprimirEstudiante($estudiante); ?>
        <?php endforeach; ?>
    </ul>

    <h2>✏️ Lista Modificada</h2>
    <p>Después de actualizar a <code>Carla Sanz</code> y cambiarla de curso:</p>
    <ul>
        <?php foreach ($data['listaModificada'] as $estudiante): ?>
            <?php imprimirEstudiante($estudiante); ?>
        <?php endforeach; ?>
    </ul>

    <h2>🗑️ Lista Final</h2>
    <p>Después de eliminar a <code>Luis Fernández</code>:</p>
    <ul>
        <?php foreach ($data['listaFinal'] as $estudiante): ?>
            <?php imprimirEstudiante($estudiante); ?>
        <?php endforeach; ?>
    </ul>

</body>
</html>