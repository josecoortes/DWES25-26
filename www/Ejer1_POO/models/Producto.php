<?php
abstract class Producto{
    private string $codigo;
    protected float $precio;

    public function __construct(string $codigo, float $precio) {
        $this -> codigo = $codigo;
        $this -> precio = $precio;
    }
    abstract public function mostrarResumen();
    public function getCodigo(): string {
        return $this->codigo;
    }

    public function getPrecio(): float {
        return $this->precio;
    }

    public function setPrecio(float $precio): void {
        $this->precio = $precio;
    }
}
?>