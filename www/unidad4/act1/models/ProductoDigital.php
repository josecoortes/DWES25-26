<?php
namespace App\Models;
class ProductoDigital extends Producto{
    private float $peso;

    public function __construct(string $codigo, float $precio, float $peso){
        parent::__construct($codigo, $precio);
        $this -> peso = $peso;
    }

    public function getPeso(): float{
        return $this->peso;
    }

    public function mostrarResumen() {
        echo "📦 Producto Digital" . $this->getCodigo() . " - " . $this->getPrecio() . " ( " . $this->getPeso() . "€ )";
    }

    public function mostrarDetalle(): void {
        echo "Detalle Producto Digital: código " . $this->getCodigo() . " | precio " . $this->getPrecio() . "€ | peso " . $this->getPeso();
    }
}
?>