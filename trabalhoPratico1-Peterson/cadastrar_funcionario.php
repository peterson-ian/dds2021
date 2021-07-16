<?php
    include "cabecalho.php";
    include "classesFormulario/classeFormulario.php";
    include "conexao.php";

    echo'<script src="js/funcionario.js"></script>';

    echo"<p id='msg'></p>";

    $v["method"] = "POST";
    $v["action"] = "#";
    $v["titulo"] = 'Cadastrar Funcionario';

    $f = new Formulario($v);

    $v = null;
    $v["type"] = "text";
    $v["placeholder"] = "Digite o primeiro do nome funcionario...";
    $v["name"] = "nome";
    $v["id"] = "nome_funcionario";
    $v["class"]="formulario input";
    $i = new Input($v);    

    $f->adiciona_elemento($i);

    $v = null;
    $v["type"] = "text";
    $v["placeholder"] = "Digite o sobrenome do funcionario...";
    $v["name"] = "sobrenome";
    $v["id"] = "sobrenome_funcionario";
    $v["class"]="formulario input";
    $i = new Input($v);    

    $f->adiciona_elemento($i);

    $v = null;
    $v["type"] = "text";
    $v["placeholder"] = "Digite o email do funcionario...";
    $v["name"] = "email";
    $v["id"] = "email_funcionario";
    $v["class"]="formulario input";
    $i = new Input($v);    

    $f->adiciona_elemento($i);

    $v = null;
    $v["type"] = "text";
    $v["placeholder"] = "Digite o telefone do funcionario...";
    $v["name"] = "telefone";
    $v["id"] = "telefone_funcionario";
    $v["class"]="formulario input";
    $i = new Input($v);    

    $f->adiciona_elemento($i);

    $v = null;
    $v["type"] = "date";
    $v["name"] = "data_contratacao";
    $v["id"] = "data_contratacao_funcionario";
    $v["class"]="formulario input";
    $i = new Input($v);    

    $f->adiciona_elemento($i);

    $v = null;
    $v["name"] = "id_funcao";
    $v["id"] = "id_funcao_funcionario";
    $ol["label_select"] = "::Selecione a Função::";

    $sql = "SELECT * FROM FUNCAO ORDER BY TITULO_FUNCAO;";
    $resultado = $conexao->query($sql) or die("O sistema não está respondendo. Avise o administrador.");

    foreach($resultado as $i=>$t){
        $options[$i]["value"] = $t["ID_FUNCAO"];
        $options[$i]["label_option"] = $t["TITULO_FUNCAO"];
    }

    $i = new Select($v, $ol, $options);    

    $f->adiciona_elemento($i);

    $v = null;
    $v["type"] = "number";
    $v["step"] = ".01";
    $v["name"] = "salario";
    $v["placeholder"] = "Digite o salario do funcionario...";
    $v["id"] = "salario_funcionario";
    $v["class"]="formulario input";
    $i = new Input($v);    

    $f->adiciona_elemento($i);

    $v = null;
    $v["type"] = "number";
    $v["step"] = ".01";
    $v["name"] = "comissao";
    $v["placeholder"] = "Digite a comissão do funcionario(%)...";
    $v["id"] = "comissao_funcionario";
    $v["class"]="formulario input";
    $i = new Input($v);    

    $f->adiciona_elemento($i);

    $v = null;
    $ol =  null;
    $options = null;
    $v["name"] = "id_gerente";
    $v["id"] = "id_gerente_funcionario";
    $ol["label_select"] = "::Selecione o Gerente::";

    $sql = "SELECT ID_FUNCIONARIO, CONCAT(NOME, ' ', SOBRENOME) AS NOME_COMPLETO FROM FUNCIONARIO;";
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
    $v["name"] = "id_departamento";
    $v["id"] = "id_departamento_funcionario";
    $ol["label_select"] = "::Selecione o Departamento::";

    $sql = "SELECT * FROM DEPARTAMENTO ORDER BY NOME_DEPARTAMENTO;";
    $resultado = $conexao->query($sql) or die("O sistema não está respondendo. Avise o administrador.");

    foreach($resultado as $i=>$t){
        $options[$i]["value"] = $t["ID_DEPARTAMENTO"];
        $options[$i]["label_option"] = $t["NOME_DEPARTAMENTO"];
    }

    $i = new Select($v, $ol, $options);    

    $f->adiciona_elemento($i);

    $v = null;
    $v["type"]="button";    
    $v["name"]="cadastrar-funcionario";
    $v["id"]="cadastrar-funcionario"; 
    $v["value"]="Cadastrar";
    $i = new Input($v);

    $f->adiciona_elemento($i);

    $f->exibir();
?>