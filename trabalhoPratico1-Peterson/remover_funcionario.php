<?php
    // Aqui eu verifico se o usuario esta logado;
    require_once "verificar_usuario.php";
    
    require_once "conexao.php";

    // Aqui eu recebo e removo os dados
    $id = $_POST['id'];
    $sql = "DELETE FROM FUNCIONARIO WHERE ID_FUNCIONARIO = '$id'";
    $conexao->query($sql);
    
    // Aqui eu retorno "1" p/ realizar outras funcoes no sistema, como exibir uma msg de sucesso
    echo"1";
?>