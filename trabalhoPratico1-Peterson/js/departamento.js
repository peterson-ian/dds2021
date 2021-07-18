$(document).ready(function(){
    // Cadastro assincrono
    $('#cadastrar-departamento').click(function(){
        // Pego os dados e coloco eles em um objeto json
        post_json = {
            nome: $("#nome_departamento").val(),
            gerente: $("#id_gerente_departamento").val(),
            localizacao: $("#localizacao_departamento").val()
        }

        // Envio o objeto json para um arquivo onde insere e recebo a resposta, limpa o formulario e exibe uma msg de sucesso
        $.post("recebe_form_departamento.php",post_json,function(resposta){
            if(resposta == "1"){
                $("form").trigger("reset");
                $("#msg").html("Departamento inserido com sucesso");
                
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
        $.post("remover_departamento.php",obj_json,function(retorno){
            if(retorno=='1'){
                $("#msg").html("Departamento removido com sucesso.");
                departamento = "#departamento" + id;
                $(departamento).remove();
            }
        });
    });

    // Alteração assincrona
    // Aqui eu exibo nos elementos um input p/ eles colocarem as mudanças 
    $(".alterar").click(function(){

        id = $(this).val();

        valor_nome = $("#nome"+id).html();
        input_nome = "<input type='text' name='nome"+ id + "' value='" + valor_nome + "' />";
        $("#nome"+id).html(input_nome);

        // Por ser chave estrangeira eu tenho que limitar as possiveis mudanças 
        // uso o select pra isso, fazendo com que as opçoes sejam criadas por dados do DB da propria tabela de relacionamento
        $.post("select_tabela.php", $tabela = { tabela : "FUNCIONARIO"}, function(retorno){
            valor_gerente = $("#gerente"+id).html();
            console.log(valor_gerente);
            input_gerente = "<select name='gerente"+ id + "'>";
            input_gerente += "<option value = 'NULL'>Sem gerente</option>"
            
            // Laço de repetiçao
            $.each(retorno, function(i,v){
                input_gerente += "<option value = '" + v.ID_FUNCIONARIO + "'>" + v.NOME + "</option>";
                if(valor_gerente != ""){
                    if(v.NOME == valor_gerente){
                        id_gerente = v.ID_FUNCIONARIO;
                    }
                }
                else{
                    id_gerente = 'NULL';
                }
                    
                
            });

            input_gerente += "</select>"; 
            $("#gerente"+id).html(input_gerente);
            $("select[name='gerente" + id + "']").val(id_gerente);
        });

        $.post("select_tabela.php", $tabela = { tabela : "LOCALIZACAO"}, function(retorno){
            valor_localizacao = $("#localizacao"+id).html();
            input_localizacao = "<select name='localizacao"+ id + "'>";
            
            $.each(retorno, function(i,v){
                localizacao = v.ENDERECO + ' - ' + v.CIDADE + ', ' + v.ESTADO +' - ' + v.ID_PAIS;
                input_localizacao += "<option value = '" + v.ID_LOCALIZACAO + "'>" + localizacao + "</option>";
                if(localizacao == valor_localizacao){
                    id_localizacao = v.ID_LOCALIZACAO;
                };
            });

            input_localizacao += "</select>"; 
            $("#localizacao"+id).html(input_localizacao);
            $("select[name='localizacao" + id + "']").val(id_localizacao);
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
            nome: $("input[name='nome"+ id + "']").val(),
            gerente: $("select[name='gerente" + id + "']").val(),
            localizacao: $("select[name='localizacao" + id + "']").val()
        }

        $.post("atualizar_departamento.php",post_json,function(resposta){
            console.log(resposta);
            if(resposta == '1'){
                $("#msg").html("Departamento alterado com sucesso");

                nome = $("input[name='nome" + id + "']").val();
                $("#nome"+id).html(nome);

                gerente = $("select[name='gerente" + id + "']").val();
                $("#gerente"+id).html(gerente);

                localizacao = $("select[name='localizacao" + id + "']").val();
                $("#localizacao"+id).html(localizacao);
                
                botao.hide();
                $(".alterar[value='" + id + "']").show();
            }
        });
    });
});