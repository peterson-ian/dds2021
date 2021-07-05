<?php
    include "cabecalho.php";
    include "classesFormulario/classeFormulario.php";


    if(!empty($_POST)){
        include "conexao.php";
        $nome_regiao = $_POST["NOME_REGIAO"];
        $sql = "INSERT INTO REGIAO VALUES(NULL,'$nome_regiao')";
        $conexao->query($sql) or die($conexao->errorInfo());
        echo "<span class='ok'>Região inserida com sucesso</span><br />";
    }

    $v["method"]="post";
    $v["action"]="#";
    $v["titulo"]="Cadastro de Região";

    $f = new Formulario($v);

    $v = null;
    $v["type"]="text";
    $v["name"]="NOME_REGIAO";
    $v["placeholder"]="Digite o nome da região...";
    $v["id"]="nome_regiao_id";
    $v["class"]="formulario input";
    $i = new Input($v);    

    $f->adiciona_elemento($i);

    $v = null;
    $v["type"]="submit";    
    $v["name"]="input";    
    $v["value"]="Enviar";
    $i = new Input($v);

    $f->adiciona_elemento($i);
    
    $f->exibir();
?>