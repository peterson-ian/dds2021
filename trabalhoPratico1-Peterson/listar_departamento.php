<?php
    include "cabecalho.php";
    include "conexao.php";

    $sql = "SELECT 
                DEPARTAMENTO.ID_DEPARTAMENTO, 
                DEPARTAMENTO.NOME_DEPARTAMENTO, 
                GERENTE.NOME AS GERENTE, 
                CONCAT(ENDERECO , ' - ', CIDADE, ', ', NOME_PAIS ) AS LOC 
            FROM DEPARTAMENTO 
                INNER JOIN LOCALIZACAO ON LOCALIZACAO.ID_LOCALIZACAO = DEPARTAMENTO.ID_LOCALIZACAO
                INNER JOIN PAIS ON PAIS.ID_PAIS = LOCALIZACAO.ID_PAIS
                LEFT JOIN FUNCIONARIO GERENTE ON GERENTE.ID_FUNCIONARIO = DEPARTAMENTO.ID_GERENTE
            ORDER BY ID_DEPARTAMENTO;";
    $resultado = $conexao->query($sql);
?>
<table >
    <input class="db" type="hidden" value="DEPARTAMENTO">
    <tr>
        <th>ID_DEPARTAMENTO</th>
        <th>NOME DO DEPARTAMENTO</th>
        <th>NOME DO GERENTE</th>
        <th>LOCALIZACAO</th>
    </tr>
    <?php
        foreach($resultado as $i=>$t){
            echo "  
            <tr>
                <td>".$t["ID_DEPARTAMENTO"]."</td>
                <td>".$t["NOME_DEPARTAMENTO"]."</td>";
            if($t["GERENTE"] == NULL)
                echo "<td>Sem gerente</>";
            else
                echo "<td>".$t["GERENTE"]."</td>";
            echo "
                <td>".$t["LOC"]."</td>
            </tr>";
        }
    ?>
</table>
</body>
</html>