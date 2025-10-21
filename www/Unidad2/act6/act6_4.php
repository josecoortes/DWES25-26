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