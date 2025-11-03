<?php
    class Persona {
        private string $nombre;

        public function __construct(string $nom) {
            $this->nombre = $nom;
        }

        public function imprimir(){
            // No se indica $ en la propiedad.
            echo $this->nombre;
            echo '<br>';
        }
    }

    $fede = new Persona("Jose Cortés Martín"); // creamos un objeto
    $fede ->imprimir();
?>