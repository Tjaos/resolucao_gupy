<?php

// Conexão com o banco de dados
$host = "localhost";
$user = "root";
$password = "root";
$dbname = "database";
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

// Cconsulta para recuperar os dados
$sql = "SELECT Tb_banco.nome, Tb_convenio.verba, Tb_contrato.codigo, Tb_contrato.data_inclusao, Tb_contrato.valor, Tb_contrato.prazo
        FROM Tb_contrato
        INNER JOIN Tb_convenio_servico ON Tb_contrato.convenio_servico = Tb_convenio_servico.codigo
        INNER JOIN Tb_convenio ON Tb_convenio_servico.convenio = Tb_convenio.codigo
        INNER JOIN Tb_banco ON Tb_convenio.banco = Tb_banco.codigo";

// Executa a consulta no SQL
$stmt = $pdo->query($sql);

// Resultado
echo "<table>";
echo "<tr><th>Nome do banco</th><th>Verba</th><th>Código do contrato</th><th>Data de inclusão</th><th>Valor</th><th>Prazo</th></tr>";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>".$row["nome"]."</td>";
    echo "<td>".$row["verba"]."</td>";
    echo "<td>".$row["codigo"]."</td>";
    echo "<td>".$row["data_inclusao"]."</td>";
    echo "<td>".$row["valor"]."</td>";
    echo "<td>".$row["prazo"]."</td>";
    echo "</tr>";
}
echo "</table>";

?>
