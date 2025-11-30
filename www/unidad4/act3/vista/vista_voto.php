<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Votaciones simples</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>
<body>
    <main class="container">
        
        <h1>Votaciones</h1>
        <br><br>

        <form method="post">
            <?php if (!empty($data['opciones'])): ?>
                <?php foreach ($data['opciones'] as $opcion): ?>
                    <label>
                        <input type="radio" name="voto" value="<?php echo $opcion['id']; ?>" required> 
                        <?php echo htmlspecialchars($opcion['opcion']); ?>
                    </label>
                    <br>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay opciones disponibles.</p>
            <?php endif; ?>

            <button type="submit">Votar</button> 
            <small>Total: <?php echo $data['total'] ?? 0; ?></small>
        </form>

        <h3>Resultados</h3>
        <table>
            <tr>
                <th>Opción</th>
                <th>Votos</th>
                <th>%</th>
                <th>Eliminar</th>
            </tr>
            
            <?php if (!empty($data['opciones'])): ?>
                <?php foreach ($data['opciones'] as $opcion): ?>
                    <?php 
                        // Cálculo del porcentaje
                        if ($data['total'] > 0) {
                            $porcentaje = round(($opcion['votos'] / $data['total']) * 100) . '%';
                        } else {
                            $porcentaje = '0%';
                        }
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($opcion['opcion']); ?></td>
                    <td><?php echo $opcion['votos']; ?></td>
                    <td><?php echo $porcentaje; ?></td>
                    <td>
                        <form method="post" style="margin:0">
                            <button name="eliminar" value="<?php echo $opcion['id']; ?>">❌</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>

        <h3>➕ Nueva opción</h3>
        <form method="post">
            <input name="texto" placeholder="Nueva opción..." required>
            <button>Agregar opción</button>
        </form>

    </main>
</body>
</html>