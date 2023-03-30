SELECT Tb_banco.nome, Tb_convenio.verba, MIN(Tb_contrato.data_inclusao) AS data_inclusao_antiga, MAX(Tb_contrato.data_inclusao) AS data_inclusao_nova, SUM(Tb_contrato.valor) AS total_contratos
FROM Tb_contrato
INNER JOIN Tb_convenio_servico ON Tb_contrato.convenio_servico = Tb_convenio_servico.codigo
INNER JOIN Tb_convenio ON Tb_convenio_servico.convenio = Tb_convenio.codigo
INNER JOIN Tb_banco ON Tb_convenio.banco = Tb_banco.codigo
GROUP BY Tb_banco.nome, Tb_convenio.verba