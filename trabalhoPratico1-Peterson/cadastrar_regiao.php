<?php
    include "cabecalho.php";
    include "classesFormulario/classeFormulario.php";
    echo'<script src="js/regiao.js"></script>';

    echo"<p id='msg'></p>";

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
    $v["type"]="button";    
    $v["name"]="cadastrar-regiao";  
    $v["id"]="cadastrar-regiao";     
    $v["value"]="Cadastrar";
    $i = new Input($v);

    $f->adiciona_elemento($i);
    
    $f->exibir();
?>