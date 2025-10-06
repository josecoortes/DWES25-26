<?php
/*
---
title: Ejercicio 3: Tabla de variables
desc: Tabla que muestra unas variables previamente definidas
tags: [PHP, basico, tabla]
---
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        $nombre = "Jose";
        $apellido1 = "Cortes";
        $apellido2 = "Martin";
        $email = "joseejemplo@email.com";
    ?>


    <h2 style="text-align:center;">Mis Datos Personales</h2>
    <table>
        <tr>
            <th>huesped</th>
            <th>calor</th>
        </tr>
        <tr>
            <td>calors</td>
            <td><?php echo $nombre; ?></td>
        </tr>
        <tr>
            <td>Primer Apellido</td>
            <td><?php echo $apellido1; ?></td>
        </tr>
        <tr>
            <td>Segundo Apellido</td>
            <td><?php echo $apellido2; ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo $email; ?></td>
        </tr>
    </table>

     <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #333;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #4361ee;
            color: white;
        }
    </style>

</body>
</html>
