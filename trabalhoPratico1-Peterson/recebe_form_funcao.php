<?php
    require_once "conexao.php";

    $sigla = $_POST["sigla"];
    $titulo = $_POST["titulo"];
    $salario_min = $_POST["salario_min"];
    $salario_max = $_POST["salario_max"];

    $sql = "INSERT INTO FUNCAO VALUES ('$sigla', '$titulo', '$salario_min', '$salario_max')";
    $conexao->query($sql);
    echo "1";
?>