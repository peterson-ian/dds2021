<?php
    require_once "conexao.php";

    // Recebo os dados do formulario de login e faço um consulta no BD
    $user = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM usuarios WHERE email='$user' AND senha='$senha';";
    $resultado = $conexao->query($sql);

    // Se encontrar um usuario no BD ele realiza oque esta no if
    // se nao ele redireciona p/ o login
    if($resultado->rowCount() == '1'){
        // Percorre o resultado da consulta 
        foreach($resultado as $i=>$t){
            // Pega o id_usuario e o perfil
            $id_usuario = $t["id_usuario"];
            $perfil = $t["perfil"];
        }
        // inicia a sessao
        session_start();
        // Salva o id_usaurio e o perfil do usuario na sessao
        $_SESSION["autorizado"] = $id_usuario;
        $_SESSION["perfil"] = $perfil;
        // Apos isso ele redireciona para o index, que é a home do sistema
        header("location: index.php");
    }
    else{
        // Retorna com um dado erro com o metodo GET, que no arquivo login entendera e exibira uma msg de erro
        header("location: login.php?erro=1");
    }
?>