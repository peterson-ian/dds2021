<?php
    include "cabecalho.php";
    include "conexao.php";
    require_once "classeTabela/tabela.php";
    echo'<script src="js/departamento.js"></script>';

    $sql = "SELECT 
                DEPARTAMENTO.ID_DEPARTAMENTO, 
                DEPARTAMENTO.NOME_DEPARTAMENTO, 
                GERENTE.NOME AS GERENTE, 
                CONCAT(ENDERECO , ' - ', CIDADE, ', ', ESTADO,' - ',ID_PAIS) AS LOC 
            FROM DEPARTAMENTO 
                INNER JOIN LOCALIZACAO ON LOCALIZACAO.ID_LOCALIZACAO = DEPARTAMENTO.ID_LOCALIZACAO
                LEFT JOIN FUNCIONARIO GERENTE ON GERENTE.ID_FUNCIONARIO = DEPARTAMENTO.ID_GERENTE
            ORDER BY ID_DEPARTAMENTO;";
    $resultado = $conexao->query($sql);

    $tabela = 'DEPARTAMENTO';
    $cabecalho = ['ID', 'NOME', 'GERENTE', 'LOCALIZACAO'];

    if($resultado->rowCount()>0){
        $r = new Tabela($tabela, $cabecalho, $resultado);
        $r->exibir();
    }
    else{
        echo "Não há departamentos cadastrados.";
    }
?>