<?php

    require_once "classAnimal.php";

    class Elefante extends Animal{
        public $tamanhoTromba;

        public function exibirDadosEspecificos(){
            echo'<p><b>Tamanho da Trompa: </b>'.$this->tamanhoTromba.' cm.</p><hr/>';
        }
    }

?>