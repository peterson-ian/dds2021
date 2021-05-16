<?php

    require_once "conexao.php";

    $nome = $_POST["nome"];
    $codigo = $_POST["codigo"];
    $curso = $_POST["curso"];
    $professor = $_POST["professor"];

    $q = "INSERT INTO disciplina VALUES ('$nome', '$codigo', '$curso', '$professor')";

    $conexao->query($q) or die(print_r($conexao->errorInfo()));

    echo"<h3>Disciplina cadastrado com sucesso!!!</h3>";

?>