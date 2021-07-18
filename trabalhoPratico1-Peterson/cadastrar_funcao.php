<?php
    // Aqui eu coloco o menu padrao do sistema e ainda verifico se o usuario esta logado;
    require_once "cabecalho.php";

    // Confiro se ele tem permissao de acessar esta funcao de cadastro
    // Se sim ele pode acessar se nao ele exibe uma msg de que ele nao tenho a essa funcao
    if($_SESSION["perfil"] != "3"){
        require_once "classesFormulario/classeFormulario.php";

        // Aqui eu acrescento o link que relaciona o arquivo de js de funcao
        echo'<script src="js/funcao.js"></script>';

        echo"<p id='msg'></p>";

        // Criando um formulario e acrescentando elementos usando a classFormulario p/ cadastrar funcao
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
    }
    else{
        echo"<p>Você nao tenho acesso a essa função do sistema.</p>";
    }
?>