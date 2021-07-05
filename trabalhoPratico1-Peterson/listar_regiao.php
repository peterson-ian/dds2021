<?php
    include "cabecalho.php";
    include "conexao.php";

    $sql = "SELECT * FROM REGIAO ORDER BY NOME_REGIAO";
    $resultado = $conexao->query($sql);

?>

<table>
    <tr>
        <th>ID REGIÃO</th>
        <th>NOME REGIÃO</th>
    </tr>

    <?php
        foreach($resultado as $i=>$t){
            echo "<tr>
                    <td>".$t["ID_REGIAO"]."</td>
                    <td>".$t["NOME_REGIAO"]."</td>
                  </tr>";
        }
    ?>
</table>
</body>
</html>