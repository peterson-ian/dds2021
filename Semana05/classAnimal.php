<?php

    abstract class Animal{
        public $especie;
        public $peso;
        public $altura;
        public $dataNasc;
        public $cor;
        public $genero;
        public $alimentacao;

        public function __construct( $valores){
            $this->especie = $valores["especie"];
            $this->peso = $valores["peso"];
            $this->altura = $valores["altura"];
            $this->dataNasc = $valores["dataNasc"];
            $this->cor = $valores["cor"];
            $this->genero = $valores["genero"];
            $this->alimentacao = $valores["alimentacao"];
        }

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