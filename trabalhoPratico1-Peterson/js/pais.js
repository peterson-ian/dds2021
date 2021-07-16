$(document).ready(function(){
    $('#cadastrar-pais').click(function(){
        post_json = {
            sigla: $("#sigla_pais_id").val(),
            nome: $("#nome_pais_id").val(),
            regiao: $("#regiao_pais_id").val()
        }

        $.post("recebe_form_pais.php",post_json,function(resposta){
            if(resposta == "1"){
                $("form").trigger("reset");
                $("#msg").html("País inserido com sucesso");
            }
        });
    });

    $(".remover").click(function(){
        id = $(this).val();
        obj_json = {id: id}

        $.post("remover_pais.php",obj_json,function(retorno){
            if(retorno=='1'){
                $("#msg").html("País removido com sucesso.");
                pais = "#pais" + id;
                $(pais).remove();
            }
        });
    });

    $(".alterar").click(function(){
        id = $(this).val();

        valor_sigla = $("#sigla"+id).html();
        input_sigla = "<input type='text' name='sigla"+ id + "' value='" + valor_sigla + "' />";
        $("#sigla"+id).html(input_sigla);

        valor_nome = $("#nome"+id).html();
        input_nome = "<input type='text' name='nome"+ id + "' value='" + valor_nome + "' />";
        $("#nome"+id).html(input_nome);
        
        $.post("select_tabela.php", $tabela = { tabela : "REGIAO"}, function(retorno){
            valor_regiao = $("#regiao"+id).html();
            input_regiao = "<select name='regiao"+ id + "'>";
            
            $.each(retorno, function(i,v){
                input_regiao += "<option value = '" + v.ID_REGIAO + "'>" + v.NOME_REGIAO + "</option>";
                if(v.NOME_REGIAO == valor_regiao){
                    id_regiao = v.ID_REGIAO;
                };
            });

            input_regiao += "</select>"; 
            $("#regiao"+id).html(input_regiao);
            $("select[name='regiao" + id + "']").val(id_regiao);
        });

        $(this).hide();
        $(".alterando[value='" + id + "']").show();
    });

    $(".alterando").click(function(){
        id = $(this).val();
        botao = $(this);
        post_json = {
            id: id,
            sigla: $("input[name='sigla"+ id + "']").val(),
            nome: $("input[name='nome"+ id + "']").val(),
            regiao: $("select[name='regiao" + id + "']").val(),
        }

        $.post("atualizar_pais.php",post_json,function(resposta){
            console.log(resposta);
            if(resposta == '1'){
                $("#msg").html("País alterado com sucesso");

                sigla = $("input[name='sigla" + id + "']").val();
                $("#sigla"+id).html(sigla);

                nome = $("input[name='nome" + id + "']").val();
                $("#nome"+id).html(nome);

                regiao = $("select[name='regiao" + id + "']").val();
                $("#regiao"+id).html(regiao);
                
                botao.hide();
                $(".alterar[value='" + id + "']").show();
            }
        });
    });
});