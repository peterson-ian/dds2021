<?php
    include "menu.php";
    include "conexao.php"; 

    $cpf = $_POST["cpf"];
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];
    $sexo = $_POST["sexo"];
    $data_nasc = $_POST["data_nasc"];
    $email = $_POST["email"];

    
    $sql = "INSERT INTO cliente VALUES(
        '$cpf',
        '$nome',
        '$telefone',
        '$endereco',
        '$sexo', 
        '$data_nasc', 
        '$email'
    )";

    $conexao->query($sql) or die(print_r($conexao->errorInfo()));
    echo "Cliente inserido com sucesso.";
?>