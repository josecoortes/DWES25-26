<?php 
class TemperaturaAlta extends Exception {};

$temperatura = rand(-10,100);
$token = ["", "OK"];
$cpuCargada = rand(0,150);
$valorAleatorio = $token[array_rand($token)];

echo "🌡️ Temperatura: " . $temperatura . "<br>";
echo "🖥️ Carga CPU: " . $cpuCargada . "<br>";
echo "🔐 token: " . $valorAleatorio . "<br>";

if (empty($valorAleatorio)) {
    die(" ❌ Es un error crítico: no hay clave para arrancar el sistema");
}

if ($temperatura > 80 || $temperatura < 0){
    trigger_error("El sistema puede arrancar, pero bajo riesgo", E_USER_WARNING);
}

try {
    if ($cpuCargada > 100) {
    throw new TemperaturaAlta("CPU Cargada", 1);
} else{
    echo "✅ Servidor iniciado correctamente <br>";
}
} catch (TemperaturaAlta) {
    echo "🚨 La CPU esta demasiado cargada, intentelo mas tarde";
} finally{
    echo "🧹 Fin del proceso";
}

?>