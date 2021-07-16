<?php
    require_once 'conexao.php';

    $id = $_POST["id"];
    $sql = "DELETE FROM PAIS WHERE ID_PAIS='$id'";
    $conexao->query($sql);

    echo "1";
?>