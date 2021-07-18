<?php
    // Aqui eu coloco o menu padrao do sistema e ainda verifico se o usuario esta logado;
    require_once "cabecalho.php";
    require_once "conexao.php";
    require_once "classeTabela/tabela.php";

    // Aqui eu acrescento o link que relaciona o arquivo de js de funcionario
    echo'<script src="js/funcionario.js"></script>';

    // Realizo a consulta no BD e pego as informações que ele retorna e exibo em uma tabela
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
    
    // Alguns parametros que tenho que passar pra classe tabela
    $tabela = 'FUNCIONARIO';
    $cabecalho = ['ID', 'PRIMEIRO NOME', 'SOBRENOME', 'EMAIL', 'TELEFONE', 'DATA CONTRATACAO',
                'FUNCAO', 'SALARIO', 'COMISSAO', 'GERENTE', 'DEPARTAMENTO'];

    // Verifico se há tuplas na tabela se houver ele cria a tabela 
    // Se nao ele exibe uma msg avisando que nao há funcionarios cadastrados
    if($resultado->rowCount()>0){
        // Crio a tabela usando a clase tabela
        $r = new Tabela($tabela, $cabecalho, $resultado);
        // Chamo o metodo exibir que faz toda a estrutura p/ exibir
        $r->exibir();
    }
    else{
        echo "Não há funcionarios cadastrados.";
    }
?>