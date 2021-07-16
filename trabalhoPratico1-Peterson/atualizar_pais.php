<?php
    include "conexao.php";

    $id = $_POST["id"];
    $sigla = $_POST["sigla"];
    $nome = $_POST["nome"];
    $regiao = $_POST["regiao"];
        
    $sql = "UPDATE PAIS SET ID_PAIS='$sigla', NOME_PAIS='$nome', ID_REGIAO = '$regiao' WHERE ID_PAIS='$id'";
    
    $conexao->query($sql);
    
    echo "1";
?>