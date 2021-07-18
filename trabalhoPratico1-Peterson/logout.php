<?php
    // Aqui é p/ o usuario sair do sistema, ele limpa a sessao
    session_start();
    session_destroy();
    header("location: login.php");
?>