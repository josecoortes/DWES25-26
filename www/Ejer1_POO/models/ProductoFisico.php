<?php
class ProductoFisico extends Producto{
    private int $tamanoArchivo;

    public function __construct(string $codigo, float $precio, int $tamanoArchivo){
        parent::__construct($codigo, $precio);
        $this -> tamanoArchivo = $tamanoArchivo;
    }

    public function getTamanoArchivo(): int{
        return $this->tamanoArchivo;
    }

    public function mostrarResumen() {
        echo "💾 Producto digital " . $this->getCodigo() . " - " . $this->getPrecio() . " ( " . $this->getTamanoArchivo() . "MB )<br>";    
    }
}
?>