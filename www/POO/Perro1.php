<?php
include "Animal1.php";
// Clase Perro hereda de la clase Animal
    class Perro1 extends Animal1 {
        private $especie;

        public function __construct(string $nombre, string $especie)
        {
            parent::__construct($nombre);
            $this->especie=$especie;
        }

        public function ladrar() {
            echo "$this->nombre está ladrando.";
        }

        // Sobreescribe el metodo presentar.
        public function presentar()
        {
            echo "Hola me llamo $this->nombre y soy de la especie $this->especie";
        }
    }

    $miPerro = new Perro1("Rex","Pastor Alemán");
    $miPerro->presentar(); // Usa el método de la clase Perro.
    echo "<BR>";
    $miPerro->ladrar();    
    ?>