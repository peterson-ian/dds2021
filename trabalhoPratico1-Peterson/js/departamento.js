$(document).ready(function(){
    $('#cadastrar-departamento').click(function(){
        post_json = {
            nome: $("#nome_departamento").val(),
            gerente: $("#id_gerente_departamento").val(),
            localizacao: $("#localizacao_departamento").val()
        }

        $.post("recebe_form_departamento.php",post_json,function(resposta){
            if(resposta == "1"){
                $("form").trigger("reset");
                $("#msg").html("Departamento inserido com sucesso");
                
            }
        });
    });

    $(".remover").click(function(){
        id = $(this).val();
        obj_json = {id: id}

        $.post("remover_departamento.php",obj_json,function(retorno){
            if(retorno=='1'){
                $("#msg").html("Departamento removido com sucesso.");
                departamento = "#departamento" + id;
                $(departamento).remove();
            }
        });
    });

    $(".alterar").click(function(){

        id = $(this).val();

        valor_nome = $("#nome"+id).html();
        input_nome = "<input type='text' name='nome"+ id + "' value='" + valor_nome + "' />";
        $("#nome"+id).html(input_nome);

        $.post("select_tabela.php", $tabela = { tabela : "FUNCIONARIO"}, function(retorno){
            valor_gerente = $("#gerente"+id).html();
            console.log(valor_gerente);
            input_gerente = "<select name='gerente"+ id + "'>";
            input_gerente += "<option value = 'NULL'>Sem gerente</option>"
            
            $.each(retorno, function(i,v){
                input_gerente += "<option value = '" + v.ID_FUNCIONARIO + "'>" + v.NOME + "</option>";
                if(valor_gerente != "Sem gerente"){
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