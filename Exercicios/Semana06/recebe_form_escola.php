<?php

    require_once "conexao.php";

    $nome = $_POST["nome"];
    $cnpj = $_POST["cnpj"];
    $endereco = $_POST["endereco"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];

    $q = "INSERT INTO escola VALUES ('$nome', '$cnpj', '$endereco', '$cidade', '$estado')";

    $conexao->query($q) or die(print_r($conexao->errorInfo()));

    echo"<h3>Escola cadastrada com sucesso!!!</h3>";

?>