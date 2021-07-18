<?php
    // Aqui eu coloco o menu padrao do sistema e ainda verifico se o usuario esta logado;
    include "cabecalho.php";

    // Confiro se ele tem permissao de acessar esta funcao de cadastro
    // Se sim ele pode acessar se nao ele exibe uma msg de que ele nao tenho a essa funcao
    if($_SESSION["perfil"] == "1"){
        include "classesFormulario/classeFormulario.php";
        include "conexao.php";

        // Aqui eu acrescento o link que relaciona o arquivo de js de pais
        echo'<script src="js/pais.js"></script>';

        echo"<p id='msg'></p>";

        $v["method"]="post";
        $v["action"]="#";
        $v["titulo"]="Cadastro de País";

        $f = new Formulario($v);

        $v = null;
        $v["type"]="text";
        $v["name"]="ID_PAIS";
        $v["placeholder"]="Digite a sigla do país...";
        $v["id"]="sigla_pais_id";
        $v["class"]="formulario input";
        $i = new Input($v);    

        $f->adiciona_elemento($i);

        $v = null;
        $v["type"]="text";
        $v["name"]="NOME_PAIS";
        $v["placeholder"]="Digite o nome do país...";
        $v["id"]="nome_pais_id";
        $v["class"]="formulario input";
        $i = new Input($v);    

        $f->adiciona_elemento($i);

        $v = null;
        $v["name"]="ID_REGIAO";
        $v["id"]="regiao_pais_id";
        $ol["label_select"] = "::Selecione a Região::";

        // Por ser chave estrangeira tenho que criar um select onde as opções sao validas 
        // As opçoes sao pegas no proprio BD da tabela do relacionamento
        $sql = "SELECT * FROM REGIAO ORDER BY NOME_REGIAO";
        $resultado = $conexao->query($sql) or die("O sistema não está respondendo. Avise o administrador.");

    
        foreach($resultado as $i=>$t){
            $options[$i]["value"]=$t["ID_REGIAO"];
            $options[$i]["label_option"]=$t["NOME_REGIAO"];        
        }
        
        $s = new Select($v,$ol,$options);
        $f->adiciona_elemento($s);

        $v = null;
        $v["type"]="button";    
        $v["name"]="cadastrar-pais";
        $v["id"]="cadastrar-pais";     
        $v["value"]="Cadastrar";
        $i = new Input($v);

        $f->adiciona_elemento($i);
        
        $f->exibir();
    }
    else{
        echo"<p>Você nao tenho acesso a essa função do sistema.</p>";
    }
?>