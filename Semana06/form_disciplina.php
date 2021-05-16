<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8"/>
        <title>Cadastro de Discplina</title>
        <style>
            *{
                box-sizing: border-box;
            }
            input{
                width: 350px;
                height: 25px;
                margin: 5px;
            }
            input[type="reset"], input[type="submit"]{
                width: 168px;
            }
        </style>
    </head>
    <body>
        <h1>Cadastro de Discplina</h1>
        <hr/>
        <form method="POST" action="recebe_form_disciplina.php">
            <input type="text" name="nome" placeholder="Digite o nome da discplina" required/><br/>
            <input type="text" name="codigo" placeholder="Digite o codigo da discplina" required/><br/>
            <input type="text" name="curso" placeholder="Digite o curso da discplina" required/><br/>
            <input type="text" name="professor" placeholder="Digite o professor da discplina" required/><br/>
            <input type="reset" value="Limpar"/>
            <input type="submit" value="Enviar"/>
        </form>
    </body>
</html>