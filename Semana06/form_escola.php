<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8"/>
        <title>Cadastro de Escola</title>
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
        <h1>Cadastro de Escola</h1>
        <hr/>
        <form method="POST" action="recebe_form_escola.php">
            <input type="text" name="nome" placeholder="Digite o nome da escola" required/><br/>
            <input type="text" name="cnpj" placeholder="Digite o cnpj da escola" required/><br/>
            <input type="text" name="endereco" placeholder="Digite o endereco da escola" required/><br/>
            <input type="text" name="cidade" placeholder="Digite a cidade da escola" required/><br/>
            <input type="text" name="estado" placeholder="Digite a sigla do estado da escola (ex: SP)" required/><br/>
            <input type="reset" value="Limpar"/>
            <input type="submit" value="Enviar"/>
        </form>
    </body>
</html>