<?php
    // Aqui eu verifico se o usuario esta logado;
    require_once "verificar_usuario.php";
    require_once "conexao.php";

    // Aqui eu recebo e atualizo os dados
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
    
    // Aqui eu retorno "1" p/ realizar outras funcoes no sistema, como exibir uma msg de sucesso    
    echo "1";
?>