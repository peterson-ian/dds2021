<?php
    require_once "conexao.php";

    $endereco = $_POST["endereco"];
    $cep = $_POST["cep"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $pais = $_POST["pais"];

    $sql = "INSERT INTO LOCALIZACAO VALUES (NULL, '$endereco', '$cep', '$cidade', '$estado', '$pais');";
    $conexao->query($sql) or die($conexao->errorInfo());
    echo "1";
?>