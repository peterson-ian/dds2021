<?php
    // Aqui eu coloco o menu padrao do sistema e ainda verifico se o usuario esta logado;
    require_once "cabecalho.php";

    // Confiro se ele tem permissao de acessar esta funcao de cadastro
    // Se sim ele pode acessar se nao ele exibe uma msg de que ele nao tenho a essa funcao
    if($_SESSION["perfil"] == "1"){
        require_once "classesFormulario/classeFormulario.php";
        require_once "conexao.php";

        // Aqui eu acrescento o link que relaciona o arquivo de js de localizacao
        echo'<script src="js/localizacao.js"></script>';

        echo"<p id='msg'></p>";

        // Criando um formulario e acrescentando elementos usando a classFormulario p/ cadastrar localizacao
        $v["method"] = "POST";
        $v["action"] = "#";
        $v["titulo"] = "Cadastro de Localização";

        $f = new Formulario($v);

        $v = null;
        $v["type"] = "text";
        $v["name"] = "endereco";
        $v["placeholder"] = "Digite o endereço...";
        $v["id"] = "endereco_localizacao";
        $v["class"]="formulario input";
        $i = new Input($v);    

        $f->adiciona_elemento($i);

        $v = null;
        $v["type"] = "number";
        $v["name"] = "cep";
        $v["step"] = "1";
        $v["placeholder"] = "Digite o cep...";
        $v["id"] = "cep_localizacao";
        $v["class"]="formulario input";
        $i = new Input($v);    

        $f->adiciona_elemento($i);

        $v = null;
        $v["type"] = "text";
        $v["name"] = "cidade";
        $v["placeholder"] = "Digite a cidade...";
        $v["id"] = "cidade_localizacao";
        $v["class"]="formulario input";
        $i = new Input($v);    

        $f->adiciona_elemento($i);

        $v = null;
        $v["type"] = "text";
        $v["name"] = "estado";
        $v["placeholder"] = "Digite o estado...";
        $v["id"] = "estado_localizacao";
        $v["class"]="formulario input";
        $i = new Input($v);    

        $f->adiciona_elemento($i);

        $v = null;
        $v["name"] = "pais";
        $v["id"] = "pais_localizacao";
        $ol["label_select"] = "::Selecione o Pais::";

        // Por ser chave estrangeira tenho que criar um select onde as opções sao validas 
        // As opçoes sao pegas no proprio BD da tabela do relacionamento
        $sql = "SELECT * FROM PAIS ORDER BY NOME_PAIS;";
        $resultado = $conexao->query($sql) or die("O sistema não está respondendo. Avise o administrador.");

        foreach($resultado as $i=>$t){
            $options[$i]["value"] = $t["ID_PAIS"];
            $options[$i]["label_option"] = $t["NOME_PAIS"];
        }


        $i = new Select($v, $ol, $options);    

        $f->adiciona_elemento($i);

        $v = null;
        $v["type"]="button";    
        $v["name"]="cadastrar-localizacao";    
        $v["value"]="Cadastrar";
        $v["id"] = "cadastrar-localizacao";
        $i = new Input($v);

        $f->adiciona_elemento($i);

        $f->exibir();
    }
    else{
        echo"<p>Você nao tenho acesso a essa função do sistema.</p>";
    }
    
?>