<?php

    require_once "conexao.php";

    $cpf = $_POST["cpf"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $prontuario = $_POST["prontuario"];

    $q = "INSERT INTO professor VALUES ('$cpf', '$nome', '$email', '$prontuario')";

    $conexao->query($q) or die(print_r($conexao->errorInfo()));

    echo"<h3>Professor cadastrado com sucesso!!!</h3>";

?>