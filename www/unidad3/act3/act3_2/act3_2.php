<?php
session_start();


$usuarioValido = "usuario@dominio.com";
$passwordValido = "1234";

$error = "";


if (isset($_SESSION['email'])) {
    header("Location: privado.php");
    exit();
}

if  (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'] ?? "";
    $password = $_POST['password'] ?? "";

    if (empty($email) || empty($password)) {
        $error = "Todos los campos son obligatorios.";
    } elseif ($email === $usuarioValido && $password === $passwordValido) {
        $_SESSION['email'] = $email;
        header("Location: privado.php");
        exit();
    } else {
        $error = "Credenciales incorrectas.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://unpkg.com/picocss@1.*pico.min.css">
</head>
<body>
    <main class="container">
        <h1>Login</h1>
        <?php if ($error) echo "<p class='error'>$error</p>"; ?>
        <form method="post" action="">
            <label>Email:
                <input type="email" name="email" required>
            </label>
            <label>Contraseña:
                <input type="password" name="password" required>
            </label>
            <button type="submit">Acceder</button>
        </form>
    </main>
</body>
</html>
