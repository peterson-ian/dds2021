<?php
    include "conexao.php";

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $gerente = $_POST["gerente"];
    $localizacao = $_POST["localizacao"];
   
    $sql = "UPDATE 
                DEPARTAMENTO 
            SET 
                NOME_DEPARTAMENTO ='$nome',
                ID_GERENTE = $gerente,
                ID_LOCALIZACAO ='$localizacao'
            WHERE 
                ID_DEPARTAMENTO='$id'";
    
    $conexao->query($sql);
    
    echo "1";
?>