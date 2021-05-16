<?php

    class Animal{
        public $especie;
        public $peso;
        public $altura;
        public $dataNasc;
        public $cor;
        public $genero;
        public $alimentacao;

        public function exibirDados(){
            echo'<h3><b>Espécie: </b>'.$this->especie.'.</h3>
            <p><b>Peso: </b>'.$this->peso.' Kg.</p>
            <p><b>Altura: </b>'.$this->altura.' m.</p>
            <p><b>Gênero: </b>'.$this->genero.'.</p>
            <p><b>Data de Nascimento: </b>'.$this->dataNasc.'.</p>
            <p><b>Cor: </b>'.$this->cor.'.</p>
            <p><b>Tipo de Alimentação: </b>'.$this->alimentacao.'.</p>';
        }

    }

?>