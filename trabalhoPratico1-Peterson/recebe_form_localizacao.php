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
        $endereco = $_POST["endereco"];
        $cep = $_POST["cep"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $pais = $_POST["pais"];

        $sql = "INSERT INTO LOCALIZACAO VALUES (NULL, '$endereco', '$cep', '$cidade', '$estado', '$pais');";
        $conexao->query($sql) or die($conexao->errorInfo());

        // Aqui eu retorno "1" p/ realizar outras funcoes no sistema, como exibir uma msg de sucesso
        echo "1";
    }
?>