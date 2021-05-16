<?php

    require_once "classAnimal.php";

    class Cavalo extends Animal{
        public $corCrina;

        public function exibirDadosEspecificos(){
            echo'<p><b>Cor da Crina: </b>'.$this->corCrina.'.</p><hr/>';
        }
    }

?>