$(document).ready(function(){
    $('#cadastrar-regiao').click(function(){
        post_json = {
            regiao: $("#nome_regiao_id").val()
        }

        $.post("recebe_form_regiao.php",post_json,function(resposta){
            if(resposta=='1'){
                $("form").trigger("reset");
                $("#msg").html("Região inserida com sucesso");
            }
        });
    });

    $(".remover").click(function(){
        id = $(this).val();
        obj_json = {id: id}

        $.post("remover_regiao.php",obj_json,function(retorno){
            if(retorno=='1'){
                $("#msg").html("Região removida com sucesso.");
                regiao = "#REGIAO" + id;
                $(regiao).remove();
            }
        });
    });

    $(".alterar").click(function(){
        console.log("oi")
        id = $(this).val();

        valor_nome = $("#nome"+id).html();
        input_nome = "<input type='text' name='nome"+ id + "' value='" + valor_nome + "' />";
        $("#nome"+id).html(input_nome);

        $(this).hide();
        $(".alterando[value='" + id + "']").show();

    });

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
                $("#msg").html("Regiao alterado com sucesso");

                nome = $("input[name='nome" + id + "']").val();
                $("#nome"+id).html(nome);
                
                botao.hide();
                $(".alterar[value='" + id + "']").show();
            }
        });
    });
});