<?php
    class MayorMenor 
    {
        private int $mayor;
        private int $menor;

        public function setMayor(int $may) {
            $this->mayor = $may;
        }

        public function setMenor(int $men) {
            $this->menor = $men;
        }

        public function getMayor() : int {
            return $this->mayor;
        }

        public function getMenor() : int {
            return $this->menor;
        }    
    }

    $numero=new MayorMenor();
    $numero->setMayor(32);
    echo $numero->getMayor();
?>