<?php

// Arquivo que faz a conexao com o BD de rh 
$sgbd="mysql";
$host ="localhost";
$usuario="root";
$senha="";
$bd="rh";

$conexao = new PDO("$sgbd:host=$host;dbname=$bd",$usuario,$senha);

?>