<?php
    // Aqui eu coloco o menu padrao do sistema e ainda verifico se o usuario esta logado;
    require_once "cabecalho.php";

    // Confiro se o usuario tem a permissao, se tiver ele consegue se nao uma msg avisa que ele nao tem acesso
    if($_SESSION["perfil"] == "1"){
        require_once "conexao.php";
        require_once "classeTabela/tabela.php";

        // Aqui eu acrescento o link que relaciona o arquivo de js de pais
        echo'<script src="js/pais.js"></script>';

        // Realizo a consulta no BD e pego as informações que ele retorna e exibo em uma tabela
        $sql = "SELECT ID_PAIS, NOME_PAIS, NOME_REGIAO FROM PAIS 
                                                INNER JOIN 
                                            REGIAO ON PAIS.ID_REGIAO = REGIAO.ID_REGIAO
                                        ORDER BY NOME_PAIS";
        
        $resultado = $conexao->query($sql);
        
        // Alguns parametros que tenho que passar pra classe tabela
        $tabela = 'PAIS';
        $cabecalho = ['SIGLA', 'NOME', 'REGIAO'];

        // Verifico se há tuplas na tabela se houver ele cria a tabela 
        // Se nao ele exibe uma msg avisando que nao há paises cadastrados
        if($resultado->rowCount()>0){
            // Crio a tabela usando a clase tabela
            $r = new Tabela($tabela, $cabecalho, $resultado);
            // Chamo o metodo exibir que faz toda a estrutura p/ exibir
            $r->exibir();
        }
        else{
            echo "Não há paises cadastrados.";
        }
    }
    else{
        echo"<p>Você nao tenho acesso a essa função do sistema.</p>";
    }
?>