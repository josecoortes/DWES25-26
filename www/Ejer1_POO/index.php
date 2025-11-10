<?php
include "models/Producto.php";
include "models/ProductoDigital.php";
include "models/ProductoFisico.php";
include "models/Cliente.php";
include "models/Pedido.php";
include "app/interfaces/ResumenInterface.php";
// Crear clientes
$cliente1 = new Cliente("Ana López", "ana@example.com");
$cliente2 = new Cliente("Carlos Pérez", "carlos@example.com");

// Crear productos físicos
$tv = new ProductoFisico("TV123", 499.99, 10);
$laptop = new ProductoFisico("LAP789", 899.99, 2.5);

// Crear productos digitales
$ebook = new ProductoDigital("EBOOK456", 9.99, 2);
$juego = new ProductoDigital("GAME42", 59.99, 10);
$musica = new ProductoDigital("MP3X", 4.99, 0.5);

// Crear pedido 1
$pedido1 = new Pedido($cliente1);
$pedido1->agregarProducto($tv);
$pedido1->agregarProducto($ebook);
$pedido1->agregarProducto($juego);

// Crear pedido 2
$pedido2 = new Pedido($cliente2);
$pedido2->agregarProducto($laptop);
$pedido2->agregarProducto($musica);

// Mostrar detalles
echo "<pre>"; // para que se vea bien formateado en navegador
$pedido1->mostrarDetalle();
echo "\n-----------------------------\n\n";
$pedido2->mostrarDetalle();
echo "</pre>";
?>
?>