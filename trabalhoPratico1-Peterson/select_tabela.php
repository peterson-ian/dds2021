<?php
    header('Content-Type: application/json');

    require_once "conexao.php";

    $tabela = $_POST["tabela"];

    $sql = "SELECT * FROM $tabela;";
    $resultado = $conexao->query($sql);

    $matriz = array();
    foreach($resultado as $i=>$t){
        $matriz[] = $t;
    }

    echo json_encode($matriz);

?>