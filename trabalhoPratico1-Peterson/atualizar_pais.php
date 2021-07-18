<?php
    // Aqui eu verifico se o usuario esta logado;
    require_once "verificar_usuario.php";

    // Confiro se o usuario tem a permissao de atualizar, se tiver ele consegue se nao ele é redirecionado
    if($_SESSION["perfil"] != "1"){
        header("location:index.php");
    }
    else{
        require_once "conexao.php";

        // Aqui eu recebo e atualizo os dados
        $id = $_POST["id"];
        $sigla = $_POST["sigla"];
        $nome = $_POST["nome"];
        $regiao = $_POST["regiao"];
            
        $sql = "UPDATE PAIS SET ID_PAIS='$sigla', NOME_PAIS='$nome', ID_REGIAO = '$regiao' WHERE ID_PAIS='$id'";
        
        $conexao->query($sql);
        
        // Aqui eu retorno "1" p/ realizar outras funcoes no sistema, como exibir uma msg de sucesso
        echo "1";
    }
?>