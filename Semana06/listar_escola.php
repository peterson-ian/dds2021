<?php

    require_once "conexao.php";

    $q = "SELECT * FROM escola";

    $resultado = $conexao->query($q) or die(print_r($conexao->errorInfo()));


    if($resultado->rowCount()>0){

        foreach($resultado as $i=>$t){
            
            echo "Nome: ".$t["nome"].".<br/>";
            echo "CNPJ: ".$t["cnpj"].".<br/>";
            echo "Endereço: ".$t["endereco"].".<br/>";
            echo "Cidade: ".$t["cidade"].".<br/>";
            echo "Estado: ".$t["estado"].".<hr/>";

        }
    }
    else{
        echo"<h3>Não há disciplinas cadastradas!</h3>";
    }
?>