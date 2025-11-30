<?php
// Iniciamos sesion
session_start();

// Creamos las variables 
$emailValido = "correo@falso.com";
$claveValida = "123";

//Comprueba si las credenciales son incorrectas
$email = $_POST['email'] ?? '';
$contraseña = $_POST['contraseña'] ?? '';

/**
 * Tengo que meterlo si o si en con $_SERVER["REQUEST-METOHD] === 'POST' 
 * para que el error no lo lance hasta que se envíen los datos del formulario
 *  */
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    if ($email === $emailValido && $contraseña === $claveValida) {
        $_SESSION['usuario'] = $email;
        header("Location: ./privado.php");
        exit;
    } else {
        $error = 'Email o contraseña incorrectos.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./pico.min.css">
</head>

<body>
    <main class="container">
        <form method="post" action="">
            <?php if (isset($error)): ?>
                <p style="color: red"><?= $error ?></p>
            <?php endif; ?>
            <h1>Acceso al Sistema</h1>
            <label>Email <input name="email" type="email"></label>
            <label>Contraseña <input name="contraseña" type="password"></label>
            <button type="submit">Enviar</button>
            <p style="color: red">📌Usuario de prueba: correo@falso.com</p>
            <p style="color: red;">🔑Constraseña: 123</p>
            <a href="./privado.php">Aceso a Zona Privada (Seción iniciada)</a>
        </form>
    </main>
</body>

</html>

////////////////////////////////////////////////////////////

<?php
session_start();

if(empty($_SESSION['usuario'])){
    header("Location: ./");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Document</title>
</head>
<style>
    p{
        color: red;
    }
</style>
<body>
    <main class="container">
        <div >
            <p >¡Te encuentras en una zona secreta, solo visible por una persona identificada.</p>
            <a href="cerrar-sesion.php">Cerrar sesión</a>
        </div>
    </main>
</body>

</html>

<?php
session_start();
unset($_SESSION);
session_destroy();
header("Location: ./act3_2.php");
exit;
?>



///////////////////////////////////////////
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
  <title>Act 1</title>
</head>

<body>
  <main  class="container" style="max-width:600px;margin:40px auto;">
    <h1>Formulario</h1>
    <form method="post" action="resumen.php">
      <label>Nombre y Apellidos <input type="text" name="nombre" id="nombre" required></label>
      <label>Email <input type="text" name="email" id="email" required></label>
      <label>URL página personal <input type="text" name="url" id="url" required></label>

      <fieldset>
        <legend>Sexo:</legend>
        <label><input type="radio" name="sexo" value="Hombre"> Hombre</label>
        <label><input type="radio" name="sexo" value="Mujer"> Mujer</label>
        <label><input type="radio" name="sexo" value="Otro"> Otro</label>
      </fieldset>

      <label>Número de convivientes (0 a 5):</label>
      <input type="number" name="convivientes" min="0" max="5" required>

      <fieldset>
        <legend>Aficiones:</legend>
        <label><input type="checkbox" name="Aficiones[]" value="lectura">Lectura</label>
        <label><input type="checkbox" name="Aficiones[]" value="deporte">Deporte</label>
        <label><input type="checkbox" name="Aficiones[]" value="cine">Cine</label>
        <label><input type="checkbox" name="Aficiones[]" value="viajar">Viajar</label>
      </fieldset>

      <label>Menú favorito
        <select name="menu">
          <option value="">Selecciona una opción</option>
          <option value="ensalada">Ensalada</option>
          <option value="pasta">Pasta</option>
          <option value="sushi">Sushi</option>
          <option value="pizza">Pizza</option>
        </select>
      </label>

      <label><input type="Submit" name="enviar">
      </label>
    </form>
  </main>
</body>

</html>


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
      return htmlspecialchars(trim($dato));
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
        echo "<p><a href='act1_1.html'>Volver al formulario</a></p>";
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


********************************

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 5</title>
</head>

<body>
<?php
$ruta = "http://www.linkfred.com/carpeta1/index.php";

// se busca la ultima / para leer el nombre del archivo
$pos = strrpos($ruta, "/");

// Extraemos el texto que viene después de la última /
$nombreFichero = substr($ruta, $pos + 1);

echo "Ruta completa: " . $ruta . "<br>";
echo "Nombre del fichero: " . $nombreFichero . "<br>";
?>
</body>
</html>



**********************************
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>act 10</title>
</head>

<body>
    <?php
    // Declaramos las variables
    $iva = 0.21;
    $precio1 = 100;
    $precio2 = 250;
    $precio3 = 50;

    // Función flecha
    $precioConIVA = fn($precio) => $precio +($precio * $iva);

    
    $resultado1 = $precioConIVA($precio1);
    $resultado2 = $precioConIVA($precio2);
    $resultado3 = $precioConIVA($precio3);

    echo "El IVA es del 21%</br>";
    echo "Precio dinal de $precio1 : es $resultado1</br>";
    echo "Precio dinal de $precio2 : es $resultado2</br>";
    echo "Precio dinal de $precio3 : es $resultado3</br>";

    ?>
</body>
</html>


***********************************
!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    // Esto sirve para guardar los errores
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    ini_set("log_errors", 1);
    ini_set("error_log", __DIR__ . "/app.log");
    // el directorio dnd se guardara el archivo
    $path = __DIR__ . "/comentarios.txt";

    $comentarios = [
        "Me ha encantado la web",
        "Faltan más imágenes",
        "Buena organización del contenido",
        "Muy útil la información publicada",
        "El diseño es muy claro y sencillo",
        "Sería bueno añadir un buscador",
        "Los colores son agradables",
        "Faltan ejemplos prácticos",
        "La velocidad de carga es buena",
        "La sección de contacto funciona muy bien"
    ];

   //comentario al azar
    $comentarioRamdon = $comentarios[array_rand($comentarios)];
    $totalComentarios = 0;
    $fecha = date("Y-m-d H:i:s");
    // Abrimos el archivo para añadir elementos
    $fh = fopen($path, "a");
    // Comprobamos que el fichero exista  y sino salta un error 
    if ($fh === false) {
        $mensaje = "Error al abrir el archivo para escritura.";
        echo "<p>$mensaje</p>";
        error_log($mensaje);
    } else {
        if (fwrite($fh, "$fecha  $comentarioRamdon\n") === false) {
            $mensaje = "Error al escribir en el archivo.";
            echo "<p>$mensaje</p>";
            error_log($mensaje);
        }
    }   
    fclose($fh);
    
    echo "<h2>📝 Gestor de Comentarios (sin BD)</h2>";

    // Contamos los comentarios
    if (file_exists($path)) {
        $lineas = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $totalComentarios = count($lineas);
        echo "<p><b>Total comentarios guardados:</b> $totalComentarios</p>";
    } else {
        echo "<p>El archivo no existe aún.</p>";
    }

    // ultimo comentario guardado
    echo "<p>Último comentario añadido: $comentarioRamdon</p>";

    // leemos de nuevo el archivo 
    echo "<h2>Historial</h2>";
    $fh = fopen($path, 'r');

    if ($fh === false) {
        exit("No se pudo abrir el archivo");
    }
    // Leemos el fichero
    while (($linea = fgets($fh)) !== false) {
        echo "<ul><li>($linea)<br></li></ul>";
    }  
    fclose($fh);


    ?>
</body>

</html>

*********************************++++
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>act 4<title>
</head>

<body>
    <?php
    $email = "jcormar957@g.educaand.es";

    // separamos el nombre del dominio justo en la @ con el explode
    list($usuario, $dominio) = explode("@", $email);

    if (strlen($usuario) > 3) {
        $primeraLetra = substr($usuario, 0, 1);
        $ultimaLetra = substr($usuario, -1);
        $medioPalabra = str_repeat('*', strlen($usuario) - 2);
        $usuarioEnmascarado = $primeraLetra . $medioPalabra . $ultimaLetra;
    } else {
        $usuarioEnmascarado = $usuario;
    }

    echo "Email: $email</br>";
    echo "Usuario: $usuario</br>";
    echo "Dominio: $dominio</br>";
    echo "Usuario enmascarado: $usuarioEnmascarado </br>";
    ?>
</body>

</html>
