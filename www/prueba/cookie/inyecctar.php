<?php
$value = "Valor_de_la_cookie";
setcookie("micookie", $value);
setcookie("micookie", $value, time()+3600);
echo "cookie creada"
?>