<?php
    // Aqui eu coloco o menu padrao do sistema e ainda verifico se o usuario esta logado;
    require_once "cabecalho.php";

    // Confiro se ele tem permissao de acessar esta funcao de cadastro
    // Se sim ele pode acessar se nao ele exibe uma msg de que ele nao tenho a essa funcao
    if($_SESSION["perfil"] == "1"){
        require_once "classesFormulario/classeFormulario.php";

        // Aqui eu acrescento o link que relaciona o arquivo de js de regiao
        echo'<script src="js/regiao.js"></script>';

        echo"<p id='msg'></p>";

        // Criando um formulario e acrescentando elementos usando a classFormulario p/ cadastrar regiao
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
    }
    else{
        echo"<p>Você nao tenho acesso a essa função do sistema.</p>";
    }
?>