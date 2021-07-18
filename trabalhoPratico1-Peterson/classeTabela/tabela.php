<?php
    // Aqui eu chamo a classes que a class tabela vai precisar 
    require_once "th.php";
    require_once "td.php";
    require_once "interfaceTabela.php";

    class Tabela implements ExibicaoTabela{
        // A tabela vai precisar de cabecalho e do td
        public $cabecalho;
        public $td;

        // Aqui eu passo titulo_tabela que é p/ identificaçao da tabela
        // O ths é um vetor que define as colunas da tabela
        // O tds é um resultado da consulta que sera os elementos das colunas
        public function __construct($titulo_tabela, $ths, $tds)
        {
            // Instanciando um objeto Th
            $this->cabecalho = new Th($ths, $titulo_tabela);
            // Instanciando um objeto Td
            $this->td = new Td($titulo_tabela, $tds, $ths);
        }

        // Metodo p/ exibir a tabela
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