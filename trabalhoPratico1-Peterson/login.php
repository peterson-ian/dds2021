<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="folha_estilo.css" />
        <title>Login - Sistema RH</title>
    </head>
    <body>
        <img id="logo" src="imagem.png" alt="logo" title="logo">
        <hr/>
        <?php
            if(isset($_GET["erro"])){
                echo"<p id='erro'>Usuario e/ou Senha errado(s).</p>";
            }
        ?>
        <div id="login">
            <?php
                require_once "classesFormulario/classeFormulario.php";

                // Criando um formulario e acrescentando elementos usando a classFormulario p/ login de usuarios no sitema de RH;
                $v["method"] = "POST";
                $v["action"] = "valida_usuario.php";
                $v["titulo"] = 'Login';

                $f = new Formulario($v);

                $v = null;
                $v["type"] = "email";
                $v["placeholder"] = "Digite o email...";
                $v["name"] = "email";
                $v["id"] = "email_login";
                $v["class"]="formulario input";
                $i = new Input($v);    

                $f->adiciona_elemento($i);

                $v = null;
                $v["type"] = "password";
                $v["placeholder"] = "Digite a senha...";
                $v["name"] = "senha";
                $v["id"] = "senha_login";
                $v["class"]="formulario input";
                $i = new Input($v);    

                $f->adiciona_elemento($i);

                $v = null;
                $v["type"] = "submit";
                $v["name"] = "login";
                $v["id"] = "input_login";
                $v["value"] = "Logar";
                $v["class"]="formulario input";
                $i = new Input($v);    

                $f->adiciona_elemento($i);

                $f->exibir();
            ?>
            <!-- Imagem somente p/ design da pagina -->
            <img src="login.png" alt="Imagem Login" title="Imagem Login">
        </div>
    </body>
</html>