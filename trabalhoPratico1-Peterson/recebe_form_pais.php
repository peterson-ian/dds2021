<?php
    // Aqui eu verifico se o usuario esta logado;
    require_once "verificar_usuario.php";

    // Confiro se o usuario tem a permissao de inserir dados, se tiver ele consegue se nao ele é redirecionado
    if($_SESSION["perfil"] != "1"){
        header("location:index.php");
    }
    else{
        require_once 'conexao.php';

        // Aqui eu recebo e insiro os dados
        $id_pais = $_POST["sigla"];
        $nome_pais = $_POST["nome"];    
        $id_regiao = $_POST["regiao"];    
        $sql = "INSERT INTO PAIS VALUES('$id_pais','$nome_pais','$id_regiao')";;    
        $conexao->query($sql);  
        
        // Aqui eu retorno "1" p/ realizar outras funcoes no sistema, como exibir uma msg de sucesso
        echo "1";
    }  
?>