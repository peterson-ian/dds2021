<?php
    include "cabecalho.php";
    include "conexao.php";

    $sql = "SELECT ID_LOCALIZACAO, ENDERECO, CEP, CIDADE, ESTADO, NOME_PAIS FROM LOCALIZACAO 
                        INNER JOIN PAIS ON PAIS.ID_PAIS = LOCALIZACAO.ID_PAIS 
                        GROUP BY NOME_PAIS ORDER BY NOME_PAIS;";
    $resultado = $conexao->query($sql);
?>
<table>
    <tr>
        <th>ID LOCALIZAÇÃO</th>
        <th>ENDEREÇO</th>
        <th>CEP</th>
        <th>CIDADE</th>
        <th>ESTADO</th>
        <th>PAÍS</th>
    </tr>
    <?php
        foreach($resultado as $i=>$t){
            echo"
            <tr>
                <td>".$t["ID_LOCALIZACAO"]."</td>
                <td>".$t["ENDERECO"]."</td>
                <td>".$t["CEP"]."</td>
                <td>".$t["CIDADE"]."</td>
                <td>".$t["ESTADO"]."</td>
                <td>".$t["NOME_PAIS"]."</td>
            </tr>";
        }
    ?>
</table>
</body>
</html>