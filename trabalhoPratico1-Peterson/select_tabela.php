<?php
    // To sinalizando que o tipo é json
    header('Content-Type: application/json');

    require_once "conexao.php";

    // Aqui eu recebo qual tabela a consulta vai ser realizada
    $tabela = $_POST["tabela"];

    $sql = "SELECT * FROM $tabela;";
    $resultado = $conexao->query($sql);

    // To falando que é um array
    $matriz = array();
    // Percorro o retorno do BD que é um objeto
    foreach($resultado as $i=>$t){
        // Salvo as tuplas em uma matriz
        $matriz[] = $t;
    }

    // Transformo a matriz em um objeto json
    echo json_encode($matriz);

?>