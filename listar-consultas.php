<?php
require_once "vendor/autoload.php";

use Luizlins\Projeto01\Infraestrutura\Persistencia\FabricaConexao;

$conexao = FabricaConexao::criarConexao();

$sql = "SELECT c.id, c.data_consulta, c.valor, m.nome as medico, p.nome as paciente 
        FROM consultas c
        INNER JOIN medicos m ON c.medico_id = m.id
        INNER JOIN pacientes p ON c.paciente_id = p.id";

$stmt = $conexao->query($sql);
$consultas = $stmt->fetchAll();

foreach ($consultas as $c) {
    echo "Agendamento #" . $c['id'] . "\n";
    echo "Data e Hora: " . $c['data_consulta'] . "\n";
    echo "Medico: " . $c['medico'] . "\n";
    echo "Paciente: " . $c['paciente'] . "\n";
    echo "Valor: R$ " . number_format($c['valor'], 2, ',', '.') . "\n";
    echo "------------------------\n";
}