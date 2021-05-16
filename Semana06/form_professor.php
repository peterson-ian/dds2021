<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8"/>
        <title>Cadastro de Professor</title>
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
        <h1>Cadastro de Professor</h1>
        <hr/>
        <form method="POST" action="recebe_form_professor.php">
            <input type="text" name="nome" placeholder="Digite o nome do professor" required/><br/>
            <input type="text" name="cpf" placeholder="Digite o cpf do professor" required/><br/>
            <input type="text" name="email" placeholder="Digite o email do professor" required/><br/>
            <input type="text" name="prontuario" placeholder="Digite o prontuario do professor" required/><br/>
            <input type="reset" value="Limpar"/>
            <input type="submit" value="Enviar"/>
        </form>
    </body>
</html>