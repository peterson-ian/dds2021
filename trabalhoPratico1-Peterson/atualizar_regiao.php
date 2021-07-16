<?php
    include "conexao.php";

    $id = $_POST["id"];
    $nome = $_POST["nome"];
   
    $sql = "UPDATE 
                REGIAO 
            SET 
                NOME_REGIAO ='$nome'
            WHERE 
                ID_REGIAO='$id'";
    
    $conexao->query($sql);
    
    echo "1";
?>