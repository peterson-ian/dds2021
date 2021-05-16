<?php

    require_once "classAnimal.php";

    class Rinoceronte extends Animal{
        public $tamanhoChifre;


        public function exibirDadosEspecificos(){
            echo'<p><b>Tamanho da Chifre: </b>'.$this->tamanhoChifre.' cm.</p><hr/>';
        }
    }

?>