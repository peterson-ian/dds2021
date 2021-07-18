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
        $nome = $_POST["nome"];
        $gerente = $_POST["gerente"];
        $localizacao = $_POST["localizacao"];
        
        $sql = "UPDATE 
                    DEPARTAMENTO 
                SET 
                    NOME_DEPARTAMENTO ='$nome',
                    ID_GERENTE = $gerente,
                    ID_LOCALIZACAO ='$localizacao'
                WHERE 
                    ID_DEPARTAMENTO='$id'";
        
        $conexao->query($sql);

        // Aqui eu retorno "1" p/ realizar outras funcoes no sistema, como exibir uma msg de sucesso
        echo "1";
    }
?>