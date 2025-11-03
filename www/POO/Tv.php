<?php
include "Producto.php";
class Tv extends Producto {
        public string $pulgadas;
        public string $tecnologia;

        public function __construct(string $codigo,string $pulgadas, string $tecnologia)
        {
            parent::__construct($codigo);
            $this->pulgadas=$pulgadas;
            $this->tecnologia=$tecnologia;
        }

        public function mostrarResumen() { //obligado a implementarlo
            echo "<p>Código ".$this->getCodigo()."</p>";
            echo "<p>TV ".$this->tecnologia." de ".$this->pulgadas."</p>";
        }
    }

    $t = new Tv("K-34","65","Led");
    $t->mostrarResumen();
?>