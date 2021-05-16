<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <title>Lista de Animais Cadastrados</title>
    </head>
    <body>
        <h2>Lista de Animais Cadastrados</h2>
        <hr/>
        <a href="index.php">Cadastrar um novo animal</a> |
        <a href="lista.php">Lista de Animais</a> |
        <a href="limpar.php">Limpar Cadastros</a>
        <hr/>
        <?php
            require_once "classLeao.php";
            require_once "classRinoceronte.php";
            require_once "classElefante.php";
            require_once "classCavalo.php";

            session_start();

            //Exibindo as informações por meio de funções criadas nas classes
            if(!empty($_SESSION["animais"])){
                foreach($_SESSION["animais"] as $i=>$v){
                    $v->exibirDados();
                }
            }
            else{
                echo '<h4>Ainda não há animal cadastrado</h4>';
            }
        ?>
    </body>
</html>