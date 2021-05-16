<?php

    require_once "classAnimal.php";

    class Rinoceronte extends Animal{
        public $tamanhoChifre;

        public function __construct($valores){
            parent::__construct($valores);
            $this->tamanhoChifre = $valores["tamanhoChifre"];
        }

        public function exibirDados(){
            parent::exibirDados();
            echo'<p><b>Tamanho da Chifre: </b>'.$this->tamanhoChifre.' cm.</p><hr/>';
        }
    }

?>