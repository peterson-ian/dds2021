<?php
    // Aqui eu coloco o menu padrao do sistema e ainda verifico se o usuario esta logado;
    require_once "cabecalho.php";

    // Confiro se ele tem permissao de acessar esta funcao de cadastro
    // Se sim ele pode acessar se nao ele exibe uma msg de que ele nao tenho a essa funcao
    if($_SESSION["perfil"] == "1"){
        require_once "classesFormulario/classeFormulario.php";
        require_once "conexao.php";

        // Aqui eu acrescento o link que relaciona o arquivo de js de departamento
        echo'<script src="js/departamento.js"></script>';

        echo"<p id='msg'></p>";

        // Criando um formulario e acrescentando elementos usando a classFormulario p/ cadastrar departamento;
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

        // Por ser chave estrangeira tenho que criar um select onde as opções sao validas 
        // As opçoes sao pegas no proprio BD da tabela do relacionamento
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

        // Por ser chave estrangeira tenho que criar um select onde as opções sao validas 
        // As opçoes sao pegas no proprio BD da tabela do relacionamento
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
    }
    else{
        echo"<p>Você nao tenho acesso a essa função do sistema.</p>";
    }
?>