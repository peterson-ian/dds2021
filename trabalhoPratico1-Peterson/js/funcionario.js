$(document).ready(function(){
    // Cadastro assincrono
    $('#cadastrar-funcionario').click(function(){
        // Pego os dados e coloco eles em um objeto json
        post_json = {
            primeiro_nome: $("#nome_funcionario").val(),
            sobrenome: $("#sobrenome_funcionario").val(),
            email: $("#email_funcionario").val(),
            telefone: $("#telefone_funcionario").val(),
            data_contratacao: $("#data_contratacao_funcionario").val(),
            funcao: $("#id_funcao_funcionario").val(),
            salario: $("#salario_funcionario").val(),
            comissao: $("#comissao_funcionario").val(),
            gerente: $("#id_gerente_funcionario").val(),
            departamento: $("#id_departamento_funcionario").val()
        }

        // Envio o objeto json para um arquivo onde insere e recebo a resposta, limpa o formulario e exibe uma msg de sucesso
        $.post("recebe_form_funcionario.php",post_json,function(resposta){
            if(resposta == "1"){
                $("form").trigger("reset");
                $("#msg").html("Funcionario inserido com sucesso");
                
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
        $.post("remover_funcionario.php",obj_json,function(retorno){
            console.log(retorno)
            if(retorno=='1'){
                $("#msg").html("Funcionario removido com sucesso.");
                funcionario = "#funcionario" + id;
                $(funcionario).remove();
            }
        });
    });

    // Alteração assincrona
    // Aqui eu exibo nos elementos um input p/ eles colocarem as mudanças
    $(".alterar").click(function(){

        id = $(this).val(); 
        

        valor_primeiro_nome = $("#primeiro_nome"+id).html();
        input_primeiro_nome = "<input type='text' name='primeiro_nome"+ id + "' value='" + valor_primeiro_nome + "' />";
        $("#primeiro_nome"+id).html(input_primeiro_nome);
       

        valor_sobrenome = $("#sobrenome"+id).html();
        input_sobrenome = "<input type='text' name='sobrenome"+ id + "' value='" + valor_sobrenome + "' />";
        $("#sobrenome"+id).html(input_sobrenome);

        valor_email = $("#email"+id).html();
        input_email = "<input type='text' name='email"+ id + "' value='" + valor_email + "' />";
        $("#email"+id).html(input_email);

        valor_telefone = $("#telefone"+id).html();
        input_telefone = "<input type='text' name='telefone"+ id + "' value='" + valor_telefone + "' />";
        $("#telefone"+id).html(input_telefone);

        valor_data_contratacao = $("#data_contratacao"+id).html();
        input_data_contratacao = "<input type='date' name='data_contratacao"+ id + "' value='" + valor_data_contratacao + "' />";
        $("#data_contratacao"+id).html(input_data_contratacao);

        // Por ser chave estrangeira eu tenho que limitar as possiveis mudanças 
        // uso o select pra isso, fazendo com que as opçoes sejam criadas por dados do DB da propria tabela de relacionamento
        $.post("select_tabela.php", $tabela = { tabela : "FUNCAO"}, function(retorno){
            valor_funcao = $("#funcao"+id).html();
            input_funcao = "<select name='funcao"+ id + "'>";
            
            // Laço de repetiçao
            $.each(retorno, function(i,v){
                input_funcao += "<option value = '" + v.ID_FUNCAO + "'>" + v.TITULO_FUNCAO + "</option>";
                if(v.TITULO_FUNCAO == valor_funcao){
                    id_funcao = v.ID_FUNCAO;
                };
            });

            input_funcao += "</select>"; 
            $("#funcao"+id).html(input_funcao);
            $("select[name='funcao" + id + "']").val(id_funcao);
        });
       

        valor_salario = $("#salario"+id).html();
        input_salario = "<input type='number' step='0.01' name='salario"+ id + "' value='" + valor_salario + "' />";
        $("#salario"+id).html(input_salario);

        valor_comissao = $("#comissao"+id).html();
        input_comissao = "<input type='number' step='0.01' name='comissao"+ id + "' value='" + valor_comissao + "' />";
        $("#comissao"+id).html(input_comissao);

        // Por ser chave estrangeira eu tenho que limitar as possiveis mudanças 
        // uso o select pra isso, fazendo com que as opçoes sejam criadas por dados do DB da propria tabela de relacionamento
        $.post("select_tabela.php", $tabela = { tabela : "FUNCIONARIO"}, function(retorno){
            valor_gerente = $("#gerente"+id).html();
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

        // Por ser chave estrangeira eu tenho que limitar as possiveis mudanças 
        // uso o select pra isso, fazendo com que as opçoes sejam criadas por dados do DB da propria tabela de relacionamento
        $.post("select_tabela.php", $tabela = { tabela : "DEPARTAMENTO"}, function(retorno){
            valor_departamento = $("#departamento"+id).html();
            input_departamento = "<select name='departamento"+ id + "'>";
            
            // Laço de repetiçao
            $.each(retorno, function(i,v){
                input_departamento += "<option value = '" + v.ID_DEPARTAMENTO + "'>" + v.NOME_DEPARTAMENTO + "</option>";
                if(v.NOME_DEPARTAMENTO == valor_departamento){
                    id_departamento = v.ID_DEPARTAMENTO;
                };
            });

            input_departamento += "</select>"; 
            $("#departamento"+id).html(input_departamento);
            $("select[name='departamento" + id + "']").val(id_departamento);
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
            primeiro_nome: $("input[name='primeiro_nome"+ id + "']").val(),
            sobrenome: $("input[name='sobrenome"+ id + "']").val(),
            email: $("input[name='email"+ id + "']").val(),
            telefone: $("input[name='telefone"+ id + "']").val(),
            funcao: $("select[name='funcao" + id + "']").val(),
            data_contratacao: $("input[name='data_contratacao"+ id + "']").val(),
            salario: $("input[name='salario"+ id + "']").val(),
            gerente: $("select[name='gerente" + id + "']").val(),
            departamento: $("select[name='departamento" + id + "']").val(),
            comissao: $("input[name='comissao"+ id + "']").val()
        }

        $.post("atualizar_funcionario.php",post_json,function(resposta){
            console.log(resposta);
            if(resposta == '1'){
                $("#msg").html("Funcionario alterado com sucesso");

                primeiro_nome = $("input[name='primeiro_nome"+ id + "']").val();
                $("#primeiro_nome"+id).html(primeiro_nome);

                sobrenome = $("input[name='sobrenome" + id + "']").val();
                $("#sobrenome"+id).html(sobrenome);

                email = $("input[name='email" + id + "']").val();
                $("#email"+id).html(email);

                telefone = $("input[name='telefone" + id + "']").val();
                $("#telefone"+id).html(telefone);

                data_contratacao = $("input[name='data_contratacao" + id + "']").val();
                $("#data_contratacao"+id).html(data_contratacao);

                funcao = $("select[name='funcao" + id + "']").val();
                $("#funcao"+id).html(funcao);
                
                salario = $("input[name='salario" + id + "']").val();
                $("#salario"+id).html(salario);

                comissao = $("input[name='comissao" + id + "']").val();
                $("#comissao"+id).html(comissao);

                gerente = $("select[name='gerente" + id + "']").val();
                $("#gerente"+id).html(gerente);

                departamento = $("select[name='departamento" + id + "']").val();
                $("#departamento"+id).html(departamento);

                botao.hide();
                $(".alterar[value='" + id + "']").show();
            }
        });
    });
});