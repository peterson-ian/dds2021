<?php
    include "cabecalho.php";
    include "classesFormulario/classeFormulario.php";

    if(!empty($_POST)){
        include "conexao.php";
        $id_funcao = $_POST["id_funcao"];
        $titulo = $_POST["titulo"];
        $salario_min = $_POST["salario_min"];
        $salario_max = $_POST["salario_max"];

        $sql = "INSERT INTO FUNCAO VALUES (' $id_funcao', '$titulo', '$salario_min', '$salario_max')";
        $conexao->query($sql) or die($conexao->errorInfo());
        echo "<span class='ok'>Função inserida com sucesso</span><br />";
    }

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
    $v["type"]="submit";    
    $v["name"]="input";    
    $v["value"]="Enviar";
    $i = new Input($v);

    $f->adiciona_elemento($i);
    
    $f->exibir();
?>
