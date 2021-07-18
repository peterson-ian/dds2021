<?php
    // Aqui eu verifico se o usuario esta logado;
    require_once "verificar_usuario.php";

    // Confiro se o usuario tem a permissao de inserir dados, se tiver ele consegue se nao ele é redirecionado
    if($_SESSION["perfil"] != "1"){
        header("location:index.php");
    }
    else{
        require_once "conexao.php";

        // Aqui eu recebo e insiro os dados
        $nome = $_POST["nome"];
        if($_POST["gerente"] == '-1')
            $id_gerente = 'NULL';
        else 
            $id_gerente = $_POST["gerente"];
        $id_localizacao = $_POST["localizacao"];

        $sql = "INSERT INTO DEPARTAMENTO VALUES (NULL, '$nome', $id_gerente, '$id_localizacao')";
        $conexao->query($sql) or die($conexao->errorInfo());

        // Aqui eu retorno "1" p/ realizar outras funcoes no sistema, como exibir uma msg de sucesso
        echo "1";
    }
?>