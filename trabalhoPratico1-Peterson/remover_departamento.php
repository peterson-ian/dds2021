<?php
    include "conexao.php";

    $id = $_POST['id'];
    $sql = "DELETE FROM DEPARTAMENTO WHERE ID_DEPARTAMENTO = '$id'";
    $conexao->query($sql);
    echo"1";
?>