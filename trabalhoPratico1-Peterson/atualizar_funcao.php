<?php
    // Aqui eu verifico se o usuario esta logado;
    require_once "verificar_usuario.php";

    // Confiro se o usuario tem a permissao de atualizar, se tiver ele consegue se nao ele é redirecionado
    if($_SESSION["perfil"] == "3"){
        header("location:index.php");
    }
    else{
        require_once "conexao.php";

        // Aqui eu recebo e atualizo os dados
        $id = $_POST["id"];
        $sigla = $_POST["sigla_funcao"];
        $titulo = $_POST["titulo"];
        $salario_max = $_POST["salario_max"];
        $salario_min = $_POST["salario_min"];
            
        $sql = "UPDATE 
                    FUNCAO 
                SET 
                    ID_FUNCAO='$sigla', TITULO_FUNCAO='$titulo', SALARIO_MINIMO='$salario_min', SALARIO_MAXIMO='$salario_max' 
                WHERE 
                    ID_FUNCAO='$id'";
        
        $conexao->query($sql);
        
        // Aqui eu retorno "1" p/ realizar outras funcoes no sistema, como exibir uma msg de sucesso
        echo "1";
    }
?>