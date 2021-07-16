<?php
    include "cabecalho.php";
    include "conexao.php";
    require_once "classeTabela/tabela.php";
    echo'<script src="js/funcao.js"></script>';

    $sql = "SELECT * FROM FUNCAO ORDER BY TITULO_FUNCAO;";
    $resultado = $conexao->query($sql);

    $tabela = 'FUNCAO';
    $cabecalho = ['SIGLA', 'TITULO', 'SALARIO MAX', 'SALARIO MIN'];

    if($resultado->rowCount()>0){
        $r = new Tabela($tabela, $cabecalho, $resultado);
        $r->exibir();
    }
    else{
        echo "Não há funções cadastradas.";
    }
?>