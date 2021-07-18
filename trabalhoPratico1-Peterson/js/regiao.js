$(document).ready(function(){
    // Cadastro assincrono
    $('#cadastrar-regiao').click(function(){
        // Pego os dados e coloco eles em um objeto json
        post_json = {
            regiao: $("#nome_regiao_id").val()
        }

        // Envio o objeto json para um arquivo onde insere e recebo a resposta, limpa o formulario e exibe uma msg de sucesso
        $.post("recebe_form_regiao.php",post_json,function(resposta){
            if(resposta=='1'){
                $("form").trigger("reset");
                $("#msg").html("Região inserida com sucesso");
            }
        });
    });

    // Remoção assincrona
    $(".remover").click(function(){
        // Pega o id para saber qual tupla devo remover
        id = $(this).val();
        // Crio um objeto json
        obj_json = {id: id}

        // Envio o objeto json para um arquivo onde remove e recebo a resposta, tira a tupla e exibe uma msg de sucesso
        $.post("remover_regiao.php",obj_json,function(retorno){
            if(retorno=='1'){
                $("#msg").html("Região removida com sucesso.");
                regiao = "#regiao" + id;
                console.log(regiao);
                $(regiao).remove();
            }
        });
    });

    // Alteração assincrona
    // Aqui eu exibo nos elementos um input p/ eles colocarem as mudanças 
    $(".alterar").click(function(){
        console.log("oi")
        id = $(this).val();

        valor_nome = $("#nome"+id).html();
        input_nome = "<input type='text' name='nome"+ id + "' value='" + valor_nome + "' />";
        $("#nome"+id).html(input_nome);

        $(this).hide();
        $(".alterando[value='" + id + "']").show();

    });

    // Aqui eu pego os dados que estao nos inputs que o alterar criou e mando eles p/ o arquivo onde atualiza os dados
    $(".alterando").click(function(){
        id = $(this).val();
        botao = $(this);
        post_json = {
            id: id,
            nome: $("input[name='nome"+ id + "']").val()
        }

        $.post("atualizar_regiao.php",post_json,function(resposta){
            console.log(resposta);
            if(resposta == '1'){
                $("#msg").html("Regiao alterada com sucesso");

                nome = $("input[name='nome" + id + "']").val();
                $("#nome"+id).html(nome);
                
                botao.hide();
                $(".alterar[value='" + id + "']").show();
            }
        });
    });
});