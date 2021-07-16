<?php
    include "conexao.php";

    $id = $_POST["id"];
    $endereco = $_POST["endereco"];
    $cep = $_POST["cep"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $pais = $_POST["pais"];
        
    $sql = "UPDATE 
                LOCALIZACAO 
            SET 
                ENDERECO='$endereco', CEP='$cep', CIDADE='$cidade', ESTADO='$estado' , ID_PAIS='$pais'
            WHERE 
                ID_LOCALIZACAO='$id'";
    
    $conexao->query($sql);
    
    echo "1";
?>