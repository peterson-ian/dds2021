<?php

    require_once "classAnimal.php";

    class Cavalo extends Animal{
        public $corCrina;

        public function __construct($valores){
            parent::__construct($valores);
            $this->corCrina = $valores["corCrina"];
        }

        public function exibirDados(){
            parent::exibirDados();
            echo'<p><b>Cor da Crina: </b>'.$this->corCrina.'.</p><hr/>';
        }
    }

?>