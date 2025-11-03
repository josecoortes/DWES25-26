<?php
   // Clase abstracta
    abstract class Producto {
        private string $codigo;

        public function __construct(string $codigo)
        {
            $this->codigo=$codigo;
        }

        public function getCodigo() : string 
        {
            return $this->codigo;
        }

        // Método abstracto
        abstract public function mostrarResumen();
    }
?>