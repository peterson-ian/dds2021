<?php
    include "menu.php";
    include "conexao.php";
    include "classeCliente.php";

    $sql = "SELECT * FROM cliente";

    $resultado = $conexao->query($sql) or die(print_r($conexao->errorInfo()));

    if($resultado->rowCount()>0){

        foreach($resultado as $i=>$t){
            $c = new Cliente($t);        
            $c->exibir();
    
        }
    
    }
    else{
        echo "Não há clientes cadastrados.";
    }
?>