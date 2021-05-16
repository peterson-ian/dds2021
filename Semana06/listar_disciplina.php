<?php

    require_once "conexao.php";

    $q = "SELECT * FROM disciplina";

    $resultado = $conexao->query($q) or die(print_r($conexao->errorInfo()));


    if($resultado->rowCount()>0){

        foreach($resultado as $i=>$t){
            
            echo "Nome: ".$t["nome"].".<br/>";
            echo "Codigo: ".$t["codigo"].".<br/>";
            echo "Curso: ".$t["curso"].".<br/>";
            echo "Professor: ".$t["professor"].".<hr/>";

        }
    }
    else{
        echo"<h3>Não há disciplinas cadastradas!</h3>";
    }
?>