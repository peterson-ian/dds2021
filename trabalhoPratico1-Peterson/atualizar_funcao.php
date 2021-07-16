<?php
    include "conexao.php";

    $id = $_POST["id"];
    $sigla = $_POST["sigla_funcao"];
    $titulo = $_POST["titulo"];
    $salario_max = $_POST["salario_max"];
    $salario_min = $_POST["salario_min"];
        
    $sql = "UPDATE 
                FUNCAO 
            SET 
                ID_FUNCAO='$sigla', TITULO_FUNCAO='$titulo', SALARIO_MINIMO='$salario_min', SALARIO_MAXIMO='$salario_max' 
            WHERE 
                ID_FUNCAO='$id'";
    
    $conexao->query($sql);
    
    echo "1";
?>