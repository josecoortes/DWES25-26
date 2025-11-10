<?php
namespace App\Models;
include "ProductoDigital.php";
include "ProductoFisico.php";
include "Cliente.php";
class Pedido implements ResumenInterface{
    private Cliente $cliente;
    private array $listaProductos;

    public function __construct(Cliente $cliente, array $listaProductos)
    {
        $this->cliente;
        $this->listaProductos;
    }
    public function agregarProducto(Producto $p) :  array{
        $this->listaProductos[] = $p;
        return $this->listaProductos;
    }

        public function mostrarDetalle()
    {
        echo "Pedido de " . $this->cliente . "\n\n";

        $total = 0;

        foreach ($this->productos as $producto) {
            echo $producto->mostrarResumen() . "\n";
            $total += $producto->getPrecio();
        }
    }
}
?>