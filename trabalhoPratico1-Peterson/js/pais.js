$(document).ready(function(){
    // Cadastro assincrono
    $('#cadastrar-pais').click(function(){
        // Pego os dados e coloco eles em um objeto json
        post_json = {
            sigla: $("#sigla_pais_id").val(),
            nome: $("#nome_pais_id").val(),
            regiao: $("#regiao_pais_id").val()
        }

        // Envio o objeto json para um arquivo onde insere e recebo a resposta, limpa o formulario e exibe uma msg de sucesso
        $.post("recebe_form_pais.php",post_json,function(resposta){
            if(resposta == "1"){
                $("form").trigger("reset");
                $("#msg").html("País inserido com sucesso");
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
        $.post("remover_pais.php",obj_json,function(retorno){
            if(retorno=='1'){
                $("#msg").html("País removido com sucesso.");
                pais = "#pais" + id;
                $(pais).remove();
            }
        });
    });

    // Alteração assincrona
    // Aqui eu exibo nos elementos um input p/ eles colocarem as mudanças
    $(".alterar").click(function(){
        id = $(this).val();

        valor_sigla = $("#sigla"+id).html();
        input_sigla = "<input type='text' name='sigla"+ id + "' value='" + valor_sigla + "' />";
        $("#sigla"+id).html(input_sigla);

        valor_nome = $("#nome"+id).html();
        input_nome = "<input type='text' name='nome"+ id + "' value='" + valor_nome + "' />";
        $("#nome"+id).html(input_nome);
        
        // Por ser chave estrangeira eu tenho que limitar as possiveis mudanças 
        // uso o select pra isso, fazendo com que as opçoes sejam criadas por dados do DB da propria tabela de relacionamento
        $.post("select_tabela.php", $tabela = { tabela : "REGIAO"}, function(retorno){
            valor_regiao = $("#regiao"+id).html();
            input_regiao = "<select name='regiao"+ id + "'>";
            
            // Laço de repetiçao
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

    // Aqui eu pego os dados que estao nos inputs que o alterar criou e mando eles p/ o arquivo onde atualiza os dados
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