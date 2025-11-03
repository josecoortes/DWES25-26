<?php
    interface Animal {
        public function hacerSonido();
    }

    class Perro implements Animal {
        public function hacerSonido() {
            echo "Guau!";
        }
    }

    class Gato implements Animal {
        public function hacerSonido() {
            echo "Miau!";
        }
    }

    $animales = [new Perro(), new Gato()];

    foreach ($animales as $a) {
        $a->hacerSonido();
        echo "<br>";
    }
?>