<?php
    include "cabecalho.php";
    include "conexao.php";
    require_once "classeTabela/tabela.php";
    echo'<script src="js/regiao.js"></script>';

    $sql = "SELECT * FROM REGIAO ORDER BY ID_REGIAO";
    $resultado = $conexao->query($sql);

    $tabela = 'REGIAO';
    $cabecalho = ['ID REGIAO', 'NOME'];

    if($resultado->rowCount()>0){

        $r = new Tabela($tabela, $cabecalho, $resultado);
        $r->exibir();
    }
    else{
        echo "Não há regiões cadastradas.";
    }
?>
