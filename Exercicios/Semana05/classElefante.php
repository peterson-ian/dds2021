<?php

    require_once "classAnimal.php";

    class Elefante extends Animal{
        public $tamanhoTromba;

        public function __construct($valores){
            parent::__construct($valores);
            $this->tamanhoTromba = $valores["tamanhoTromba"];
        }

        public function exibirDados(){
            parent::exibirDados();
            echo'<p><b>Tamanho da Trompa: </b>'.$this->tamanhoTromba.' cm.</p><hr/>';
        }
    }

?>