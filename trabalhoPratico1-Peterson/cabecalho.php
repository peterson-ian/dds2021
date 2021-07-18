<?php
    // Adciono o arquivo que verifica se o usuario esta logado 
    require_once "verificar_usuario.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="folha_estilo.css" />
        <script src="js/jquery-3.6.0.min.js"></script>
        <title>Sistema de RH</title>
    </head>

    <body>
    <div id="cabecalho">
        <!-- Imagem de logo do Sistema RH -->
        <img id="logo" src="imagem.png" alt="Imagem" title="Sistema de RH">
        <hr/>
        <p>Cadastrar</p>
        <?php
            // Algumas opções do menu aparecem ou nao aparecem pra diferentes usuarios, aqui defino quem pode ver.
            if($_SESSION["perfil"] == "1"){
                echo"
                    <a href='cadastrar_regiao.php'>Região</a> 
                    <a href='cadastrar_pais.php'>País</a> 
                    <a href='cadastrar_localizacao.php'>Localização</a>
                ";
            }
        
            if($_SESSION["perfil"] != "3"){
                echo"<a href='cadastrar_funcao.php'>Função</a>";
            }
    
            if($_SESSION["perfil"] == "1"){
                echo"
                    <a href='cadastrar_departamento.php'>Departamento</a>
                ";
            }
        ?>
        <a href='cadastrar_funcionario.php'>Funcionario</a>

        <hr/>
        
        <p>Listar</p>
        <?php
            if($_SESSION["perfil"] == "1"){
                echo"
                    <a href='listar_regiao.php'>Região</a> 
                    <a href='listar_pais.php'>País</a> 
                ";
            }

            if($_SESSION["perfil"] != "3"){
                echo"<a href='listar_localizacao.php'>Localização</a>";
            }
    
        ?>
        
        <a href='listar_funcao.php'>Função</a>
        <a href='listar_departamento.php'>Departamento</a>
        <a href='listar_funcionario.php'>Funcionario</a>
        <hr/>
        <p><a href='logout.php'>Sair</a></p>
        <hr/>
    </div>