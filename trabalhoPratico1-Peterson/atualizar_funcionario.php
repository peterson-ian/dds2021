<?php
    include "conexao.php";

    $id = $_POST["id"];
    $nome = $_POST["primeiro_nome"];
    $sobrenome = $_POST["sobrenome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $data_contratacao = $_POST["data_contratacao"];
    $funcao = $_POST["funcao"];
    $salario = $_POST["salario"];
    $comissao = $_POST["comissao"];
    $gerente = $_POST["gerente"];
    $departamento = $_POST["departamento"];
   
    $sql = "UPDATE 
                FUNCIONARIO 
            SET 
                NOME ='$nome', SOBRENOME='$sobrenome', EMAIL='$email', TELEFONE='$telefone', 
                DATA_CONTRATACAO='$data_contratacao', ID_FUNCAO = '$funcao', SALARIO='$salario', 
                COMISSAO='$comissao', ID_GERENTE = $gerente, ID_DEPARTAMENTO = '$departamento'
            WHERE 
                ID_FUNCIONARIO='$id'";
    
    $conexao->query($sql);
    
    echo "1";
?>