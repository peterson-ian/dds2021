<?php
    include "cabecalho.php";
    include "conexao.php";
    require_once "classeTabela/tabela.php";
    echo'<script src="js/pais.js"></script>';

    $sql = "SELECT ID_PAIS, NOME_PAIS, NOME_REGIAO FROM PAIS 
                                            INNER JOIN 
                                        REGIAO ON PAIS.ID_REGIAO = REGIAO.ID_REGIAO
                                     ORDER BY NOME_PAIS";
    
    $resultado = $conexao->query($sql);
    
    $tabela = 'PAIS';
    $cabecalho = ['SIGLA', 'NOME', 'REGIAO'];

    if($resultado->rowCount()>0){
        $r = new Tabela($tabela, $cabecalho, $resultado);
        $r->exibir();
    }
    else{
        echo "Não há paises cadastrados.";
    }
?>