<?php
    include "cabecalho.php";
    include "classesFormulario/classeFormulario.php";
    include "conexao.php";

    if(!empty($_POST)){        
        $id_pais = $_POST["ID_PAIS"];
        $nome_pais = $_POST["NOME_PAIS"];
        $id_regiao = $_POST["ID_REGIAO"];
        $sql = "INSERT INTO PAIS VALUES('$id_pais','$nome_pais','$id_regiao')";
        $conexao->query($sql);
        echo "<span class='ok'>País inserido com sucesso</span><br />";
    }

    $v["method"]="post";
    $v["action"]="#";
    $v["titulo"]="Cadastro de País";

    $f = new Formulario($v);

    $v = null;
    $v["type"]="text";
    $v["name"]="ID_PAIS";
    $v["placeholder"]="Digite a sigla do país...";
    $v["id"]="silga_pais_id";
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
    $ol["label_select"] = "::Selecione a Região::";

    $sql = "SELECT * FROM REGIAO ORDER BY NOME_REGIAO";
    $resultado = $conexao->query($sql) or die("O sistema não está respondendo. Avise o administrador.");

   
    foreach($resultado as $i=>$t){
        $options[$i]["value"]=$t["ID_REGIAO"];
        $options[$i]["label_option"]=$t["NOME_REGIAO"];        
    }
    
    $s = new Select($v,$ol,$options);
    $f->adiciona_elemento($s);

    $v = null;
    $v["type"]="submit";    
    $v["name"]="input";    
    $v["value"]="Enviar";
    $i = new Input($v);

    $f->adiciona_elemento($i);
    
    $f->exibir();
?>