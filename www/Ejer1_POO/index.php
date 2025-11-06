<?php
include "models/Producto.php";
include "models/ProductoDigital.php";
include "models/ProductoFisico.php";
include "models/Cliente.php";
include "models/Pedido.php";
include "app/interfaces/ResumenInterface.php";
$miProductoFisico = new ProductoFisico("TV321", 499.99, 10);
$miProductoDigital = new ProductoDigital("EBOOK", 9.99, 2);
$miProductoFisico -> mostrarResumen();
$miProductoDigital -> mostrarResumen();
?>