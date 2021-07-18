$(document).ready(function(){
    // Cadastro assincrono
    $('#cadastrar-localizacao').click(function(){
        // Pego os dados e coloco eles em um objeto json
        post_json = {
            endereco: $("#endereco_localizacao").val(),
            cep: $("#cep_localizacao").val(),
            cidade: $("#cidade_localizacao").val(),
            estado: $("#estado_localizacao").val(),
            pais: $("#pais_localizacao").val()
        }

        // Envio o objeto json para um arquivo onde insere e recebo a resposta, limpa o formulario e exibe uma msg de sucesso
        $.post("recebe_form_localizacao.php",post_json,function(resposta){
            if(resposta == "1"){
                console.log(resposta);
                $("form").trigger("reset");
                $("#msg").html("Localização inserida com sucesso");
                
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
        $.post("remover_localizacao.php",obj_json,function(resposta){
            console.log(resposta);
            if(resposta=='1'){
                $("#msg").html("Localização removida com sucesso.");
                localizacao = "#localizacao" + id;
                $(localizacao).remove();
            }
        });
    });

    // Alteração assincrona
    // Aqui eu exibo nos elementos um input p/ eles colocarem as mudanças
    $(".alterar").click(function(){

        id = $(this).val();

        valor_endereco = $("#endereco"+id).html();
        input_endereco = "<input type='text' name='endereco"+ id + "' value='" + valor_endereco + "' />";
        $("#endereco"+id).html(input_endereco);

        valor_cep = $("#cep"+id).html();
        input_cep = "<input type='number' name='cep"+ id + "' value='" + valor_cep + "' />";
        $("#cep"+id).html(input_cep);

        valor_cidade = $("#cidade"+id).html();
        input_cidade = "<input type='text' name='cidade"+ id + "' value='" + valor_cidade + "' />";
        $("#cidade"+id).html(input_cidade);

        valor_estado = $("#estado"+id).html();
        input_estado = "<input type='text' name='estado"+ id + "' value='" + valor_estado + "' />";
        $("#estado"+id).html(input_estado);

        // Por ser chave estrangeira eu tenho que limitar as possiveis mudanças 
        // uso o select pra isso, fazendo com que as opçoes sejam criadas por dados do DB da propria tabela de relacionamento
        $.post("select_tabela.php", $tabela = { tabela : "PAIS"}, function(retorno){
            valor_pais = $("#pais"+id).html();
            input_pais = "<select name='pais"+ id + "'>";
            
            // Laço de repetiçao
            $.each(retorno, function(i,v){
                input_pais += "<option value = '" + v.ID_PAIS + "'>" + v.NOME_PAIS + "</option>";
                if(v.NOME_PAIS == valor_pais){
                    id_pais = v.ID_PAIS;
                };
            });

            input_pais += "</select>"; 
            $("#pais"+id).html(input_pais);
            $("select[name='pais" + id + "']").val(id_pais);
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
            endereco: $("input[name='endereco"+ id + "']").val(),
            cep: $("input[name='cep"+ id + "']").val(),
            cidade: $("input[name='cidade"+ id + "']").val(),
            estado: $("input[name='estado"+ id + "']").val(),
            pais: $("select[name='pais" + id + "']").val()
        }

        $.post("atualizar_localizacao.php",post_json,function(resposta){
            console.log(resposta);
            if(resposta == '1'){
                $("#msg").html("Localização alterada com sucesso");

                endereco = $("input[name='endereco"+ id + "']").val();
                $("#endereco"+id).html(endereco);

                cep = $("input[name='cep" + id + "']").val();
                $("#cep"+id).html(cep);

                cidade = $("input[name='cidade" + id + "']").val();
                $("#cidade"+id).html(cidade);

                estado = $("input[name='estado" + id + "']").val();
                $("#estado"+id).html(estado);

                pais = $("select[name='pais" + id + "']").val();
                $("#pais"+id).html(pais);
                
                botao.hide();
                $(".alterar[value='" + id + "']").show();
            }
        });
    });
});