<?php
    include 'menu.php';
?>
<body>
    <form action="recebe_form_cliente.php" method="POST">
        <?php
            include 'classesFormulario/classeInput.php';

            $d["type"] = "number";
            $d["name"] = "cpf";
            $d["id"] = "cpf";
            $d["class"] = "i";
            $d["placeholder"] = "Digite o cpf do Cliente";
            $i = new Input($d);
            $i->exibir();

            $d["type"] = "text";
            $d["name"] = "nome";
            $d["id"] = "nome";
            $d["class"] = "i";
            $d["placeholder"] = "Digite o nome do Cliente";
            $i = new Input($d);
            $i->exibir();
            
            $d = null;
            $d["type"] = "text";
            $d["name"] = "telefone";
            $d["id"] = "telefone";
            $d["class"] = "i";
            $d["placeholder"] = "Digite o telefone do Cliente";
            $i = new Input($d);
            $i->exibir();

            $d = null;
            $d["type"] = "text";
            $d["name"] = "endereco";
            $d["id"] = "endereco";
            $d["class"] = "i";
            $d["placeholder"] = "Digite o endereco do Cliente";
            $i = new Input($d);
            $i->exibir();

            $d = null;
            $d["type"] = "text";
            $d["name"] = "sexo";
            $d["id"] = "sexo";
            $d["class"] = "i";
            $d["placeholder"] = "Digite o sexo do Cliente (F ou M)";
            $i = new Input($d);
            $i->exibir();

            $d = null;
            $d["type"] = "date";
            $d["name"] = "data_nasc";
            $d["id"] = "data_nasc";
            $d["class"] = "i";
            $i = new Input($d);
            $i->exibir();

            $d = null;
            $d["type"] = "text";
            $d["name"] = "email";
            $d["id"] = "email";
            $d["class"] = "i";
            $d["placeholder"] = "Digite o email do Cliente";
            $i = new Input($d);
            $i->exibir();

            $d = null;
            $d["type"] = "submit";
            $d["name"] = "Enviar";
            $d["id"] = "Enviar";
            $d["class"] = "i";
            $i = new Input($d);
            $i->exibir();

        ?>
    </form>
</body>
</html>