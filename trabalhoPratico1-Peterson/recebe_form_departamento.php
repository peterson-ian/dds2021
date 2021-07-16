<?php
    require_once "conexao.php";

    $nome = $_POST["nome"];
    if($_POST["gerente"] == '-1')
        $id_gerente = 'NULL';
    else 
        $id_gerente = $_POST["gerente"];
    $id_localizacao = $_POST["localizacao"];

    $sql = "INSERT INTO DEPARTAMENTO VALUES (NULL, '$nome', $id_gerente, '$id_localizacao')";
    $conexao->query($sql) or die($conexao->errorInfo());
    echo "1";
?>