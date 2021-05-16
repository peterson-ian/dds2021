<?php

    require_once "conexao.php";

    $q = "SELECT * FROM professor";

    $resultado = $conexao->query($q) or die(print_r($conexao->errorInfo()));


    if($resultado->rowCount()>0){

        foreach($resultado as $i=>$t){
            
            echo "Nome: ".$t["nome"].".<br/>";
            echo "CPF: ".$t["cpf"].".<br/>";
            echo "Email: ".$t["email"].".<br/>";
            echo "Prontuario: ".$t["prontuario"].".<hr/>";

        }
    }
    else{
        echo"<h3>Não há professores cadastrados!</h3>";
    }
?>