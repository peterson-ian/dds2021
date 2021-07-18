<?php
    // Aqui eu coloco o menu padrao do sistema e ainda verifico se o usuario esta logado;
    require_once "cabecalho.php";
    require_once "conexao.php";
    require_once "classeTabela/tabela.php";
    
    // Aqui eu acrescento o link que relaciona o arquivo de js de departamento
    echo'<script src="js/departamento.js"></script>';

    // Realizo a consulta no BD e pego as informações que ele retorna e exibo em uma tabela
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

    // Alguns parametros que tenho que passar pra classe tabela
    $tabela = 'DEPARTAMENTO';
    $cabecalho = ['ID', 'NOME', 'GERENTE', 'LOCALIZACAO'];

    // Verifico se há tuplas na tabela se houver ele cria a tabela 
    // Se nao ele exibe uma msg avisando que nao há departamentos cadastrados
    if($resultado->rowCount()>0){
        // Crio a tabela usando a clase tabela
        $r = new Tabela($tabela, $cabecalho, $resultado);
        // Chamo o metodo exibir que faz toda a estrutura p/ exibir
        $r->exibir();
    }
    else{
        echo "Não há departamentos cadastrados.";
    }
?>