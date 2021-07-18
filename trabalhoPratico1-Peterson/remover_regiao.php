<?php
    // Aqui eu verifico se o usuario esta logado;
    require_once "verificar_usuario.php";

    // Confiro se o usuario tem a permissao de remover dados, se tiver ele consegue se nao ele é redirecionado
    if($_SESSION["perfil"] != "1"){
        header("location:index.php");
    }
    else{
        require_once 'conexao.php';

        // Aqui eu recebo e removo os dados
        $id = $_POST["id"];
        $sql = "DELETE FROM REGIAO WHERE ID_REGIAO='$id'";

        $conexao->query($sql);

        // Aqui eu retorno "1" p/ realizar outras funcoes no sistema, como exibir uma msg de sucesso
        echo "1";
    }
?>