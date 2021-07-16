<?php
    require_once "conexao.php";
    
    $nome_regiao = $_POST["regiao"];
    $sql = "INSERT INTO REGIAO VALUES(NULL,'$nome_regiao')";
    $conexao->query($sql) or die($conexao->errorInfo());
    echo'1';
?>