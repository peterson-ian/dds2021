<?php
    include "cabecalho.php";
    include "conexao.php";

    $sql = "SELECT * FROM FUNCAO ORDER BY SALARIO_MAXIMO;";
    $resultado = $conexao->query($sql);
?>
<table >
    <tr>
        <th>SIGLA</th>
        <th>TITULO</th>
        <th>SALARIO MAXÍMO</th>
        <th>SALARIO MINIMO</th>
    </tr>
    <?php
        foreach($resultado as $i=>$t){
            echo "  
            <tr>
                <td>".$t["ID_FUNCAO"]."</td>
                <td>".$t["TITULO_FUNCAO"]."</td>
                <td> R$".$t["SALARIO_MINIMO"]."</td>
                <td> R$".$t["SALARIO_MAXIMO"]."</td>
            </tr>";
        }
    ?>
</table>
</body>
</html>