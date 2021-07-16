<?php
    require_once 'conexao.php';

    $id = $_POST["id"];
    $sql = "DELETE FROM REGIAO WHERE ID_REGIAO='$id'";

    $conexao->query($sql);

    echo "1";
?>