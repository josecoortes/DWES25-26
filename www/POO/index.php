<?php
    require 'Tienda/Producto.php';
    require 'Fabrica/Producto.php';

    use Tienda\Producto as ProductoTienda;
    use Fabrica\Producto as ProductoFabrica;

    $p1 = new ProductoTienda();
    $p2 = new ProductoFabrica();

    $p1->info(); // Muestra: Producto de la tienda.
    $p2->info(); // Muestra: Producto de la fábrica.
?>