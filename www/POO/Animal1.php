<?php
    class Animal1
    {
        protected $nombre;

        public function __construct(string $nombre) {
            $this->nombre = $nombre;
        }

        public function presentar() {
            echo "Hola me llamo $this->nombre";
        }
    }
?>