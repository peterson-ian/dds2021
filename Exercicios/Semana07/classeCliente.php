<?php

    class Cliente{
        public $cpf;
        public $nome;
        public $telefone;
        public $endereco;
        public $sexo;
        public $data_nasc;
        public $email;
        
        public function __construct($valores){
            $this->cpf = $valores["cpf"];
            $this->nome = $valores["nome"];
            $this->telefone = $valores["telefone"];
            $this->endereco = $valores["endereco"];
            $this->sexo = $valores["sexo"];
            $this->data_nasc = $valores["data_nasc"];
            $this->email = $valores["email"];
        }

        public function exibir(){
            $sexo['M'] = 'Masculino';
            $sexo['F'] = 'Feminino';
            echo "<b>CPF: </b>".$this->cpf."<br/>
                <b>Nome: </b>".$this->nome."<br/>
                <b>Telefone: </b>".$this->telefone."<br/>
                <b>Endereço: </b>".$this->endereco."<br/>
                <b>Sexo: </b>".$sexo[$this->sexo]."<br/>
                <b>Data Nascimento: </b>".$this->data_nasc."<br/>
                <b>Email: </b>".$this->email."<br/><hr/>";
        }
    }

    

?>