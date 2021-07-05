<?php
    include "cabecalho.php";
    include "conexao.php";

    $sql = "SELECT 
                FUNCIONARIO.ID_FUNCIONARIO AS ID, 
                CONCAT(FUNCIONARIO.NOME, ' ',FUNCIONARIO.SOBRENOME) AS NOMECOMPLETO,
                FUNCIONARIO.EMAIL, 
                FUNCIONARIO.TELEFONE, 
                FUNCIONARIO.DATA_CONTRATACAO, 
                FUNCAO.TITULO_FUNCAO, 
                FUNCIONARIO.SALARIO, 
                FUNCIONARIO.COMISSAO, 
                GERENTE.NOME AS GERENTE, 
                DEPARTAMENTO.NOME_DEPARTAMENTO 
            FROM 
                FUNCIONARIO 
                INNER JOIN FUNCAO ON FUNCAO.ID_FUNCAO = FUNCIONARIO.ID_FUNCAO 
                INNER JOIN DEPARTAMENTO ON DEPARTAMENTO.ID_DEPARTAMENTO = FUNCIONARIO.ID_DEPARTAMENTO
                LEFT JOIN FUNCIONARIO GERENTE ON GERENTE.ID_FUNCIONARIO = FUNCIONARIO.ID_GERENTE
            ORDER BY FUNCIONARIO.ID_FUNCIONARIO";
    $resultado = $conexao->query($sql);
?>
<table>
    <tr>
        <th>ID_FUNCIONARIO</th>
        <th>NOME DO FUNCIONARIO</th>
        <th>EMAIL</th>
        <th>TELEFONE</th>
        <th>DATA CONTRATAÇÃO</th>
        <th>FUNÇÃO</th>
        <th>SALARIO</th>
        <th>COMISSÃO</th>
        <th>GERENTE</th>
        <th>DEPARTAMENTO</th>
    </tr>
    <?php
        foreach($resultado as $i=>$t){
            echo "  
            <tr>
                <td>".$t["ID"]."</td>
                <td>".$t["NOMECOMPLETO"]."</td>
                <td>".$t["EMAIL"]."</td>
                <td>".$t["TELEFONE"]."</td>
                <td>".$t["DATA_CONTRATACAO"]."</td>
                <td>".$t["TITULO_FUNCAO"]."</td>
                <td> R$".$t["SALARIO"]."</td>
                <td>".$t["COMISSAO"]."%</td>
            ";
            if($t["GERENTE"] == NULL)
                echo "<td>Sem gerente</>";
            else
                echo "<td>".$t["GERENTE"]."</td>";
            echo"
                <td>".$t["NOME_DEPARTAMENTO"]."</td>
            </tr>";
        }
        
    ?>
</table>
</body>
</html>