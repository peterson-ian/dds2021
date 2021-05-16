<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <title>Cadastro de Animais</title>
    </head>
    <body>
    
        <h2>Cadastro de Animais</h2>
        <hr/>
        <a href="index.php">Cadastrar um novo animal</a> |
        <a href="lista.php">Lista de Animais</a> |
        <a href="limpar.php">Limpar Cadastros</a>
        <hr/>
        <form method="POST">
            <?php

                //Exibindo o primeiro formulario de escolha de especie para o formulario de cadastro do aniaml
                if(empty($_POST)){
                    echo'<select name="animal" required>
                        <option label="Selecione a especie do animal..."></option>
                        <option>Leão</option>
                        <option>Rinoceronte</option>
                        <option>Elefante</option>
                        <option>Cavalo</option>
                    </select><br/>';
                }

                //Exibindo o formulario para preenchimento e cadastro do animal de acordo com a especie selecionada no formulario acima
                else if(!empty($_POST["animal"])){
                   $_SESSION["especie"] = $_POST["animal"];
            
                    echo '<input type="number" name="peso" step=".01" min="1"  placeholder="Digite o peso(KG)..." required/><br/>
                    <input type="number" name="altura" step=".01" min="0.10" placeholder="Digite a altura(M)..." max="15" required/><br/>
                    <label for="dataNasc">Data de Nascimento:</label>
                    <input type="date" name="dataNasc" id="dataNasc" required/><br/>
                    <input type="text" name="cor" maxlength="30" placeholder="Digite a cor..." required><br/>
                    <label>Sexo:</label><br/>
                    <input type="radio" name="genero" id="generoM" value="Masculino">
                    <label for="generoM">Masculino</label>
                    <input type="radio" name="genero" id="generoF" value="Feminino">
                    <label for="generoF">Feminino</label><br/>
                    <select name="alimentacao" required>
                        <option label="Selecione o tipo de alimentacao do animal..."></option>
                        <option>Herbívoro</option>
                        <option>Carnívoro</option>
                        <option>Onívoro</option>
                    </select><br/>';

                    if($_POST["animal"] == "Leão"){
                        echo'<input type="number" name="tamanhoJuba" step=".01" min="1" placeholder="Digite o tamanho da juba(CM)..." required/><br/>';
                    }
                    else if($_POST["animal"] == "Elefante"){
                        echo'<input type="number" name="tamanhoTromba" step=".01" min="1" placeholder="Digite o tamanho da tromba(CM)..." required/><br/>';
                    }
                    else if($_POST["animal"] == "Rinoceronte"){
                        echo'<input type="number" name="tamanhoChifre" step=".01" min="1" placeholder="Digite o tamanho da chifre(CM)..." required/><br/>';
                    }
                    else{
                        echo'<input type="text" name="corCrina" maxlength="30" placeholder="Digite a cor da crina..." required/><br/>';
                    }

                }

                //Salvando as informações do animal
                else if(!empty($_POST["peso"])){

                    if($_SESSION["especie"] == "Leão"){
                        
                        require_once "classLeao.php";

                        $a = new Leao();
                        $a->especie = $_SESSION["especie"];
                        $a->peso = $_POST["peso"];
                        $a->altura = $_POST["altura"];
                        $a->dataNasc = $_POST["dataNasc"];
                        $a->cor = $_POST["cor"];
                        $a->genero = $_POST["genero"];
                        $a->alimentacao = $_POST["alimentacao"];
                        $a->tamanhoJuba = $_POST["tamanhoJuba"];
                    }

                    else if($_SESSION["especie"] == "Rinoceronte"){

                        require_once "classRinoceronte.php";

                        $a = new Rinoceronte();
                        $a->especie = $_SESSION["especie"];
                        $a->peso = $_POST["peso"];
                        $a->altura = $_POST["altura"];
                        $a->dataNasc = $_POST["dataNasc"];
                        $a->cor = $_POST["cor"];
                        $a->genero = $_POST["genero"];
                        $a->alimentacao = $_POST["alimentacao"];
                        $a->tamanhoChifre= $_POST["tamanhoChifre"];
                    }

                    else if($_SESSION["especie"] == "Elefante"){

                        require_once "classElefante.php";

                        $a = new Elefante();
                        $a->especie = $_SESSION["especie"];
                        $a->peso = $_POST["peso"];
                        $a->altura = $_POST["altura"];
                        $a->dataNasc = $_POST["dataNasc"];
                        $a->cor = $_POST["cor"];
                        $a->genero = $_POST["genero"];
                        $a->alimentacao = $_POST["alimentacao"];
                        $a->tamanhoTromba= $_POST["tamanhoTromba"];
                    }

                    else if($_SESSION["especie"] == "Cavalo"){

                        require_once "classCavalo.php";

                        $a = new Cavalo();
                        $a->especie = $_SESSION["especie"];
                        $a->peso = $_POST["peso"];
                        $a->altura = $_POST["altura"];
                        $a->dataNasc = $_POST["dataNasc"];
                        $a->cor = $_POST["cor"];
                        $a->genero = $_POST["genero"];
                        $a->alimentacao = $_POST["alimentacao"];
                        $a->corCrina= $_POST["corCrina"];
                    }

                    $_SESSION["animais"][] = $a;
            
                    echo'<h4>Animal cadastrado com sucesso!!!</h4><hr/>';
                    
                }           
                
            ?>
            <input type="submit" value="Enviar"/>
        </form>
    </body>
</html>