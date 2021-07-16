<?php
    include "conexao.php";

    $id = $_POST['id'];
    $sql = "DELETE FROM FUNCAO WHERE ID_FUNCAO = '$id'";
    $conexao->query($sql);

    echo"1";
?>