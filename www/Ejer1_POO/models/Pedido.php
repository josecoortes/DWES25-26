<?php
namespace App\Models;

use App\Interfaces\ResumenInterface;

class Pedido implements ResumenInterface
{
    private Cliente $cliente;
    private array $listaProductos = [];

    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function agregarProducto(Producto $p): void
    {
        $this->listaProductos[] = $p;
    }

    public function mostrarDetalle()
    {
        echo "Pedido de " . $this->cliente . "\n\n";

        $total = 0;
        foreach ($this->listaProductos as $producto) {
            $producto->mostrarResumen();
            $total += $producto->getPrecio();
        }

        echo "\nTotal: $total\n";
    }
}
