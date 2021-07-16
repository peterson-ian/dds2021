<?php
    include "cabecalho.php";
    include "conexao.php";
    require_once "classeTabela/tabela.php";
    echo'<script src="js/localizacao.js"></script>';

    $sql = "SELECT ID_LOCALIZACAO, ENDERECO, CEP, CIDADE, ESTADO, NOME_PAIS FROM LOCALIZACAO 
                        INNER JOIN PAIS ON PAIS.ID_PAIS = LOCALIZACAO.ID_PAIS 
                        ORDER BY ID_LOCALIZACAO;";
    $resultado = $conexao->query($sql);

    $tabela = 'LOCALIZACAO';
    $cabecalho = ['ID LOCALIZACAO', 'ENDERECO', 'CEP', 'CIDADE', 'ESTADO', 'PAIS'];

    if($resultado->rowCount()>0){
        $r = new Tabela($tabela, $cabecalho, $resultado);
        $r->exibir();
    }
    else{
        echo "Não há localizações cadastradas.";
    }
?>