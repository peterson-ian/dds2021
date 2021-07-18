<?php
    // Aqui eu coloco o menu padrao do sistema e ainda verifico se o usuario esta logado;
    require_once "cabecalho.php";
    require_once "conexao.php";
    require_once "classeTabela/tabela.php";
    
    // Aqui eu acrescento o link que relaciona o arquivo de js de funcao
    echo'<script src="js/funcao.js"></script>';

    // Realizo a consulta no BD e pego as informações que ele retorna e exibo em uma tabela
    $sql = "SELECT * FROM FUNCAO ORDER BY TITULO_FUNCAO;";
    $resultado = $conexao->query($sql);

    // Alguns parametros que tenho que passar pra classe tabela
    $tabela = 'FUNCAO';
    $cabecalho = ['SIGLA', 'TITULO', 'SALARIO MAX', 'SALARIO MIN'];

    // Verifico se há tuplas na tabela se houver ele cria a tabela 
    // Se nao ele exibe uma msg avisando que nao há funções cadastradas
    if($resultado->rowCount()>0){
        // Crio a tabela usando a clase tabela
        $r = new Tabela($tabela, $cabecalho, $resultado);
        // Chamo o metodo exibir que faz toda a estrutura p/ exibir
        $r->exibir();
    }
    else{
        echo "Não há funções cadastradas.";
    }
?>