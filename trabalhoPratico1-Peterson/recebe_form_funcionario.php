<?php
    // Aqui eu verifico se o usuario esta logado;
    require_once "verificar_usuario.php";
    require_once 'conexao.php';

    // Aqui eu recebo e insiro os dados
    $nome = $_POST["primeiro_nome"];
    $sobrenome = $_POST["sobrenome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $data_contratacao = $_POST["data_contratacao"];
    $id_funcao = $_POST["funcao"];
    $salario = $_POST["salario"];
    $comissao = $_POST["comissao"];
    if($_POST["gerente"] == '-1')
        $id_gerente = 'NULL';
    else 
        $id_gerente = $_POST["gerente"];
    $id_departamento = $_POST["departamento"];
    
    $sql = "INSERT INTO 
                FUNCIONARIO 
            VALUES 
                (NULL, '$nome', '$sobrenome', '$email', 
                    '$telefone', '$data_contratacao', '$id_funcao', 
                    '$salario', '$comissao', $id_gerente, '$id_departamento');";
    $conexao->query($sql);

    // Aqui eu retorno "1" p/ realizar outras funcoes no sistema, como exibir uma msg de sucesso
    echo "1";    
?>