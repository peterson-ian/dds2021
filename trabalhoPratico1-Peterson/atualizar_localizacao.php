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
        $endereco = $_POST["endereco"];
        $cep = $_POST["cep"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $pais = $_POST["pais"];
            
        $sql = "UPDATE 
                    LOCALIZACAO 
                SET 
                    ENDERECO='$endereco', CEP='$cep', CIDADE='$cidade', ESTADO='$estado' , ID_PAIS='$pais'
                WHERE 
                    ID_LOCALIZACAO='$id'";
        
        $conexao->query($sql);
        
        // Aqui eu retorno "1" p/ realizar outras funcoes no sistema, como exibir uma msg de sucesso
        echo "1";
    }
?>