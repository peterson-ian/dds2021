<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8"/>
        <title>Exercicio Pratico - 01</title>
        <style>
            input, select, option{
                width: 200px;
                height: 20px;
            }

            input[type="number"], input[type="text"]{
                max-width: 192px;
            }
        </style>
    </head>
    <body>
        <h2>Bem vindo ao IFSPET</h2>
        <hr>
        <?php
            if(!empty($_POST)){
                $especie = $_POST["especie"];
                $nome = $_POST["nome"];
                $peso = $_POST["peso"];
                $idade = $_POST["idade"]; 
                
                echo "<p><strong>Informações do PET cadastrado:</strong></p>
                    <br>
                    <p><strong>Espécie animal: </strong> $especie</p>
                    <p><strong>Nome: </strong>$nome</p>
                    <p><strong>Peso: </strong>$peso</p>
                    <p><strong>Idade: </strong>$idade</p>
                    <hr>
                ";
            }
        ?>
        <p>Preencha as informações do seu PET:</p>
        <form method="POST">
            <select name="especie" required>
                <option value="" disabled selected >::selecione uma espécie::</option>
                <option value="Cachorro">Cachorro</option>
                <option value="Coelho">Coelho</option>
                <option value="Gato">Gato</option>
                <option value="Tartaruga">Tartaruga</option>
            </select>
            <br><br>
            <input type="text" name="nome" maxlength="100" placeholder="Nome do animal..." required>
            <br><br>
            <input type="number" name="peso" step=".01" placeholder="Peso do animal em kg..." required>
            <br><br>
            <input type="number" name="idade" placeholder="Idade do animal em anos..." required>
            <br><br>
            <input type="submit" value="Enviar">
        </form>
    </body>
</html>