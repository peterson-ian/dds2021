<?php

    $sgbd = "mysql";
    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $bd = "escola_";

    $conexao = new PDO("$sgbd:host=$host;dbname=$bd", $usuario, $senha);

?>