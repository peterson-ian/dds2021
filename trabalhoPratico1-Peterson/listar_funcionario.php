<?php
    include "cabecalho.php";
    include "conexao.php";
    require_once "classeTabela/tabela.php";
    echo'<script src="js/funcionario.js"></script>';

    $sql = "SELECT 
                FUNCIONARIO.ID_FUNCIONARIO AS ID, 
                FUNCIONARIO.NOME, 
                FUNCIONARIO.SOBRENOME,
                FUNCIONARIO.EMAIL, 
                FUNCIONARIO.TELEFONE, 
                FUNCIONARIO.DATA_CONTRATACAO, 
                FUNCAO.TITULO_FUNCAO, 
                FUNCIONARIO.SALARIO, 
                FUNCIONARIO.COMISSAO, 
                GERENTE.NOME AS GERENTE, 
                DEPARTAMENTO.NOME_DEPARTAMENTO 
            FROM 
                FUNCIONARIO 
                INNER JOIN FUNCAO ON FUNCAO.ID_FUNCAO = FUNCIONARIO.ID_FUNCAO 
                INNER JOIN DEPARTAMENTO ON DEPARTAMENTO.ID_DEPARTAMENTO = FUNCIONARIO.ID_DEPARTAMENTO
                LEFT JOIN FUNCIONARIO GERENTE ON GERENTE.ID_FUNCIONARIO = FUNCIONARIO.ID_GERENTE
            ORDER BY FUNCIONARIO.ID_FUNCIONARIO";
    $resultado = $conexao->query($sql);
    
    $tabela = 'FUNCIONARIO';
    $cabecalho = ['ID', 'PRIMEIRO NOME', 'SOBRENOME', 'EMAIL', 'TELEFONE', 'DATA CONTRATACAO',
                'FUNCAO', 'SALARIO', 'COMISSAO', 'GERENTE', 'DEPARTAMENTO'];

    if($resultado->rowCount()>0){
        $r = new Tabela($tabela, $cabecalho, $resultado);
        $r->exibir();
    }
    else{
        echo "Não há funcionarios cadastrados.";
    }
?>