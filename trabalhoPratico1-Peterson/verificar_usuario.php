<?php

    /* 
        REGRAS DO SISTEMA: 
        1 - é o admin geral tem acesso total;
        2 - é o gerente tem limitação no cadastro de Regiao, Pais, Localizacao e Departamento mas 
            pode visualizar Localizacao e Departamento, as outras funções ele tem acesso completo;
        3- é o gestor do RH só pode cadastrar Funcionario e ver as tabelas Funcoes, Departamento e Funcionarios;
    */

    // Inicia a sessao
    session_start();

    // Verifica se a sessao nao esta setada
    if(!isset($_SESSION["autorizado"])){
        // Caso nao esteja ele é redirecionado ao login para logar e entrar no sistema
        header("location: login.php");
    }

?>