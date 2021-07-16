<?php
    include "cabecalho.php";
    include "classesFormulario/classeFormulario.php";

    echo'<script src="js/funcao.js"></script>';

    echo"<p id='msg'></p>";

    $v["method"] = "POST";
    $v["action"] = "#";
    $v["titulo"] = "Cadastro de Função";

    $f = new Formulario($v);

    $v = null;
    $v["type"] = "text";
    $v["name"] = "id_funcao";
    $v["placeholder"] = "Digite a sigla da função...";
    $v["id"] = "id_funcao";
    $v["class"]="formulario input";
    $i = new Input($v);    

    $f->adiciona_elemento($i);

    $v = null;
    $v["type"] = "text";
    $v["name"] = "titulo";
    $v["placeholder"] = "Digite o titulo da função...";
    $v["id"] = "titulo_funcao";
    $v["class"]="formulario input";
    $i = new Input($v);    

    $f->adiciona_elemento($i);

    $v = null;
    $v["type"] = "number";
    $v["step"] = ".01";
    $v["name"] = "salario_min";
    $v["placeholder"] = "Digite o salario mínimo da função...";
    $v["id"] = "salario_min_funcao";
    $v["class"]="formulario input";
    $i = new Input($v);    

    $f->adiciona_elemento($i);

    $v = null;
    $v["type"] = "number";
    $v["step"] = ".01";
    $v["name"] = "salario_max";
    $v["placeholder"] = "Digite o salario maxímo da função...";
    $v["id"] = "salario_max_funcao";
    $v["class"]="formulario input";
    $i = new Input($v);    

    $f->adiciona_elemento($i);

    $v = null;
    $v["type"]="button";    
    $v["name"]="cadastrar-funcao"; 
    $v["id"]="cadastrar-funcao";    
    $v["value"]="Cadastrar";
    $i = new Input($v);

    $f->adiciona_elemento($i);
    
    $f->exibir();
?>
