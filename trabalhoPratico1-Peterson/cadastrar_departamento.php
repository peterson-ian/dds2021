<?php
    include "cabecalho.php";
    include "classesFormulario/classeFormulario.php";
    include "conexao.php";

    echo'<script src="js/departamento.js"></script>';

    echo"<p id='msg'></p>";

    $v["method"] = "POST";
    $v["action"] = "#";
    $v["titulo"] = "Cadastro de Departamento";

    $f = new Formulario($v);

    $v = null;
    $v["type"] = "text";
    $v["name"] = "nome";
    $v["placeholder"] = "Digite o nome do departamento...";
    $v["id"] = "nome_departamento";
    $v["class"]="formulario input";
    $i = new Input($v);    

    $f->adiciona_elemento($i);


    $v = null;
    $v["name"] = "id_gerente";
    $v["id"] = "id_gerente_departamento";
    $ol["label_select"] = "::Selecione o Gerente::";

    $sql = "SELECT ID_FUNCIONARIO, CONCAT(NOME, ' ', SOBRENOME) AS NOME_COMPLETO FROM FUNCIONARIO ORDER BY NOME;";
    $resultado = $conexao->query($sql) or die("O sistema não está respondendo. Avise o administrador.");

    foreach($resultado as $i=>$t){
        $options[$i]["value"] = $t["ID_FUNCIONARIO"];
        $options[$i]["label_option"] = $t["NOME_COMPLETO"];
    }

    $i = new Select($v, $ol, $options);

    $f->adiciona_elemento($i);

    $v = null;
    $ol =  null;
    $options = null;
    $v["name"] = "id_localizacao";
    $v["id"] = "localizacao_departamento";
    $ol["label_select"] = "::Selecione a Localização::";

    $sql = "SELECT ID_LOCALIZACAO, CONCAT(ENDERECO , ' - ', CIDADE, ', ', ID_PAIS ) AS LOC  FROM LOCALIZACAO ORDER BY ID_LOCALIZACAO;";
    $resultado = $conexao->query($sql) or die("O sistema não está respondendo. Avise o administrador.");

    foreach($resultado as $i=>$t){
        $options[$i]["value"] = $t["ID_LOCALIZACAO"];
        $options[$i]["label_option"] = $t["LOC"];
    }

    $i = new Select($v, $ol, $options); 

    $f->adiciona_elemento($i);

    $v = null;
    $v["type"]="button";    
    $v["name"]="cadastrar-departamento";
    $v["id"]="cadastrar-departamento";  
    $v["value"]="Cadastrar";
    $i = new Input($v);

    $f->adiciona_elemento($i);

    $f->exibir();

?>