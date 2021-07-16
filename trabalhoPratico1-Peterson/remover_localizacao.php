<?php
    include "conexao.php";

    $id = $_POST["id"];
    $sql = "DELETE FROM LOCALIZACAO WHERE ID_LOCALIZACAO = '$id'";
    $conexao->query($sql);

    echo "1";
?>