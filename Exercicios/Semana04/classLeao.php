<?php

    require_once "classAnimal.php";

    class Leao extends Animal{
        public $tamanhoJuba;

        public function exibirDadosEspecificos(){
            echo'<p><b>Tamanho da Juba: </b>'.$this->tamanhoJuba.' cm.</p><hr/>';
        }


    }

?>