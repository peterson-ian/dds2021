<?php     
    require_once 'conexao.php';

    $id_pais = $_POST["sigla"];
    $nome_pais = $_POST["nome"];    
    $id_regiao = $_POST["regiao"];    
    $sql = "INSERT INTO PAIS VALUES('$id_pais','$nome_pais','$id_regiao')";;    
    $conexao->query($sql);    
    echo "1";   
?>