<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
  <title>Resumen del formulario</title>
</head>

<body>
  <main class="container" style="max-width:600px;margin:40px auto;">
    <h1>Resultado del formulario</h1>

    <?php
    function limpiar($dato)
    { 
      return htmlspecialchars(trim($dato), ENT_QUOTES, 'UTF-8');
    }

    $errores = [];
    $nombre = $email = $url = $sexo = $convivientes = $menu = "";
    $aficiones = [];


    if ($_SERVER["REQUEST_METHOD"] === "POST") {

      // Nombre
      if (empty($_POST["nombre"])) {
        $errores[] = "El nombre y apellidos son obligatorios.";
      } else {
        $nombre = limpiar($_POST["nombre"]);
        if (strlen($nombre) > 60) {
          $errores[] = "El nombre no puede tener más de 60 caracteres.";
        }
      }

      // Email
      if (empty($_POST["email"])) {
        $errores[] = "El email es obligatorio.";
      } else {
        $email = limpiar($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $errores[] = "El formato del email no es válido (ejemplo: usuario@dominio.com).";
        }
      }

      // URL
      if (empty($_POST["url"])) {
        $errores[] = "La URL es obligatoria.";
      } else {
        $url = limpiar($_POST["url"]);
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
          $errores[] = "La URL no tiene un formato válido (ejemplo: https://ejemplo.com).";
        }
      }

      // Sexo
      if (empty($_POST["sexo"])) {
        $errores[] = "Debe seleccionar su sexo.";
      } else {
        $sexo = limpiar($_POST["sexo"]);
      }

      // Convivientes
      if ($_POST["convivientes"] === "") {
        $errores[] = "Debe indicar el número de convivientes.";
      } else {
        $convivientes = (int) limpiar($_POST["convivientes"]);
        if ($convivientes < 0 || $convivientes > 5) {
          $errores[] = "El número de convivientes debe estar entre 0 y 5.";
        }
      }

      // Aficiones
      if (empty($_POST["Aficiones"])) {
        $errores[] = "Debe seleccionar al menos una afición.";
      } else {
        $aficiones = array_map('limpiar', $_POST["Aficiones"]);
      }

      // Menú
      if (empty($_POST["menu"])) {
        $errores[] = "Debe seleccionar un menú favorito.";
      } else {
        $menu = limpiar($_POST["menu"]);
      }

      // Mostrar errores o tabla resumen
      if (!empty($errores)) {
        echo "<article style='color:red;'>";
        echo "<h3> Se han encontrado los siguientes errores:</h3><ul>";
        foreach ($errores as $e) {
          echo "<li>$e</li>";
        }
        echo "</ul>";
        echo "<p><a href='index.php'>Volver al formulario</a></p>";
        echo "</article>";
      } else {
        echo "<h3> Datos recibidos correctamente:</h3>";
        echo "<table role='grid'>";
        echo "<tr><th>Campo</th><th>Valor</th></tr>";
        echo "<tr><td>Nombre y Apellidos</td><td>$nombre</td></tr>";
        echo "<tr><td>Email</td><td>$email</td></tr>";
        echo "<tr><td>URL</td><td><a href='$url' target='_blank'>$url</a></td></tr>";
        echo "<tr><td>Sexo</td><td>$sexo</td></tr>";
        echo "<tr><td>Convivientes</td><td>$convivientes</td></tr>";
        echo "<tr><td>Aficiones</td><td>" . implode(", ", $aficiones) . "</td></tr>";
        echo "<tr><td>Menú favorito</td><td>$menu</td></tr>";
        echo "</table>";
      }
    } else {
      echo "<p>No se han recibido datos del formulario.</p>";
    }
    ?>

  </main>
</body>

</html>