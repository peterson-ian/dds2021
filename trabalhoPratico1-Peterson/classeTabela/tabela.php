<?php
    require_once "th.php";
    require_once "td.php";
    require_once "interfaceTabela.php";

    class Tabela implements ExibicaoTabela{
        public $cabecalho;
        public $td;

        public function __construct($titulo_tabela, $ths, $tds)
        {
            $this->cabecalho = new Th($ths);
            $this->td = new Td($titulo_tabela, $tds, $ths);
        
        }

        public function exibir(){
            echo"
                <p id='msg'></p>
                <table border='1'>
            ";
            $this->cabecalho->exibir();
            $this->td->exibir();
            echo"
                </table>
            ";
        }

    }
?>