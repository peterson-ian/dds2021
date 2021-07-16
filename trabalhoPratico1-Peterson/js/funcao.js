$(document).ready(function(){
    $('#cadastrar-funcao').click(function(){
        post_json = {
            sigla: $("#id_funcao").val(),
            titulo: $("#titulo_funcao").val(),
            salario_min: $("#salario_max_funcao").val(),
            salario_max: $("#salario_min_funcao").val()
        }

        $.post("recebe_form_funcao.php",post_json,function(resposta){
            console.log(resposta)
            if(resposta == "1"){
                $("form").trigger("reset");
                $("#msg").html("Função inserida com sucesso");
                
            }
        });
    });

    $(".remover").click(function(){
        id = $(this).val();
        obj_json = {id: id}

        $.post("remover_funcao.php",obj_json,function(retorno){
            if(retorno=='1'){
                $("#msg").html("Função removida com sucesso.");
                funcao = "#funcao" + id;
                $(funcao).remove();
            }
        });
    });

    $(".alterar").click(function(){

        id = $(this).val();
        console.log(id)

        valor_sigla = $("#sigla"+id).html();
        input_sigla = "<input type='text' name='sigla"+ id + "' value='" + valor_sigla + "' />";
        $("#sigla"+id).html(input_sigla);
        console.log(input_sigla);

        valor_titulo = $("#titulo"+id).html();
        input_titulo = "<input type='text' name='titulo"+ id + "' value='" + valor_titulo + "' />";
        $("#titulo"+id).html(input_titulo);

        valor_salario_max = $("#salario_max"+id).html();
        input_salario_max = "<input type='number' step='0.01' name='salario_max"+ id + "' value='" + valor_salario_max + "' />";
        $("#salario_max"+id).html(input_salario_max);

        valor_salario_min = $("#salario_min"+id).html();
        input_salario_min = "<input type='number' step='0.01' name='salario_min"+ id + "' value='" + valor_salario_min + "' />";
        $("#salario_min"+id).html(input_salario_min);

        $(this).hide();
        $(".alterando[value='" + id + "']").show();

    });

    $(".alterando").click(function(){
        id = $(this).val();
        botao = $(this);
        post_json = {
            id: id,
            sigla_funcao: $("input[name='sigla"+ id + "']").val(),
            titulo: $("input[name='titulo"+ id + "']").val(),
            salario_max: $("input[name='salario_max"+ id + "']").val(),
            salario_min: $("input[name='salario_min"+ id + "']").val()
        }

        $.post("atualizar_funcao.php",post_json,function(resposta){
            console.log(resposta);
            if(resposta == '1'){
                $("#msg").html("Função alterada com sucesso");

                id = $("input[name='sigla"+ id + "']").val();
                $("#sigla"+id).html(id);

                titulo = $("input[name='titulo" + id + "']").val();
                $("#titulo"+id).html(titulo);

                salario_max = $("input[name='salario_max" + id + "']").val();
                $("#salario_max"+id).html(salario_max);

                salario_min = $("input[name='salario_min" + id + "']").val();
                $("#salario_min"+id).html(salario_min);
                
                botao.hide();
                $(".alterar[value='" + id + "']").show();
            }
        });
    });
});