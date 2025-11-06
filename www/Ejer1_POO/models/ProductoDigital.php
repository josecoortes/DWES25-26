<?php
class ProductoDigital extends Producto{
    private int $peso;

    public function __construct(string $codigo, float $precio, int $peso){
        parent::__construct($codigo, $precio);
        $this -> peso = $peso;
    }

    public function getPeso(): int{
        return $this->peso;
    }

    public function mostrarResumen() {
        echo "📦 Producto físico" . $this->getCodigo() . " - " . $this->getPrecio() . " ( " . $this->getPeso() . "€ )";    
    }
}
?>