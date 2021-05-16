<?php

    require_once "classAnimal.php";

    class Leao extends Animal{
        public $tamanhoJuba;

        public function __construct($valores){
            parent::__construct($valores);
            $this->tamanhoJuba = $valores["tamanhoJuba"];
        }

        public function exibirDados(){
            parent::exibirDados();
            echo'<p><b>Tamanho da Juba: </b>'.$this->tamanhoJuba.' cm.</p><hr/>';
        }


    }

?>