<?php
    include "conexao.php";

    $id = $_POST['id'];
    $sql = "DELETE FROM FUNCIONARIO WHERE ID_FUNCIONARIO = '$id'";
    $conexao->query($sql);
    
    echo"1";
?>