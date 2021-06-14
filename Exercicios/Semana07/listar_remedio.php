<?php
include "menu.php";
include "classeRemedio.php";
include "conexao.php";

$sql = "SELECT * FROM remedio ORDER BY nome";

$resultado = $conexao->query($sql) or die(print_r($conexao->errorInfo()));


if($resultado->rowCount()>0){
    
    foreach($resultado as $i=>$t){
        $r = new Remedio($t);        
        $r->exibir();

    }

}
else{
    echo "Não há remédios cadastrados.";
}


?>