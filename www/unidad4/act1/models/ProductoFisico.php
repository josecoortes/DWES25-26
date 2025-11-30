<?php
namespace App\Models;
class ProductoFisico extends Producto{
    private float $tamanoArchivo;

    public function __construct(string $codigo, float $precio, float $tamanoArchivo){
        parent::__construct($codigo, $precio);
        $this -> tamanoArchivo = $tamanoArchivo;
    }

    public function getTamanoArchivo(): float{
        return $this->tamanoArchivo;
    }

    public function mostrarResumen() {
        echo "💾 Producto Fisico " . $this->getCodigo() . " - " . $this->getPrecio() . " ( " . $this->getTamanoArchivo() . "MB )<br>";
    }
    public function mostrarDetalle(): void {
        echo "Detalle Producto Digital: código " . $this->getCodigo() . " | precio " . $this->getPrecio() . "€ | Tamaño del archivo " . $this->getTamanoArchivo();
    }
}
?>