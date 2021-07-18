<?php
    // Aqui eu verifico se o usuario esta logado;
    require_once "verificar_usuario.php";

    // Confiro se o usuario tem a permissao de inserir dados, se tiver ele consegue se nao ele é redirecionado
    if($_SESSION["perfil"] == "3"){
        header("location:index.php");
    }
    else{
        require_once "conexao.php";

        // Aqui eu recebo e insiro os dados
        $sigla = $_POST["sigla"];
        $titulo = $_POST["titulo"];
        $salario_min = $_POST["salario_min"];
        $salario_max = $_POST["salario_max"];

        $sql = "INSERT INTO FUNCAO VALUES ('$sigla', '$titulo', '$salario_min', '$salario_max')";
        $conexao->query($sql);

        // Aqui eu retorno "1" p/ realizar outras funcoes no sistema, como exibir uma msg de sucesso
        echo "1";
    }
?>