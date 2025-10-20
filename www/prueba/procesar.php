<?php 
    // Procesamiento del nombre
    if (!empty($_POST['nombre']))
        echo "El nombre es " .  htmlspecialchars($_POST['nombre']);     
        else
            echo 'No se ha especificado el nombre';
    echo "<br>";

    // Procesamiento de los apellidos
    if (!empty($_POST['apellidos']))
        echo "Los apellidos son ". htmlspecialchars($_POST['apellidos']);     
        else
            echo 'No se han especificado los apellidos';
    echo "<br>";

    // Procesamiento del genero.
    define('OPCIONES', ['m', 'f', 'o']);
    if (!empty($_POST['genero']))
    {
        if (in_array($_POST['genero'],OPCIONES))
            echo "Tu género es ". $_POST['genero'];
                else
                    echo 'El género no tiene un valor válido';
    }            
    else
        echo 'El género no se ha recibido';
    echo "<br>";

    // Procesamiento del pais.
    define('OPCIONES1', ['es', 'mx', 'ar','co']);
    if (!empty($_POST['pais']))
    {
        if (in_array($_POST['pais'],OPCIONES1))
            echo "Pais: Se ha recibido ". $_POST['pais'];
                else
                    echo 'El pais no tiene un valor válido';
    }            
    else
        echo 'El pais no se ha recibido';
    echo "<br>";

    // Procesamiento de lenguajes.
    $lenguajes_permitidos = ['html', 'css', 'javascript', 'php'];
    if (!empty($_POST['lenguajes']) && is_array($_POST['lenguajes']))
    {
        $no_validos = array_diff($_POST['lenguajes'], $lenguajes_permitidos);
        if (count($no_validos) == 0)
            echo 'Los lenguajes recibidos están dentro de los esperados y son: '.implode(', ',$_POST['lenguajes']);      
            else
                echo 'Se han recibido lenguajes no esperados';
    }
    else
        echo 'No se han recibido los lenguajes o no son del tipo esperado.';
    echo "<br>";
    
    // Procesamiento de habilidades.
    $habilidades_permitidas = ['ux', 'bbdd', 'git', 'seo'];
    if (!empty($_POST['habilidades']) && is_array($_POST['habilidades']))
    {
        $no_validos = array_diff($_POST['habilidades'], $habilidades_permitidas);
        if (count($no_validos) == 0)
            echo 'Las habilidades recibidas están dentro de los esperadas y son: '.implode(', ',$_POST['habilidades']);      
            else
                echo 'Se han recibido habilidades no esperadas';
    }
    else
        echo 'No se han recibido las habilidades o no son del tipo esperado.';
    echo "<br>";

    // Procesamiento de la biografía
    if (!empty($_POST['bio']))
        echo "La biografía es ". htmlspecialchars($_POST['bio']);     
        else
            echo 'No se ha especificado la biografía';
    echo "<br>";

    // Procesamiento de ficheros
    // Carpeta de destino
    $destDir = __DIR__ . '/uploads';
    if (!is_dir($destDir)) 
        {
            mkdir($destDir, 0775, true);
        }

    // Límite y tipos permitidos
    const MAX_SIZE = 100000;
    $tiposPermitidos = ['image/png'];

    // Comprobar si se ha subido un archivo
    if (!empty($_FILES['archivo'])) 
        {

            $nombre = $_FILES['archivo']['name'];
            $tmp    = $_FILES['archivo']['tmp_name'];
            $error  = $_FILES['archivo']['error'];
            $size   = $_FILES['archivo']['size'];

            if ($error !== UPLOAD_ERR_OK) {
                echo "Fichero: Error con $nombre (código $error).<br>";
            } elseif ($size > MAX_SIZE) {
                echo "$nombre: supera el tamaño máximo.<br>";
            } elseif (!is_uploaded_file($tmp)) {
                echo "$nombre: subida no válida.<br>";
            } elseif (!in_array(mime_content_type($tmp), $tiposPermitidos, true)) {
                echo "$nombre: tipo no permitido.<br>";
            } else {
                $destino = $destDir . '/' . basename($nombre);
                if (move_uploaded_file($tmp, $destino)) {
                    echo "Subido: $nombre<br>";
                } else {
                    echo "No se pudo mover $nombre.<br>";
                }
            }
        }
        else 
        {
            echo "No se ha subido ningún fichero.<br>";
        }
    
    // Procesar el dato oculto
    if (!empty($_POST['dato_oculto']))
        echo "El dato oculto recibido es ". $_POST['dato_oculto'] ."<BR>";
    else
        echo "El dato oculto no se ha recibido.<br>";

    // Procesar los terminos
    if (!empty($_POST['terminos']) && $_POST['terminos']=='S')
        echo "Se han aceptado los terminos";
        else
            echo "No se han aceptado los terminos o no ha llegado el dato";
?>
