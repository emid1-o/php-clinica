<?php
require_once "vendor/autoload.php";

use Luizlins\Projeto01\Infraestrutura\Persistencia\FabricaConexao;

$pdo = FabricaConexao::criarConexao();

try {
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS pacientes (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            cpf TEXT NOT NULL,
            nome TEXT NOT NULL,
            telefone TEXT NOT NULL,
            data_nascimento TEXT NOT NULL
        );

        CREATE TABLE IF NOT EXISTS consultas (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            medico_id INTEGER,
            paciente_id INTEGER,
            data_consulta TEXT NOT NULL,
            valor REAL NOT NULL,
            FOREIGN KEY(medico_id) REFERENCES medicos(id),
            FOREIGN KEY(paciente_id) REFERENCES pacientes(id)
        );
    ");
    echo "Tabelas criadas e prontas no banco.\n";
} catch (\PDOException $e) {
    echo "Erro ao criar as tabelas: " . $e->getMessage() . "\n";
}